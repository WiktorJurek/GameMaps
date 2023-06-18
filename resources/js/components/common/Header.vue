<template>
    <nav class="navbar bg-base-100 sticky top-0">
        <div class="flex-1">
            <router-link :to="{name: 'Games'}" class="btn btn-ghost normal-case text-xl">GameMaps<img src="/assets/icons/logo.png" width="30" height="30"></router-link>
        </div>
        <div class="flex-none">
            <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full bg-neutral">
                <img src="/assets/icons/user_white.png" />
                </div>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                <a class="justify-between">
                    Profile
                </a>
                </li>
                <template v-if="!authStore.user">
                    <li><router-link :to="{name: 'Login'}">Login</router-link></li>
                    <li><router-link :to="{name: 'Register'}">Register</router-link></li>
                </template>
                <template v-else>
                    <li v-if="authStore.user" @click="authStore.handleLogout"><router-link :to="{name: 'Home'}">Logout</router-link></li>
                </template>
            </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { useAuthStore } from '../../stores/auth';
const authStore = useAuthStore();
</script>

<style>
nav {
    z-index: 9999;
}
</style>