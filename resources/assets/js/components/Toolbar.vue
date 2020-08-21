<template>
  <v-toolbar color="blue darken-2" dark>

    <v-toolbar-title>
      <router-link class="white--text" to="/">

      VueJs

      </router-link>

    </v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div class="hidden-sm-and-down">
   
      <router-link
      v-for="item in items"
      v-if="item.show"
      :to="item.to"
      :key="item.title"
      >
       <v-btn flat>{{item.title}}</v-btn></router-link>
        <v-menu offset-y>
      <template v-slot:activator="{ on }">
        <v-btn
          color="primary"
          dark
          v-on="on"
        >
          Dropdown
        </v-btn>
      </template>
      <v-list>
        <v-list-item>
          <v-list-item-title>{{ name }}</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
    </div>
  </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification';
export default {
components:{AppNotification},
  data(){

    return {

     name: User.name(),
      items : [
        {title : 'Forum' , to:'/forum',show:true},
        {title : 'Login' , to:'/login',show:!User.loggedIn()},
        {title : 'Ask Question' , to:'/ask',show: User.loggedIn()},
        {title : 'Category' , to:'/category',show: User.admin()},
        {title : 'Logout' , to:'/logout',show: User.loggedIn()},
        {title : this.name , to:'#',show: User.loggedIn()},
      ]
    }
  },
  computed:{
    loggedIn(){
    return  User.loggedIn()
    }
},
  created(){
    EventBus.$on('logout',() =>{

    User.logOut()

    })
    
  }

}
</script>

<style>

</style>
