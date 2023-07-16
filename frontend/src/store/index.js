import {createStore} from "vuex";
import {bookModule} from "@/store/bookModule";

export default createStore({
    state:{
        isAuth:false,
    },
    modules: {
        book:bookModule
    }
})