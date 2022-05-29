require('./bootstrap');

import Vue from 'vue';
import App from "./components/App";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";

import VDatetimePicker from 'v-datetime-field'

Vue.use(VDatetimePicker)

Vue.config.productionTip = false;

new Vue({
    vuetify,
    router,
    store,
    render: h => h(App)
})
    .$mount("#app");

