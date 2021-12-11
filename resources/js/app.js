
require('./bootstrap');

window.Vue = require('vue');

Vue.component('post', require('./components/Post.vue').default);
Vue.component('messages', require('./components/Messages.vue').default);
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// import App from './App.vue';
// import router from './router'


const app = new Vue({
    el: '#root',
    // render: h => h(App),
    // router
});
