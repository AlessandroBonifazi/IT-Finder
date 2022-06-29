import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import MainPage from "../js/pages/MainPageComponent.vue";
import CompleteSignup from "../js/pages/CompleteSignup.vue";
import RegisterPage from "../js/pages/RegisterPage.vue";
import UserDashboard from "../js/pages/UserDashboard.vue";
import SearchPage from "../js/pages/SearchPage.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "guest-home",
            component: MainPage,
        },
        {
            path: "/user/complete-signup/:id",
            name: "complete-signup",
            component: CompleteSignup,
        },
        {
            path: "/register",
            name: "register",
            component: RegisterPage,
        },
        {
            path: "/dashboard/:id",
            name: "dashboard",
            component: UserDashboard,
        },
        {
            path: "/search",
            name: "search",
            component: SearchPage,
        },
    ],
});

// const router = createRouter({
//   history: createWebHistory(process.env.BASE_URL),
//   mode: 'history',
//   linkExactActiveClass: 'active',
//   linkActiveClass: 'active',
//   routes
// })

export default router;
