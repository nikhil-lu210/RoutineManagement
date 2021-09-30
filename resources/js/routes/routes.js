import Dashboard from '../components/admin/dashboard/Index';

import Teachers from '../components/admin/teacher/Index';
import CreateTeacher from '../components/admin/teacher/Create';
import ShowTeacher from '../components/admin/teacher/Show';

import Students from '../components/admin/student/Index';
import CreateStudent from '../components/admin/student/Create';
import ShowStudent from '../components/admin/student/Show';

import LatestRoutine from '../components/admin/routine/Latest';
import AllRoutines from '../components/admin/routine/Index';
import RoutineGroup from '../components/admin/routine/Group';
import CreateRoutine from '../components/admin/routine/Create';

import StudentClass from '../components/admin/settings/StudentClass';
import Subject from '../components/admin/settings/Subject';
import Year from '../components/admin/settings/Year';
import Day from '../components/admin/settings/Day';
import Period from '../components/admin/settings/Period';
import Section from '../components/admin/settings/Section';

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
    {
        path: '/teacher/show/:teacher_id',
        name: 'ShowTeacher',
        component: ShowTeacher
    },
    {
        path: '/students',
        name: 'Students',
        component: Students
    },
    {
        path: '/student/create',
        name: 'CreateStudent',
        component: CreateStudent
    },
    {
        path: '/student/show/:student_id',
        name: 'ShowStudent',
        component: ShowStudent
    },
    {
        path: '/routine/latest',
        name: 'LatestRoutine',
        component: LatestRoutine
    },
    {
        path: '/routines',
        name: 'AllRoutines',
        component: AllRoutines
    },
    {
        path: '/routine/group',
        name: 'RoutineGroup',
        component: RoutineGroup
    },
    {
        path: '/routine/create',
        name: 'CreateRoutine',
        component: CreateRoutine
    },
    {
        path: '/settings/classes',
        name: 'StudentClass',
        component: StudentClass
    },
    {
        path: '/settings/subjects',
        name: 'Subject',
        component: Subject
    },
    {
        path: '/settings/years',
        name: 'Year',
        component: Year
    },
    {
        path: '/settings/days',
        name: 'Day',
        component: Day
    },
    {
        path: '/settings/periods',
        name: 'Period',
        component: Period
    },
    {
        path: '/settings/sections',
        name: 'Section',
        component: Section
    },
];