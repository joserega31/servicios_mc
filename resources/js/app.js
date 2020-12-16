/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('servicio-component', require('./components/ServiciosComponent.vue').default);
Vue.component('clientes-component', require('./components/ClientesComponent.vue').default);
Vue.component('supervisores-component', require('./components/SupervisoresComponent.vue').default);
Vue.component('ingenios-component', require('./components/IngeniosComponent.vue').default);
Vue.component('tarifarios-component', require('./components/TarifariosComponent.vue').default);
Vue.component('lineasprod-component', require('./components/LineasProdComponent.vue').default);
Vue.component('metpagos-component', require('./components/MetpagosComponent.vue').default);
Vue.component('estpagos-component', require('./components/EstpagosComponent.vue').default);
Vue.component('tiposserv-component', require('./components/TiposServComponent.vue').default);
Vue.component('designaciones-component', require('./components/DesignacionesComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
