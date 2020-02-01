/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'

import VueTabs from 'vue-nav-tabs'
import 'vue-nav-tabs/themes/vue-tabs.css'
Vue.use(VueTabs)

Vue.use(VueRouter)
import { Form, HasError, AlertError } from 'vform';
window.Form=Form;
Vue.component(HasError.name, HasError)
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '20px'
  })

  import Swal from 'sweetalert2'
  window.Swal=Swal;




let routes = [
    { path: '/dashboard', component: require('./components/dashboard.vue').default },
    { path: '/Professeurs', component: require('./components/Professeurs.vue').default },
    { path: '/developer', component: require('./components/developer.vue').default },
    { path: '/matiere', component: require('./components/matiere.vue').default },
    { path: '/etudiant', component: require('./components/etudiant.vue').default },
    { path: '/filiere', component: require('./components/filieres.vue').default },
    { path: '/emploie', component: require('./components/emploie.vue').default },
    { path: '/absense', component: require('./components/absense.vue').default },
    { path: '/affichemploie', component: require('./components/affichemploie.vue').default },



  ]

  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  window.Toast=Toast;

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
  })

  let Fire = new Vue();
  window.Fire=Fire;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue').default
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);
Vue.component('example-component', require('./components/ExampleComponent.vue').default);


Vue.component('pagination', require('laravel-vue-pagination'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});




