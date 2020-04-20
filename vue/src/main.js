import Vue from 'vue'
import 'es6-promise/auto'
import axios from 'axios'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import App from './App.vue'
import store from './vuex/store'
import router from './router/router'
import Router from 'vue-router'
import auth from './auth'
import './assets/app.scss';
import {i18n} from './plugins/i18n'
import 'vue-material-design-icons/styles.css';


window.Vue = Vue

Vue.use(i18n)

Vue.router = router
Vue.use(Router)

Vue.use(VueAxios, axios)
axios.defaults.baseURL = `http://rozetka.test/api/`
Vue.use(VueAuth, auth)


Vue.config.productionTip = false

new Vue({
  i18n,
  render: h => h(App),
  store,
  router,
}).$mount('#app')
