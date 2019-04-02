<template>
 <v-container>
  <v-form @submit.prevent="signup"
    ref="form"
    lazy-validation
  >

   <v-text-field
      v-model="form.name"
      label="Name"
      type="text"
      required
    ></v-text-field>

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
     <v-text-field
      v-model="form.password_confirmation"
      label="Password"
      type="password"
      required
    ></v-text-field>

    
    <v-btn
      color="blue"
      type="submit"
    >
      Sign Up
    </v-btn>
    <router-link to="/login">
    <v-btn
      color="success"
      type="submit"
    >
      Login
    </v-btn>
    </router-link>


  
  </v-form>
   </v-container>
</template>

<script>
export default {

data(){
    return {
        form :{

            name:null,
            email:null,
            password:null,
            password_confirmation:null
        }
    }

},
methods:{

    signup(){

    }

}
}
</script>

<style>

</style>
