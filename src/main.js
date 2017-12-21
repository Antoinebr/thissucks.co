// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'


/**
 *  Import librairies
 *  https://vuejsdevelopers.com/2017/04/22/vue-js-libraries-plugins/
 * 
 */

 // Validator

Vue.prototype.$validator = require('validator')

//Vue.prototype.$qs = require('qs')

Vue.prototype.$qs = require('qs')   


// Axios
import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios)


/**
 *  Import plugins
 * 
 */
var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo)


Vue.config.productionTip = false

Vue.prototype.$userInfo = {};
Vue.prototype.$userInfo.firstName = "";
Vue.prototype.$userInfo.email = "";

Vue.prototype.$steps = {};

window.userInfo = {};


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})


