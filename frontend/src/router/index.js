import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Signup from '../views/Signup.vue'
import Sell from '../views/Sell.vue'
import RestorePassword from '../views/restore-password.vue'
import checkout from "../views/checkout/cartwithproducts.vue"
import billinformation from "../views/checkout/billinformation.vue"
import PaymentMethod from "../views/checkout/payment-method.vue"
import DeliveryMethod from "../views/checkout/delivery-method.vue"
import Confirmation from "../views/checkout/confirmation.vue"
import CheckoutLayout from "../layouts/CheckoutLayout.vue"
import HomeLayout from "../layouts/HomeLayout.vue"
import AdminLayout from "../layouts/AdminLayout.vue"
import AdminDashboard from "../views/admin/dashboard.vue"
import store from '../store';

const routes = [
  {
    path: '/admin',
    component: AdminLayout,
    children:[
      { path: '/admin', name: 'AdminDashboard', component: AdminDashboard },
    ]
  },

  {
    path: '/',
    component: HomeLayout,
    children: [
      { path: '/', name: 'Home', component: Home },
      { path: '/login', name: 'Login', component: Login },
      { path: '/signup', name: 'Signup', component: Signup },
      { path: '/restore-password', name: 'RestorePassword', component: RestorePassword },
      { path: '/Sell', name: 'Sell', component: Sell },
      //checkout
      {
        path: '/',
        component: CheckoutLayout,
        children: [
          {
            path: '/checkout', name: 'Checkout',
            component: checkout
          },
          {
            path: '/cart-info', name: 'Cartinfo',
            meta: { requiresAuth: true },
            component: billinformation
          },
          {
            path: '/payment', name: 'PaymentMethod',
            meta: { requiresAuth: true },
            component: PaymentMethod,
            beforeEnter: (to, from) => {
              if (!store.state.cart.activeRoute) {
                return false
              }
              return true
            },
          },
          {
            path: '/delivery', name: 'DeliveryMethod',
            meta: { requiresAuth: true },
            component: DeliveryMethod,
            beforeEnter: (to, from) => {
              if (!store.state.cart.activeRoute) {
                return false
              }
              return true
            },
          },
          {
            path: '/confirmation', name: 'Confirmation',
            meta: { requiresAuth: true },
            component: Confirmation,
            beforeEnter: (to, from) => {
              if (!store.state.cart.activeRoute) {
                return false
              }
              return true
            },
          },
        ]
      },
    ]
  },


];

const router = createRouter({
  history: createWebHistory(),
  routes,
  linkActiveClass: 'active-link'
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.user.token) {
    next({ name: "Login", query: { redirect: '/cart-info' } });
  }
  else {
    next();
  }
});

export default router;