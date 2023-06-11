import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/pages/Home.vue';
import Games from '../components/pages/Games.vue';
import Map from '../components/pages/Map.vue';
import Profile from '../components/pages/Profile.vue';
import notFound from '../components/NotFound.vue';
import ForgotPassword from '../components/pages/ForgotPassword.vue';
import ResetPassword from '../components/pages/ResetPassword.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: () => import("../components/pages/Login.vue")
    },
    {
        path: '/register',
        name: 'Register',
        component: () => import("../components/pages/Register.vue")
    },
    {
        path: '/games',
        name: 'Games',
        component: Games
    },
    {
        path: '/map/:gameName',
        component: Map
    },
    {
        path: '/profile',
        component: Profile
    },
    {
        path: '/forgot-password',
        name: 'ForgotPassword',
        component: ForgotPassword
    },
    {
        path: '/password-reset/:token',
        name: 'ResetPassword',
        component: ResetPassword
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router