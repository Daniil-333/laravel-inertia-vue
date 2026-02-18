import { createInertiaApp } from '@inertiajs/vue3'
import { createApp, h } from 'vue';
import { defineRoutes } from 'momentum-trail';
import { createPinia } from 'pinia'
import routes from './routes.json';
import Layout from './Layouts/Layout.vue';

defineRoutes(routes);

createInertiaApp({
    resolve: name => {
        console.log(name)
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });

        const path = `./Pages/${name}.vue`;
        const page = pages[path];

        if (!page) {
            console.error(`Page not found: ${name}`);
            const NotFound = pages['./Pages/Error/404.vue'];
            if (NotFound) {
                NotFound.default.layout = NotFound.default.layout || Layout;
                return NotFound.default;
            }
            throw new Error(`Page ${name} not found`);
        }

        page.default.layout = page.default.layout || Layout;
        return page.default;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(createPinia())
            .mount(el)
    },
    progress: {
        delay: 250,
        color: '#29d',
        includeCSS: true,
        showSpinner: false,
    },
})
