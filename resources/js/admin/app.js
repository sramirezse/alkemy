// require('./bootstrap')

import { createApp } from 'vue';
// Vuex && js-cookie
import store from './store/index';
import Cookies from 'js-cookie';
import 'material-dashboard/assets/css/material-dashboard.css';
// Vue Router
import router from './router/index';
//Layout for blade
import Layout from './layout/Index.vue';

// //SWEETALERT
// import VueSweetalert2 from 'vue-sweetalert2';
// import 'sweetalert2/dist/sweetalert2.min.css';

// import CKEditor from '@ckeditor/ckeditor5-vue';
import DropZone from 'dropzone-vue';
// // optionally import default styles
import 'dropzone-vue/dist/dropzone-vue.common.css';

// import vSelect from 'vue-select';
// import "vue-select/dist/vue-select.css";

import Pagination from 'v-pagination-3';
// import Wizard from './components/FormWizard.vue';
import Table from './components/Table.vue';
import Search from './components/Search.vue';


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
app.component('Table', Table);
app.component('Search', Search);
app.component('Pagination', Pagination);
app.mount('#adapp');
