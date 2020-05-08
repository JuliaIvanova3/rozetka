<template>
  <div id="app">
     <keep-alive>
            <router-view>
            </router-view>
        </keep-alive>
  </div>
</template>

<script>
// import MainWrapper from './components/main-wrapper.vue' 
// import adminPanel from './components/admin/admin-panel'
export default {
  name: 'App',
  components: {
  //  MainWrapper,
  //  adminPanel
  },
  mounted() {
    console.log("iam mounted")
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
}
</style>
