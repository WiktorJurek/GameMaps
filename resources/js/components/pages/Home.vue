<template>
<h1>Welcome, {{ user?.name }}!</h1>
</template>

<script setup>
import {ref, onMounted } from 'vue';
import axios from 'axios';

const user = ref();

onMounted(async () => {
    const data = await axios.get('/api/user');
    user.value = data.data;
    console.log(user.value);
})
</script>

<style>
</style>