// Import Vue 
require('./bootstrap');
window.Vue = require('vue');

// Import Vue Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

// Link Vue/web.php
const router = new VueRouter({
	mode: 'history',
	routes: [
	{
	  path: '/admin/dashboard',
	  name: 'dashboardAdmin'
	  // component: User
	}
  ]
})

const app = new Vue({
    el: '#app'
});
