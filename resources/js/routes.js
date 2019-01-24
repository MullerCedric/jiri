import Dashboard from './components/Dashboard.vue';
import ExaminationCreate from './components/ExaminationCreate.vue';

export default [
    {
        path: '/',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/examination/create',
        name: 'examination-create',
        component: ExaminationCreate,
    },

    { path: '*', redirect: '/' },
];
