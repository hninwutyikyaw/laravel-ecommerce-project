import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from './components/ExampleComponent.vue';
import StudentComponent from './components/StudentComponent.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: "/vue",
        name: 'example-component',
        component: ExampleComponent
    },
    {
        path: "/vue/student",
        name: 'student-component',
        component: StudentComponent
    }
];

const router = new VueRouter({
    hashband: false,
    history: true,
    mode: "history",
    routes
});

export default router; 