import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

const router = new VueRouter({
  mode: 'history', 
  routes: [
  {
    path: '/',
    name: 'guest-home',
    component: () => import('../js/pages/MainPageComponent.vue')
  },
  //  {
  //    path: '/signup',
  //    name: 'signup',
  //    component: () => import('../js/pages/SignUpComponent.vue')
  //  },
  
]});

// const router = createRouter({
//   history: createWebHistory(process.env.BASE_URL),
//   mode: 'history',
//   linkExactActiveClass: 'active',
//   linkActiveClass: 'active',
//   routes
// })


export default router;