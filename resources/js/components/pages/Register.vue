<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-purple-700">GameMaps<img src="/assets/icons/logo.png" width="50" height="50"></h1>
            <form class="space-y-4" @submit.prevent="authStore.handleRegister(form)">
                <div>
                    <label class="label">
                        <span class="text-base label-text">Name</span>
                    </label>
                    <input type="text" placeholder="Name" v-model="form.name" class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.name"><span class="text-primary p-2">{{ authStore.errors.name[0] }}</span></div></div>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input type="text" placeholder="Email Address" v-model="form.email" class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.email"><span class="text-primary p-2">{{ authStore.errors.email[0] }}</span></div></div>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input type="password" placeholder="Enter Password" v-model="form.password"
                        class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.password"><span class="text-primary p-2">{{ authStore.errors.password[0] }}</span></div></div>
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Confirm Password</span>
                    </label>
                    <input type="password" placeholder="Confirm Password" v-model="form.password_confirmation"
                        class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.password_confirmation"><span class="text-primary p-2">{{ authStore.errors.password_confirmation[0] }}</span></div></div>
                </div>
                <div>
                    <button class="btn btn-block btn-primary">Sign Up</button>
                </div>
                <span>Already have an account ?
                    <router-link :to="{name: 'Login'}" class="text-blue-600 hover:text-blue-800 hover:underline">Login</router-link></span>
            </form>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue';
import { useAuthStore } from '../../stores/auth';

const authStore = useAuthStore();

const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

</script>

<style>
</style>