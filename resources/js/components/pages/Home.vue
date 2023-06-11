<template>
    <div v-if="authStore.user">
        <h1>Welcome, {{ authStore.user.name }}!</h1>
    </div>
    <div v-else>
        <h1>Welcome guest!</h1>
    </div>
</template>

<script setup>
import { onMounted } from 'vue';
import { useAuthStore } from '../../stores/auth';

const authStore = useAuthStore();

onMounted(async () => {
    await authStore.getUser();
})

</script>

<style>
</style>