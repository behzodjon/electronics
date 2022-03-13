import { createApp } from 'vue'
import store from './store'
import App from './App.vue'
import './index.css'
import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import Login from './views/Login.vue'
import Signup from './views/Signup.vue'
import Sell from './views/Sell.vue'
import 'animate.css';






const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', name: 'Home', component: Home, },
        { path: '/Login', name: 'Login', component: Login },
        { path: '/Signup', name: 'Signup', component: Signup },
        { path: '/Sell', name: 'Sell', component: Sell },
    ]

});

const app = createApp(App)
app.use(router)
app.use(store)
app.mount('#app')
