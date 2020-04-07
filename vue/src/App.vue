<template>
  <div id="app">
    <main-header/>
    <p> Hello World! </p>
    <main-wrapper/>
  </div>
</template>

<script>
import MainWrapper from './components/main-wrapper.vue' 
import MainHeader from './components/main-header.vue'
export default {
  name: 'App',
  components: {
   MainWrapper,
   MainHeader
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
