import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from  '../components/Login/Login'
import Signup from '../components/Login/Signup'
const routes = [
    { path: '/login', component: Login },
    { path: '/signup', component: Signup }
  ]

  const router = new VueRouter({
    routes, // raccourci pour `routes: routes`
    hashbarg:false,
    mode:'history'
  })

  export default router