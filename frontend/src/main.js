import { createApp } from 'vue'
import { createStore } from 'vuex'
import App from './App.vue'
import './index.css'
import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import Login from './views/Login.vue'
import Signup from './views/Signup.vue'
import Sell from './views/Sell.vue'
import 'animate.css';




// Create a new store instance.
const store = createStore({
    state() {
        return {
            storageList: [],
            storageId: null,
            productId: null,
            conditionId: null
        }
    },
    mutations: {
        setStorageList(state, payload) {
            state.storageList = payload
        },
      
        setProductId(state, payload) {
            state.productId = payload
        },
        setStorageId(state, payload) {
            state.storageId = payload
        },
        setConditionId(state, payload) {
            state.conditionId = payload
        }
    },

    getters: {
        storagesList(state) {
            return state.storageList
        },
        productId(state) {
            return state.productId
        },
        storageId(state) {
            return state.storageId
        },
        conditionId(state) {
            return state.conditionId
        }
    }
})


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
