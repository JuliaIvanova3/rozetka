import Vue from 'vue'
window.axios = require('axios');
import App from './App.vue'
import store from './vuex/store'
import './assets/app.scss';

Vue.config.productionTip = false

new Vue({
  render: h => h(App),
  store
}).$mount('#app')
