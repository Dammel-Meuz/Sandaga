/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import prodact from './components/prodact.vue'
import boutik from './components/boutik.vue'
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
    const routes = [
        {
            path:'/',
        },
        {
            path:'/prodact',
            component:prodact
        },
        {
            path:'/boutik',
            component:boutik
        }

    ];

    const router = new VueRouter({routes})

const app = new Vue({
    el: '#app',
    router:router,
    //enlever le #
    mode: 'history'
});
