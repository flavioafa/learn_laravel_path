import { createApp, h } from "vue";
import { createInertiaApp, Head, Link } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import Layout from "./Shared/Layout.vue";

//Link interessante
// https://github.com/laravel/vite-plugin/blob/main/UPGRADE.md#migrating-from-vite-to-laravel-mix
//Qual a diferença entre essas duas forma de resolve de página?
//O primeiro veio da documentação do inertia, o segundo do link acima
//Percebi que o segundo, na build, gera vários arquivos

createInertiaApp({
    //   resolve: name => {
    //     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    //     return pages[`./Pages/${name}.vue`]
    //   },
    resolve: async (name) => {
        // Resolve the page component asynchronously
        const page = await resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue')
        );
        // Add the layout to the page component if there is no default layout set
        if (page.default.layout === undefined) {
            page.default.layout = Layout;
        }
        // Return the page component
        return page;
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 0,
        // The color of the progress bar...
        color: "green",
        // Whether to include the default NProgress styles...
        includeCSS: true,
        // Whether the NProgress spinner will be shown...
        showSpinner: true,
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Link", Link) //Registro global de componente
            .component('Head', Head) //Registro global de componente
            .mount(el);
    },
    title: title => `My App - ${title}` //Definindo o titulo da página dinamicamente
});
