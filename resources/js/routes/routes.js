import Dashboard from '../components/admin/dashboard/Index';
import Teachers from '../components/admin/teacher/Index';
import CreateTeacher from '../components/admin/teacher/Create';

export const routes = [
    {
        path: '/',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/teachers',
        name: 'Teachers',
        component: Teachers
    },
    {
        path: '/teacher/create',
        name: 'CreateTeacher',
        component: CreateTeacher
    },
];