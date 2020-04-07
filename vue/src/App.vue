<template>
  <div id="app">
    <main-wrapper/>
  </div>
</template>

<script>
import MainWrapper from './components/main-wrapper.vue' 
export default {
  name: 'App',
  components: {
   MainWrapper
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
