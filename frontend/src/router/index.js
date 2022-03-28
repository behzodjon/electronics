import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Signup from '../views/Signup.vue'
import Sell from '../views/Sell.vue'
import RestorePassword from '../views/restore-password.vue'
import store from "../store"; 
import checkout from "../views/checkout/cartwithproducts.vue"
import billinformation from "../views/checkout/billinformation.vue"

const routes = [

  
//   {
//     path: "/auth",
//     redirect: "/login",
//     name: "Auth",
//     component: AuthLayout,
//     meta: {isGuest: true},
//     children: [
//       {
//         path: "/login",
//         name: "Login",
//         component: Login,
//       },
//       {
//         path: "/Signup",
//         name: "Signup",
//         component: Signup,
//       },
//     ],
//   },
  { path: '/', name: 'Home', component: Home, },
  { path: '/login', name: 'Login', component:Login },
  { path: '/signup', name: 'Signup', component: Signup },
  { path: '/restore-password', name: 'RestorePassword', component:RestorePassword },
  { path: '/Sell', name: 'Sell', component: Sell },
  { path: '/checkout', name: 'Checkout', component: checkout },
  { path: '/cart-info', name: 'Cartinfo', component: billinformation },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

// router.beforeEach((to, from, next) => {
//   if (to.meta.requiresAuth && !store.state.user.token) {
//     next({ name: "Login" });
//   } else if (store.state.user.token && to.meta.isGuest) {
//     next({ name: "Dashboard" });
//   } else {
//     next();
//   }
// });

export default router;