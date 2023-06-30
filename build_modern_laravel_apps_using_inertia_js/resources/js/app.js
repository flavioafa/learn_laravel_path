import { createApp, h } from "vue";
import { Link, createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import Layout from './Shared/Layout.vue';

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
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        // page.default.layout = name.startsWith('Public/') ? undefined : Layout //Forma de importar considerando a pasta, no caso de não usar layout. Ex.: Login
        page.default.layout ??= Layout
        return page
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
            .mount(el);
    },
});
