import Vue from 'vue';
import VueRouter from 'vue-router';

import UserList from './components/admin/UserComponent.vue';
import DogList from './components/DogListComponent.vue';
import DogForm from './components/DogFormComponent.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/dogs',
            name: 'listDogs',
            component: DogList
        },
        {
            path: '/dogs/create',
            name: 'createDog',
            component: DogForm
        },
        {
            path: '/dogs/edit/:id',
            name: 'editDog',
            component: DogForm
        },
        {
            path: '/admin/users',
            name: 'usersList',
            component: UserList
        },
        {
            path: '/admin/users/:id/dogs',
            name: 'listUserDogs',
            component: DogList
        },
    ]
});

export default router;