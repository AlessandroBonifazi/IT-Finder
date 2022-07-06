import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import MainPage from "../js/pages/MainPageComponent.vue";
import CompleteSignup from "../js/pages/CompleteSignup.vue";
import RegisterPage from "../js/pages/RegisterPage.vue";
import LoginPage from "../js/pages/LoginPage.vue";
import UserDashboard from "../js/pages/UserDashboard.vue";
import SearchPage from "../js/pages/SearchPage.vue";
import UserProfile from "../js/pages/UserProfile.vue";
import DevDetail from "../js/pages/DevDetail.vue";
// ! IMPORTANT: for our convention we import pages like this.
// ! Its safer and avoid many bugs

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/user-profile",
            name: "user-profile",
            component: UserProfile,
        },
        {
            path: "/",
            name: "guest-home",
            component: MainPage,
        },
        // {
        //     path: "/user/dashboard:id",
        //     name: "complete-signup",
        //     component: CompleteSignup,
        // },
        {
            path: "/register-front",
            name: "register",
            component: RegisterPage,
        },
        {
            path: "/login-front",
            name: "login",
            component: LoginPage,
        },
        // {
        //     path: "/dashboard/:id",
        //     name: "dashboard",
        //     component: UserDashboard,
        // },
        {
            path: "/search",
            name: "search",
            component: SearchPage,
        },
        {
            path: "/dev-detail/:id",
            name: "dev-detail",
            component: DevDetail,
        },
    ],
});

export default router;
