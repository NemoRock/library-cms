import {ref, computed} from "vue";

export default function useSortedBooks(books){
    const selectedSort = ref('');
    const sortedBooks = computed(()=>{
        return [...books.value].sort((book1, book2) =>book1[selectedSort.value]?.localeCompare(book2[selectedSort.value]))
    });

    return {
        selectedSort, sortedBooks
    }
}