import Vue from 'vue'
import VueRouter from 'vue-router'
import VueTruncate from 'vue-truncate-filter'
Vue.use(VueRouter)
Vue.use(VueTruncate)
import Login from  '../components/Login/Login'
import Signup from '../components/Login/Signup'
import Forum from '../components/Forum/Forum'
import Read from '../components/Forum/Read'
import Create from '../components/Forum/Create'
import Logout from '../components/Login/Logout'
import User from '../components/User/index'
import CreateCategory from '../components/Category/CreateCategory'
import CategoryQuestion from '../components/Category/CategoryQuestion'
import Parallex from '../components/parallex'

const routes = [
    { path: '/', component: Parallex },
    { path: '/login', component: Login },
    { path: '/signup', component: Signup },
    { path: '/logout', component: Logout },
    { path: '/forum', component: Forum ,name:'forum' },
    { path: '/ask', component: Create },
    { path: '/category', component: CreateCategory },
    { path: '/question/:slug', component: Read ,name:'read' },
    { path: '/question/category/:slug', component: CategoryQuestion ,name:'CategoryQuestion' },
    { path: '/user', component: User ,name:'user' },

    
  ]

  const router = new VueRouter({
    routes, // raccourci pour `routes: routes`
    hashbarg:false,
    mode:'history'
  })

  export default router