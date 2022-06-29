import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

// ! IMPORTANT: for our convention we import pages like this.
// ! Its safer and avoid many bugs
import MainPage from "./pages/MainPageComponent.vue";
import UserProfile from "./pages/UserProfile.vue";
import MessagesTable from "./pages/MessagesTable.vue"

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "guest-home",
            component: MainPage,
        },
        {
            path: "/user-profile",
            name: "user-profile",
            component: UserProfile,
        },
        {
            path: "/messages-table",
            name: "messages-table",
            component: MessagesTable,
        },
    ],
});

export default router;
