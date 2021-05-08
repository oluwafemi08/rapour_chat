require('./bootstrap');

// Here, you imported Vue, Vue Router library, 
// and the routes file. You then proceeded to create 
// a Vue instance and pass both the router and application
//  components to it.


window.Vue = require('vue');
import VueRouter from "vue-router";
import App from './App.vue';
import routes from "./routes";


Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router: routes,
    components: { App }
});