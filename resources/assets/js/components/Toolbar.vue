<template>
  <v-toolbar>

    <v-toolbar-title>VueJs</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link to="/forum"> <v-btn flat>FORUM</v-btn></router-link>
      <v-btn flat>ASL QUESTION</v-btn>
      <v-btn flat>CATEGORY</v-btn>
      <router-link to="/login"><v-btn flat>LOGIN</v-btn></router-link>
      
    </div>
  </v-toolbar>
</template>

<script>
export default {

}
</script>

<style>

</style>
