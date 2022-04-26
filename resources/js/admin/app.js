// require('./bootstrap')

import { createApp } from 'vue';
// Vuex && js-cookie
import store from './store/index';
import Cookies from 'js-cookie';
import 'material-dashboard/assets/css/material-dashboard.css';
// Vue Router
import router from './router/index';
//Layout from blade
import Layout from './layout/Index.vue';

import DropZone from 'dropzone-vue';
// // optionally import default styles
import 'dropzone-vue/dist/dropzone-vue.common.css';

import Pagination from 'v-pagination-3';
import Modal from './components/Modal.vue';
import BaseInput from './components/Input.vue';

//chartJs
// import { Chart, registerables } from 'chart.js';
// Chart.register(...registerables);

//Vue INIT
const app = createApp({
})
app.use(store);
app.use(router);
app.use(DropZone);
app.component('Layout', Layout);
app.component('Modal', Modal);
app.component('BaseInput', BaseInput);
app.mount('#adapp');
