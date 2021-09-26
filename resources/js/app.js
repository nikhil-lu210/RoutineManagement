require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('main-page', require('./components/Main.vue').default);



const app = new Vue({
    el: '#app',
});
