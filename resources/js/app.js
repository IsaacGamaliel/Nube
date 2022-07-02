
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

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});

//Validaciones registro
bootstrapValidate(['#name','#username','#email','#image','#password','#password-confirm'],'required:Campo vacio')
bootstrapValidate('#name','min:5:Minimo 5|max:40:Maximo 40')
bootstrapValidate('#email','email:Ingresa un correo valido|min:5:Minimo 5|max:40:Maximo 40')
bootstrapValidate('#password-confirm','min:6:Minimo 6|max:10:Maximo 10|matches:#password:Contraseñas no son iguales')
