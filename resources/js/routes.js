import { createRouter, createWebHistory} from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'login',
    component: () => import('../js/pages/LoginComponent.vue')
  },
   {
     path: '/signup',
     name: 'signup',
     component: () => import('../js/pages/SignUpComponent.vue')
   },
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  mode: 'history',
  linkExactActiveClass: 'active',
  linkActiveClass: 'active',
  routes
})

export default router;