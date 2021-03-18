import VueRouter from 'vue-router';
import Dashboard from './components/Pages/Dashboard';
import PhysicalForm from './components/Pages/Physicalform';

const routes = [
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: {
            title: 'Dashboard'
        }
    },

    {
    path: '/physicalform',
    component: PhysicalForm,
    name: 'physicalform',
    meta: {
        title: 'PhysicalForm'
    }
},

]

const router = new VueRouter({
    routes,
    mode: 'history'
});

export default router;