import Vue from "vue";

require('./bootstrap');

import vue from 'vue'

import App from './vue/app';
const app = new Vue({
    el: '#app',
    components: {App}
})
