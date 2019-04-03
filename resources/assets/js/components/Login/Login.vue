<template>
 <v-container>
  <v-form @submit.prevent="login"
    ref="form"
    lazy-validation
  >
    <v-text-field
      v-model="form.email"
      label="E-mail"
      type="email"
      required
    ></v-text-field>

    <v-text-field
      v-model="form.password"
      label="Password"
      type="password"
      required
    ></v-text-field>


    <v-btn
      color="success"
      type="submit"
    >
      Login
    </v-btn>

    <router-link to="/signup">

    <v-btn
      color="blue"
      type="submit"
    >
      Sign up
    </v-btn>
    </router-link>
  
  </v-form>
   </v-container>
</template>


<script>
export default {
data(){
    return{
        form : {
            email : null,
            password : null
        }
    }
},
created(){
  if (User.loggedIn()) {
    this.$router.push({name:'forum'})
  }
},
methods:{
    login(){
       User.Login(this.form)
      // this.$router.push({name:'forum'})
        
        
    }

}
}
</script>

<style>

</style>
