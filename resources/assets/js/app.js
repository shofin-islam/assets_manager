


require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)


//Vue.component('example-component', require('./components/ExampleComponent.vue'));
let myheader = require('./components/MyHeader.vue');
let myfooter = require('./components/footer.vue');
let myDashboard = require('./components/Dashboard.vue');
let myAssets = require('./components/MyAssets.vue');


const routes = [
  { path: '/Dashboard', component: myDashboard },
  { path: '/MyAssets', component: myAssets }
]

const router = new VueRouter({
	// mode:'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{myheader,myfooter}
});
