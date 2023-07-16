import {createRouter, createWebHistory} from "vue-router";
import Main from "@/pages/MainPage.vue";
import About from "@/pages/AboutPage.vue";
import MyMain from "@/pages/my/MainPage.vue"
import BooksPage from "@/pages/BooksPage.vue";
import AdminPage from "@/pages/AdminPage.vue";

const routes = [
    {
        path: '/',
        component: Main
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/my/main',
        component: MyMain
    },
    {
        path: '/books',
        component: BooksPage
    },
    {
        path: '/admin',
        component: AdminPage
    }
];

const router = createRouter({
    routes,
    history: createWebHistory(import.meta.env.BASE_URL),
});

export default router;