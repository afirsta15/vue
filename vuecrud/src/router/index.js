import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import MahasiswaView from '../views/Mahasiswa/View.vue'
import MahasiswaCreate from '../views/Mahasiswa/Create.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      
      component: () => import('../views/AboutView.vue')
    },

    {
      path: '/mahasiswa',
      name: 'mahasiswa',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: MahasiswaView
    },

    {
      path: '/mahasiswa/create',
      name: 'mahasiswaCreate',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: MahasiswaCreate
    },

  ]
})

export default router
