<template>
 <v-container>
  <v-form @submit.prevent="login"
    ref="form"
    lazy-validation
  >
    <v-text-field
      v-model="form.email"
      label="E-mail"
      v-validate="'required|email'"
      :error-messages="errors.collect('email')"
      data-vv-name="email"
      type="email"
      required
    ></v-text-field>

    <v-text-field
      v-model="form.password"
      label="Password"
      v-validate="'required'"
      :error-messages="errors.collect('password')"
      data-vv-name="password"
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
  import Vue from 'vue'
  import VeeValidate from 'vee-validate'
  Vue.use(VeeValidate)
export default {
   $_veeValidate: {
      validator: 'new'
    },
  
data(){
    return{
        form : {
            email : null,
            password : null
        }
    }
},
 mounted () {
      this.$validator.localize('en', this.dictionary)
    },
created(){
  if (User.loggedIn()) {
    this.$router.push({name:'forum'})
  }
},
methods:{
  
    login(){
       this.$validator.validateAll()
       User.Login(this.form)
      // this.$router.push({name:'forum'})
      
        
        
    }

}
}
</script>

<style>

</style>
