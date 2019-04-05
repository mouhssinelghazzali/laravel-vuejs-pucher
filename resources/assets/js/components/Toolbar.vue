<template>
  <v-toolbar>

    <v-toolbar-title>VueJs</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
   
      <router-link
      v-for="item in items"
      v-if="item.show"
      :to="item.to"
      :key="item.title"
      >
       <v-btn flat>{{item.title}}</v-btn></router-link>
      
    </div>
  </v-toolbar>
</template>

<script>
export default {

  data(){

    return {

      items : [
        {title : 'Forum' , to:'/forum',show:true},
        {title : 'Login' , to:'/login',show:!User.loggedIn()},
        {title : 'Ask Question' , to:'/ask',show: User.loggedIn()},
        {title : 'Category' , to:'/category',show: User.loggedIn()},
        {title : 'Logout' , to:'/logout',show: User.loggedIn()},
      ]
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
