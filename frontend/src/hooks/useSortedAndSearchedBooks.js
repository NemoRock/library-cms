import{ref, computed} from "vue";

export default function useSortedBooks (sortedBooks){
    const searchQuery = ref('')

    const sortedAndSearchedBooks = computed(()=>{
        return sortedBooks.value.filter(book=>book.title.toLowerCase().includes(searchQuery.value.toLowerCase()))
    })

    return{
        searchQuery, sortedAndSearchedBooks
    }
};