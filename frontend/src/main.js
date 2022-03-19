import { createApp } from 'vue'
import store from './store'
import router from './router'
import App from './App.vue'
import './index.css'
import 'animate.css';
import gAuthPlugin from 'vue3-google-oauth2';

let gauthClientId = import.meta.env.VITE_GOOGLE_CLIENT_ID;




const app = createApp(App)
app.use(router)
app.use(store)
app.use(gAuthPlugin, { clientId: gauthClientId, scope: 'email', prompt: 'consent', fetch_basic_profile: false })
app.mount('#app')
