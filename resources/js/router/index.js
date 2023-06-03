import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/pages/Home.vue';
import Games from '../components/pages/Games.vue';
import Map from '../components/pages/Map.vue';
import Profile from '../components/pages/Profile.vue';
import notFound from '../components/NotFound.vue';

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/games',
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
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router