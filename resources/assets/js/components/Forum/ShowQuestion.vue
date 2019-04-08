<template>
<v-card>
    <v-container fluid>
    <v-card-title>
        <div>
            <div class="headline">
                {{data.title}}
            </div>
            <span class="grey--text"> {{data.username}} said {{data.created_at}}</span>
        </div>
<v-spacer></v-spacer>
<v-btn color="teal" dark> {{data.reply_count}} Replies</v-btn>
    </v-card-title>
    <v-card-text v-html="body"></v-card-text>
    <v-card-actions v-if="own">
        <v-btn icon small @click="edit">
            <v-icon color="orange">edit</v-icon>
            </v-btn>
            <v-btn icon small @click="alertDisplay">
            <v-icon color="red">delete</v-icon>  
            </v-btn>      
  </v-card-actions>
    </v-container>
</v-card>
</template>

<script>

export default {
props:['data'],
data(){
return{
    own:User.own(this.data.id)

}
},
computed:{
    body(){

        return md.parse(this.data.body)
    }
},
methods:{
   supprimer(){
            axios.delete(`/api/question/${this.data.slug}`)
            .then(res => this.$router.push('/forum'))
            .catch(error => console.log(error.response.data))
},
        alertDisplay() {
        this.$swal({
          title: 'Are you sure?',
          text: 'You can\'t revert your action',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes Delete it!',
          cancelButtonText: 'No, Keep it!',
          showCloseButton: true,
          showLoaderOnConfirm: true
        }).then((supp) => {
          if(supp.value) {
          
            this.$swal('Deleted', 'You successfully deleted this file', 'success')
             this.supprimer()
          } else {
            this.$swal('Cancelled', 'Your file is still intact', 'info')
          }
        })
      },
      edit(){
        EventBus.$emit('startEditing')
      }
}

    
}
</script>

<style>

</style>
