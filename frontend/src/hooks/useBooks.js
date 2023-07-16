import axios from "axios";
import {ref, onMounted} from "vue";

export function useBooks(limit) {
    const books = ref([])
    const totalPages = ref(0)
    const isBooksLoading = ref(true)
    const fetching = async ()=>{
        try {
            const response = await axios.get('https://jsonplaceholder.typicode.com/posts',{
                params:{
                    _page:1,
                    _limit: limit
                }
            });
            totalPages.value = Math.ceil(response.headers['x-total-count'] / limit);
            books.value = response.data;
        } catch (e){
            alert('Ошибка')
        } finally {
            isBooksLoading.value = false;
        }
    }

    onMounted(fetching)

    return{
        books, isBooksLoading, totalPages
    }

}