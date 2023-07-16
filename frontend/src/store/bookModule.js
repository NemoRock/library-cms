import axios from "axios";

export const bookModule = {

    state: () => ({
        books: [],
        isBooksLoading: false,
        selectedSort: '',
        searchQuery: '',
        page: 1,
        limit: 10,
        totalPages: 0,
        sortOptions: [
            {value: 'title', name: 'По названию'},
            {value: 'body', name: 'По содержимому'}
        ]
    }),

    getters: {
        sortedBooks(state) {
            return [...state.books].sort((book1, book2) => book1[state.selectedSort]?.localeCompare(book2[state.selectedSort]));
        },
        sortedAndSearchedBooks(state, getters) {
            return getters.sortedBooks.filter(book => book.title.toLowerCase().includes(state.searchQuery.toLowerCase()));
        }
    },

    mutations: {
        setBooks(state, books) {
            state.books = books;
        },
        setLoading(state, bool) {
            state.isBookLoading = bool;
        },
        setPage(state, page) {
            state.page = page;
        },
        setSelectedSort(state, selectedSort) {
            state.selectedSort = selectedSort;
        },
        setTotalPages(state, totalPages) {
            state.totalPages = totalPages;
        },
        setSearchQuery(state, searchQuery) {
            state.searchQuery = searchQuery;
        },
    },

    actions: {
        async fetchBooks({state, commit}) {
            try {
                commit('setLoading', true);
                const response = await axios.get('https://jsonplaceholder.typicode.com/posts', {
                    params: {
                        _page: state.page,
                        _limit: state.limit
                    }
                });
                commit('setTotalPages', Math.ceil(response.headers['x-total-count'] / state.limit))
                commit('setBooks', response.data)
            } catch
                (e) {
                console.log(e);
            } finally {
                commit('setLoading', false)
            }
        },
        async loadMoreBooks({state, commit}){
            try {
                commit('setPage', state.page + 1)
                const response = await axios.get('https://jsonplaceholder.typicode.com/posts', {
                    params: {
                        _page: state.page,
                        _limit: state.limit
                    }
                });
                commit('setTotalPages', Math.ceil(response.headers['x-total-count'] / state.limit))
                commit('setBooks', [...state.books, ...response.data]);
            } catch (e) {
                console.log(e)
            }
        }
    },
    namespaced: true
}