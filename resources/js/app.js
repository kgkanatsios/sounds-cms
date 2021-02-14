import App from './components/App.vue';
import store from "./store";

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    store
});
