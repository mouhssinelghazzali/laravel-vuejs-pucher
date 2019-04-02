<template>
<div>
  <toolbar></toolbar>
  <router-view></router-view>
  <footer-app></footer-app>

</div>

</template>

<script>
import toolbar from './Toolbar'
import FooterApp from './FooterApp'
import Login from './Login/Login'

export default {
components:{toolbar,FooterApp,Login}
}
</script>

<style>

</style>
