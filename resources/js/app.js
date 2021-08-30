/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
<<<<<<< HEAD

=======
 import VueAxios from 'vue-axios';
 import axios from 'axios';
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
require('./bootstrap');

window.Vue = require('vue').default;

<<<<<<< HEAD
=======
Vue.use(VueAxios, axios);
>>>>>>> a5b0eccdcf43b8767e3e05aa5f8a6b0656d62a38
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
