import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import MainPage from "../js/pages/MainPageComponent.vue";
import CompleteSignup from "../js/pages/CompleteSignup.vue";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "guest-home",
            component: MainPage,
        },
        {
            path: "/user/complete-signup",
            name: "complete-signup",
            component: CompleteSignup,
        },
        //  {
        //    path: '/signup',
        //    name: 'signup',
        //    component: () => import('../js/pages/SignUpComponent.vue')
        //  },
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
