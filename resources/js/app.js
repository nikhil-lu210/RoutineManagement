require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';

Vue.use(VueRouter);
import {routes} from './routes/routes';

// Sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.component('admin-layout', require('./layouts/admin/Layout.vue').default);

const router = new VueRouter({
    routes,
    // mode: 'hash'
    mode: 'history'
});

const app = new Vue({
    el: '#app',
    router
});
