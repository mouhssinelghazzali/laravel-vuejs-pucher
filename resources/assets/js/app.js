
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import User from './Helpers/User'
import Exception from './Helpers/Exception'
import VueSimplemde from 'vue-simplemde'
import 'simplemde/dist/simplemde.min.css'
import md from 'marked'
import VueSweetalert2 from 'vue-sweetalert2'
import VueSpinners from 'vue-spinners'

Vue.use(VueSpinners);
Vue.use(VueSweetalert2);
Vue.use(Vuetify)
Vue.use(VueRouter)
Vue.use(VueSimplemde)
window.User = User
window.Exception = Exception
window.Vue = require('vue');
window.EventBus= new Vue();
window.md=md


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('app-home', require('./components/AppHome.vue'));
import router from './Router/Router.js'
const app = new Vue({
    el: '#app',
    router
});










































/*require('./bootstrap');
import io from 'socket.io-client'



let list = document.querySelector('#list')
let addUser = (user) => {
    let li = document.createElement('li')
    li.innerText = user.name
    li.id =  'user' + user.id
    list.appendChild(li)

}


if(list){
    let socket = io('http://localhost:3000')
    socket.on('connect',() => {

      socket.emit('identify',{

        token: list.dataset.token
      })
        })


        socket.on('users.new',({user}) => addUser(user) )

        socket.on('users',({users}) =>{

            for (let k in users) {
                
                addUser(users[k])
                
            }

        })

        socket.on('users.supp',({user})   =>{

            list.removeChild(document.querySelector('#user' + user.id))


        })


       
    
}*/


