
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './views/App'
import Hello from "./views/Hello"
import Home from './views/Home'
import User from './views/user'
import UsersIndex from './views/UsersIndex'
import AudioIndex from './views/UsersList'
import Auth from './views/Auth'
import direct from './views/direct'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/direct:id',
            name: 'direct',
            props:true,
            component: direct
        },
        {
            path: '/user:id',
            name: 'home',
            props:true,
            component: User
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
        {
            path: '/users',
            name: 'users.index',
            component: UsersIndex,
        },
        {
            path: '/audio',
            name: 'audio.index',
            component: AudioIndex,
        },
        {
            path: '/auth',
            name: 'auth.index',
            component: Auth,
        },

    ],
});



const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
