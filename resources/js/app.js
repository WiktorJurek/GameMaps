import { createApp, markRaw } from 'vue';
import { createPinia } from 'pinia';
import './axios.js';
import App from './components/App.vue';
import router from './router';

const pinia = createPinia();
pinia.use(({ store }) => {
    store.router = markRaw(router);
});
const app = createApp(App);
app.use(pinia);
app.use(router);
app.mount('#app');