<template>
 <v-container  fluid class="backgroundbody">

          <h1 class="rise-text">Login</h1>
     
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
    <span class="text-danger" ></span>
 <div v-show="submitted && !form.email" class="invalid-feedback">Email is required</div>
    <v-text-field
      v-model="form.password"
      label="Password"
      v-validate="'required'"
      :error-messages="errors.collect('password')"
      data-vv-name="password"
      type="password"
      required
    ></v-text-field>
 

<v-row>
      <v-col cols="12" sm="6">
    <v-btn
      color="success"
      type="submit"
    >
      Login
    </v-btn>
    
  </v-col>
    <router-link to="/signup">
  
 <v-col cols="12" sm="6">
    <v-btn
      color="blue"
      type="submit"
    >
      Sign up
    </v-btn>
      <circle-spin v-show="isLoading"></circle-spin>
      </v-col>
    </router-link>
     </v-row>

   
  </v-form>
   <v-row>
       <v-col cols="12" sm="6">
    <v-btn
      color="blue-grey"
      class="ma-2 white--text"
    >
      Log In Google
      <v-icon right dark>mdi-cloud-upload</v-icon>
    </v-btn>
     </v-col>
     </v-row>
    <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
   </v-container>
</template>


<script>
  import Vue from 'vue'
  import VeeValidate from 'vee-validate'
  import facebookLogin from 'facebook-login-vuejs';
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


  Vue.use(VeeValidate)
export default {

  components:{facebookLogin},
   $_veeValidate: {
      validator: 'new'
    },
  
data(){
    return{
        submitted: false,
        form : {
            email : null,
            password : null
        },
        elghazzali : 1,
        tableAll:{},
        isLoading: false,
         editor: ClassicEditor,
        editorData: '<p>Content of the editor.</p>',
        editorConfig: {
            // The configuration of the editor.
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
  // getUser()
  //     {
  //       axios.get('/api/getcategory/ssss')
  //   .then(res => console.log(res.data.data))
  //   .catch(error => console.log(error.response.data))
  //     },
  //   get()
  //   {
  //     User.onSuccess()
  //   },

    login(){
 
       this.$validator.validateAll()
      
  

       User.Login(this.form)
      // this.elghazzali = 2 

      //  if(this.form.email == 'hassizakaria@gmail.com' && this.form.password == 'hassihassihassi' )
      //  {
      //   alert(users);
      //  }
      //  else{
      // alert('error username or password :(');

      
      // this.$router.push({name:'forum'})   
    }

}
}
</script>

<style>
.backgroundbody {
 background: -webkit-linear-gradient(to right, #6aaaff, #488fef);
  background: linear-gradient(to right, #6aaaff, #488fef);
}

@-webkit-keyframes rise {
  0% {padding-top: 100%;}
  60% {padding-top: 7%;}
  80% {padding-top: 7%; border-bottom: 0px solid #1976d2; opacity: 0.5; text-shadow: 2px 2px 5px #1976d2;}
  100% {padding-top: 7%; border-bottom: 0.35em solid #1976d2; opacity: 1; text-shadow: 0;}
}

@keyframes rise {
  0% {padding-top: 100%;}
  60% {padding-top: 7%;}
  80% {padding-top: 7%; border-bottom: 0px solid #1976d2; opacity: 0.5; text-shadow: 2px 2px 200px rgba(255, 255, 255, 1);}
  100% {padding-top: 7%; border-bottom: 0.35em solid  #1976d2;opacity: 1; text-shadow: 200px 200px 200px rgba(255, 255, 255, 0);}
}


.rise-text {
  position: relative;
  text-align: center;
  margin: auto;
  opacity: 0;
  padding-top: 100%;
  color: #fff;
  border-bottom: 0;
  text-shadow: 2px 2px 5px #fff;
  font-family: Trebuchet MS, sans-serif;
  font-size: 6em;
  font-weight: normal;
  -webkit-animation-name: rise;
  -webkit-animation-duration: 5s;
  -webkit-animation-delay: 1s;
  -webkit-animation-iteration-count: 1;
  -webkit-animation-timing-function: cubic-bezier(0, 0.25, 0.55, 1);
  -webkit-animaiton-fill-mode: forwards;
  animation-name: rise;
  animation-duration: 5s;
  animation-delay: 1s;
  animation-iteration-count: 1;
  animation-timing-function: cubic-bezier(0, 0.25, 0.55, 1);
  animation-fill-mode: forwards;
}

</style>
