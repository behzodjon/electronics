import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import Sign from "./views/Sign.vue";

Vue.use(Router);

export default new Router ({
    routers: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/sign",
            name: "sign",
            component: Sign
        }
    ]
})