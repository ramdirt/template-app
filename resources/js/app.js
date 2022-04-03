import { createApp, h } from "vue";
import store from "./store/";
import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";
import Default from "@/layout/Default.vue";

createInertiaApp({
    resolve: async (name) => {
        let page = await import(`@/Pages/${name}`);

        page = page.default;

        if (page.layout === undefined) {
            page.layout = Default;
        }

        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(store)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);
    },
    title: (title) => `${title} - My App`,
});
