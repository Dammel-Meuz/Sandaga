/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

Vue.use(VueRouter);

Vue.component('pagination', require('laravel-vue-pagination'));

import prodact from './components/prodact.vue'
import boutik from './components/boutik.vue'
import dashboard from './components/dashboard.vue'
import ListProduct from './components/ListProduct.vue'
import ajouProduct from './components/AjouProduct.vue'
import AjouCatégorie from './components/AjouCatégorie.vue'
import ListCatégorie from './components/ListCatégorie.vue'
import ListUser from './components/ListUser.vue'
import EditProduit from './components/EditProduit.vue'
import register from './components/register.vue'
import login from './components/login.vue'

//awsome


import './icon.js'
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
        },
        {
            path:'/dashboard',
            component:dashboard

        },
        {
            path:'/ListProduct',
            component:ListProduct
        },
        {
            path:'/AjouProduct',
            component:ajouProduct
        },
        {
            path:'/AjouCatégorie',
            component:AjouCatégorie
        },
        {
            path:'/ListCatégorie',
            component:ListCatégorie
        },
        {
            path:'/ListUser',
            component:ListUser
        },
        {
            path:'/EditProduit',
            component:EditProduit
        },
        {
            path:'/login',
            component:login
        },
        {
            path:'/register',
            component:register
        },



    ];

 const router = new VueRouter({routes})

const app = new Vue({
    el: '#app',

    router:router,
    //enlever le #
    mode: 'history'
});
