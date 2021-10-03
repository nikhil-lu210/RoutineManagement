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
import GroupTeacher from '../components/admin/routine/GroupTeacher';
import CreateRoutine from '../components/admin/routine/Create';

import StudentClass from '../components/admin/settings/StudentClass';
import Subject from '../components/admin/settings/Subject';
import Year from '../components/admin/settings/Year';
import Day from '../components/admin/settings/Day';
import Period from '../components/admin/settings/Period';
import Section from '../components/admin/settings/Section';

export const routes = [
    {
        path: '/admin/',
        component: Dashboard
    },
    {
        path: '/admin/teachers',
        component: Teachers
    },
    {
        path: '/admin/teacher/create',
        component: CreateTeacher
    },
    {
        path: '/admin/teacher/show/:teacher_id',
        component: ShowTeacher
    },
    {
        path: '/admin/students',
        component: Students
    },
    {
        path: '/admin/student/create',
        component: CreateStudent
    },
    {
        path: '/admin/student/show/:student_id',
        component: ShowStudent
    },
    {
        path: '/admin/routine/latest',
        component: LatestRoutine
    },
    {
        path: '/admin/routines',
        component: AllRoutines
    },
    {
        path: '/admin/routine/group',
        component: RoutineGroup
    },
    {
        path: '/admin/routine/group_teacher',
        component: GroupTeacher
    },
    {
        path: '/admin/routine/create',
        component: CreateRoutine
    },
    {
        path: '/admin/settings/classes',
        component: StudentClass
    },
    {
        path: '/admin/settings/subjects',
        component: Subject
    },
    {
        path: '/admin/settings/years',
        component: Year
    },
    {
        path: '/admin/settings/days',
        component: Day
    },
    {
        path: '/admin/settings/periods',
        component: Period
    },
    {
        path: '/admin/settings/sections',
        component: Section
    },
];