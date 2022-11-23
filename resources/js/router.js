import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "./pages/Home";
import PostsIndex from "./pages/PostsIndex";
import About from "./pages/About";
import Contacts from "./pages/Contacts";
import NotFound from "./pages/NotFound";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home
        },
        {
            path: "/posts",
            name: "Posts-index",
            component: PostsIndex,
            props: (route)=>({page:route.query.page})
        },
        {
            path: "/about",
            name: "About",
            component: About
        },
        {
            path: "/contacts",
            name: "Contacts",
            component: Contacts
        },
        {
            path: "/*",
            name: "NotFound",
            component: NotFound
        }
    ]
});

export default router;
