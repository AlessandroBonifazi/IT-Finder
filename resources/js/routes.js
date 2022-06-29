import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import MainPage from "../js/pages/MainPageComponent.vue";
import CompleteSignup from "../js/pages/CompleteSignup.vue";
import RegisterPage from "../js/pages/RegisterPage.vue";
import UserDashboard from "../js/pages/UserDashboard.vue";
import UserProfile from "../js/pages/UserProfile.vue";

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
    ],
});

export default router;
