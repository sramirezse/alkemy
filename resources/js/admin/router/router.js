import Index from "../pages/dashboard/Index.vue";

import Login from '../pages/login/Index.vue';
import Cuatro04 from '../pages/NotFound.vue';

const routes = [

    { path: '/:pathMatch(.*)*', name: 'not-found', component: Cuatro04 },
    { path: '/login', name: 'Login', component: Login },
    {
        path: '/dashboard',
        name: 'Slider Principal',
        component: Index,
        meta: { sidebar: 1, role: 1, icon: 'dashboard' }
    },
    {
        path: '/dashboard',
        name: 'Cards',
        component: Index,
        meta: { sidebar: 1, role: 1, icon: 'dashboard' }
    },
    

];
export default routes;
