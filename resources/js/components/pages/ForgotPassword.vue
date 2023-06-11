<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden bg-primary">
        <div class="w-full p-6 m-auto bg-neutral rounded-md shadow-md lg:max-w-xl border-4 border-secondary">
            <h1 class="text-3xl font-semibold text-center text-primary">GameMaps</h1><img src="/assets/icons/logo.png" width="35" height="35">
            <form class="space-y-4" @submit.prevent="authStore.handleForgotPassword(email)">
                <div v-if="authStore.status" class="m-2 p-2 bg-info rounded-md text-primary">
                    {{ authStore.status }}
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text text-primary">Email</span>
                    </label>
                    <input type="email" v-model="email" placeholder="Email Address" class="w-full input input-bordered input-primary" />
                    <div class="p-2"><div class="rounded-md shadow-md bg-error p-2" v-if="authStore.errors.email"><span class="text-primary p-2">{{ authStore.errors.email[0] }}</span></div></div>
                </div>
                <button class="btn btn-block btn-primary">Reset password</button>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import { useAuthStore } from '../../stores/auth';

    const authStore = useAuthStore();

    const email = ref('');
</script>

<style>
</style>