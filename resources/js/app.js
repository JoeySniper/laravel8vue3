import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Cleave from 'vue-cleave-component';
import axios from "axios";
import Pagination from './components/Pagination.vue';
// import moment from 'moment-timezone';

require('./bootstrap');

// import './bootstrap';

const app = createApp(App);
app.use(router);
app.use(VueSweetalert2);
app.use(Cleave);
app.config.globalProperties.$axios = axios;
app.component('pagination', Pagination);
// app.use(VueMoment, {
//     moment,
// })

app.mount('#app');
