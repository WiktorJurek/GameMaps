<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-purple-700">GameMaps<img src="/assets/icons/logo.png" width="50" height="50"></h1>
            <form class="space-y-4" @submit.prevent="authStore.handleLogin(form)">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input type="email" v-model="form.email" placeholder="Email Address" class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" v-model="form.password" placeholder="Enter Password"
                        class="w-full input input-bordered input-primary" />
                </div>
                <div>
                    <button class="btn btn-block btn-primary">Login</button>
                </div>
                <span>Don't have an account ?
                    <router-link :to="{name: 'Register'}" class="text-blue-600 hover:text-blue-800 hover:underline">Sign up</router-link></span>
            </form>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue';
import { useAuthStore } from '../../stores/auth';

const authStore = useAuthStore();

const form = ref({
    email: '',
    password: ''
});

</script>

<style>
</style>