import Vue from "vue";
import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import AtComponents from "at-ui";
import "at-ui-style";

import SiteLayout from "@/components/SiteLayout";

import ClickAway from "@/Mixins/ClickAway";

Vue.use(AtComponents);
Vue.use(plugin);
Vue.mixin({
    methods: { route },
    directives: {
        "click-away": ClickAway
    }
});

InertiaProgress.init();

const el = document.getElementById("app");

new Vue({
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name =>
                    import(`@/Pages/${name}`)
                        // .then(module => module.default)
                        .then(({ default: page }) => {
                            if (
                                page.layout === undefined &&
                                !name.startsWith("NoLayout/")
                            ) {
                                page.layout = SiteLayout;
                            }
                            return page;
                        })
            }
        })
}).$mount(el);
