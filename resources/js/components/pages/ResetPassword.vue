<template>
    <div class="relative flex flex-col justify-center h-screen overflow-hidden">
        <div class="w-full p-6 m-auto bg-white rounded-md shadow-md lg:max-w-xl">
            <h1 class="text-3xl font-semibold text-center text-purple-700">GameMaps<img src="/assets/icons/logo.png" width="50" height="50"></h1>
            <form class="space-y-4" @submit.prevent="authStore.handleResetPassword(form)">
                <div v-if="authStore.status" class="m-2 p-2 bg-info rounded-md text-primary">
                    {{ authStore.status }}
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">New password</span>
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
                    <button class="btn btn-block btn-primary">Reset password</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { ref } from 'vue';
    import { useAuthStore } from '../../stores/auth';
    import { useRoute } from 'vue-router';

    const route = useRoute();
    const authStore = useAuthStore();

    const form = ref({
        password: '',
        password_confirmation: '',
        email: route.query.email,
        token: route.params.token
    });

</script>

<style>
</style>