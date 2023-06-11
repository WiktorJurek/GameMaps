<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden bg-primary">
        <div class="w-full p-6 m-auto bg-neutral rounded-md shadow-md lg:max-w-xl border-4 border-secondary">
            <h1 class="text-3xl font-semibold text-center text-primary">GameMaps</h1><img src="/assets/icons/logo.png" width="35" height="35">
            <form class="space-y-4" @submit.prevent="authStore.handleLogin(form)">
                <div>
                    <label class="label">
                        <span class="text-base label-text text-primary">Email</span>
                    </label>
                    <input type="email" v-model="form.email" placeholder="Email Address" class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.email"><span class="text-primary p-2">{{ authStore.errors.email[0] }}</span></div></div>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text text-primary">Password</span>
                    </label>
                    <input type="password" v-model="form.password" placeholder="Enter Password"
                        class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.password"><span class="text-primary p-2">{{ authStore.errors.password[0] }}</span></div></div>
                </div>
                <div>
                    <button class="btn btn-block btn-primary">Login</button>
                </div>
                <span><router-link :to="{name: 'ForgotPassword'}" class="text-primary hover:underline">Forget password?</router-link></span>
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