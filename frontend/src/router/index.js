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
import AdminLogin from "../views/admin/login.vue"
import AdminCategories from "../views/admin/categories/index.vue"
import AdminDevices from "../views/admin/devices/index.vue"
import AdminCreateCategory from "../views/admin/categories/create.vue"
import AdminEditCategory from "../views/admin/categories/edit.vue"
import AdminCreateDevice from "../views/admin/devices/create.vue"
import AdminEditDevice from "../views/admin/devices/edit.vue"
import store from '../store';

const routes = [
  {
    path: '/admin/login', name: 'AdminLogin', component: AdminLogin
  },
  {
    path: '/admin',
    meta: {
      requiresAuth: true,
      admin: true
    },
    component: AdminLayout,
    children: [
      { path: '/admin', name: 'AdminDashboard', component: AdminDashboard },
      { path: '/admin/categories', name: 'AdminCategories', component: AdminCategories },
      { path: '/admin/categories/create', name: 'AdminCreateCategory', component: AdminCreateCategory },
      { path: '/admin/categories/:id/edit', name: 'AdminEditCategory', component: AdminEditCategory },

      //devices
      { path: '/admin/devices', name: 'AdminDevices', component: AdminDevices },
      { path: '/admin/devices/create', name: 'AdminCreateDevice', component: AdminCreateDevice },
      { path: '/admin/devices/:id/edit', name: 'AdminEditDevice', component: AdminEditDevice },

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
  const loggedIn = store.state.user.token;
  const isAdmin = store.state.user.data.is_admin;
  if (to.meta.admin) {
    if (to.meta.requiresAuth) {
      if (!loggedIn) {
        next({ name: "Login" });
      } else {
        next()
      }
    } else {
      if (!loggedIn) {
        next()
      } else if (loggedIn) {
        if (isAdmin) {
          next({ name: "AdminDashboard" });
        } else {
          next()
        }
      }
    }
  } else {
    if (to.meta.requiresAuth && !loggedIn) {
      next({ name: "Login", query: { redirect: '/cart-info' } });
    } else {
      next();
    }
  }
});

export default router;