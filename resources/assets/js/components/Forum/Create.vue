<template>
 <v-container>
  <v-form @submit.prevent="create"
    ref="form"
    lazy-validation
  >

   <v-text-field
      v-model="form.title"
      label="Titre"
      type="text"
      required
    ></v-text-field>
    <v-select
    :items="categories"
    item-text="name"
    item-value="id"
    v-model="form.category_id"
    label="Category"
    autocomplete
    >
    </v-select>



  <markdown-editor v-model="form.body"></markdown-editor>
    <v-btn
    round 
    color="green"
    type="submit"
    >
      Ajouter
    </v-btn>
  </v-form>
   </v-container>
</template>

<script>
export default {
data(){
    return{
       form:{
            title:null,
            category_id:null,
            body :null
        },
        categories:{},
        errors:{}
    }
},
created(){
this.GetCategory()
},
    methods:{
        create(){
          axios.post('/api/question',this.form)
          .then(res => this.$router.push(res.data.path))
          .catch(error => this.errors = error.response.data.error)

        },
        GetCategory(){
axios.get('/api/category')
.then(res => this.categories = res.data.data)

        }
    }
}
</script>

<style>

</style>
