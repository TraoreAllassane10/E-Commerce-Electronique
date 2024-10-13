import './bootstrap';
import '../css/app.css';

import { createApp, h, inject, reactive, ref } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

//Cette variable controle l'authentification de l'utilisateur
let logged = ref(false)
let user = ref('')

const changeLogged = () => {
    if (localStorage.getItem('user_token')) {
        logged.value = true
    }
    else
    {
        logged.value = false
    }
}


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .provide('logged', {logged, user,changeLogged})
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
