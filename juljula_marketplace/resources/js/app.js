import Vue from "vue";

require('./bootstrap');

window.Vue=require('vue');
window.axios=require('axios');

Vue.component('exemple-component', require('./components/ExempleComponent.vue').default);

const app = new Vue({
    el:'#app',
});
