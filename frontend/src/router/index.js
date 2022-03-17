import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Signup from '../views/Signup.vue'
import Sell from '../views/Sell.vue'
import store from "../store";

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
  { path: '/Signup', name: 'Signup', component: Signup },
  { path: '/Sell', name: 'Sell', component: Sell },

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