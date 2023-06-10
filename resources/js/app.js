import { createApp } from 'vue';
import { createPinia } from 'pinia';
import './axios.js';
import App from './components/App.vue';
import router from './router';

const pinia = createPinia();
const app = createApp(App);
app.use(pinia);
app.use(router);
app.mount('#app');