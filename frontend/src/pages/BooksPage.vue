<template>
  <div>
    <h1>Страница со всеми книгами</h1>

    <div class="horizontalMenu">
      <my-input
          v-model="searchQuery"
          placeholder="Поиск...."
          v-focus
      />

      <div class="my-select">
        <my-select
            v-model="selectedSort"
            :options="sortOptions"
        />
      </div>
    </div>

    <book-list
        :books="sortedAndSearchedBooks"
        @remove="removeBooks"
        v-if="!isBooksLoading"
    />

    <div v-else>Идет загрузка книг...</div>

    <div v-intersection="loadMoreBooks" class="observer"></div>
  </div>
</template>

<script>
import axios from "axios";
import BookList from "@/components/BookList.vue";
import MyInput from "@/components/UI/MyInput.vue";
import MySelect from "@/components/UI/MySelect.vue";

export default {
  components: {
    BookList,
    MyInput,
MySelect
  },
  data() {
    return {
      books: [],
      dialogVisible: false,
      isBooksLoading: false,
      selectedSort: '',
      searchQuery: '',
      page: 1,
      limit: 10,
      totalPages: 0,
      sortOptions: [
        {value: 'title', name: 'По названию'},
        {value: 'body', name: 'По содержимому'},
        {value: 'id', name: 'По идентификатору'},
      ]
    }
  },
  methods: {
    createBook(book) {
      this.books.push(book);
      this.dialogVisible = false;
    },
    removeBooks(book) {
      this.books = this.books.filter(b => b.id !== book.id)
    },
    showDialog() {
      this.dialogVisible = true;
    },
    async fetchBooks() {
      try {
        this.isBooksLoading = true;
        const response = await axios.get('https://jsonplaceholder.typicode.com/posts', {
              params: {
                _page: this.page,
                _limit: this.limit
              }
            }
        );
        this.totalPages = Math.ceil(response.headers['x-total-count'] / this.limit)
        this.books = response.data;
      } catch (e) {
        alert('Ошибка')
      } finally {
        this.isBooksLoading = false;
      }
    },
    async loadMoreBooks() {
      try {
        this.page += 1;
        const response = await axios.get('https://jsonplaceholder.typicode.com/posts', {
          params: {
            _page: this.page,
            _limit: this.limit
          }
        });
        this.totalPages = Math.ceil(response.headers['x-total-count'] / this.limit)
        this.books = [...this.books, ...response.data];
      } catch (e) {
        alert('Ошибка')
      }
    }
  },

  mounted() {
    this.fetchBooks()
  },

  computed: {
    sortedBooks() {
      if (this.selectedSort === 'id') {
        return [...this.books].sort((book1, book2) => book1[this.selectedSort] - book1[this.selectedSort])
      }
      return [...this.books].sort((book1, book2) => book1[this.selectedSort]?.localeCompare(book2[this.selectedSort]))
    },
    sortedAndSearchedBooks() {
      return this.sortedBooks.filter(book => book.body.toLocaleLowerCase().includes(this.searchQuery.toLocaleLowerCase()))
    }
  },

  watch: {}

}
</script>

<style lang="scss" scoped>
.page__wrapper {
  display: flex;
  margin-top: 15px;
}

.page {
  border: 1px solid black;
  padding: 10px;
}

.current-page {
  border: 2px solid teal;
}

.horizontalMenu{
  display: flex;
  justify-content: space-between;
  margin: 15px 0;
  height: 40px;
}
</style>