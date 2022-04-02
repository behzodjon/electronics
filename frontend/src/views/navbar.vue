<template>
  <header class="bg-[#0C0D0D]">
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
      <div class="flex items-center justify-between w-full py-6 lg:border-none">
        <div class="flex items-center">
          <router-link to="/">
            <span class="sr-only">Nav</span>
            <img
              class="h-5"
              src="https://d1eh9yux7w8iql.cloudfront.net/front/public/statics/pastrami/img/logo_animated_bm.gif"
              alt
            />
          </router-link>
          <div class="hidden ml-10 mr-4 space-x-8 lg:block">
            <a
              v-for="link in navigation"
              :key="link.name"
              :href="link.href"
              class="text-base text-white font-baseline hover:text-indigo-50"
            >{{ link.name }}</a>
          </div>

          <div v-if="isLoggedIn" class="space-x-4 lg:block">
            <router-link to="#" class="font-semibold text-white text-md">{{ user.name }}</router-link>
            <router-link to="#" @click="logout" class="font-semibold text-white text-md">Logout</router-link>
          </div>
          <div v-else class="lg:block">
            <router-link
              to="/Login"
              class="px-4 pt-1 pb-2 text-white border rounded-full text-md font-baseline hover:border-2"
            >Login/Signup</router-link>
          </div>
          <div class="ml-4">
            <router-link
              to="/checkout"
              class="px-4 pt-1 pb-2 text-white border rounded-full text-md font-baseline hover:border-2"
            >Checkout</router-link>
          </div>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import store from "../store";
import { computed } from "vue";
import { useRouter } from "vue-router";

const navigation = [
  { name: "About Us", href: "#" },
  { name: "Our Process", href: "#" },
  { name: "Recycle", href: "#" },
  { name: "Company", href: "#" },
  { name: "Solutions", href: "#" },
];

export default {
  setup() {
    const isLoggedIn = computed(() => store.getters['user/isAuthenticated']);
    const user = computed(() => store.state.user.data);
    const router = useRouter();

    function logout() {
      store.dispatch("user/logout").then(() => {
        router.push({
          name: "Home",
        });
      });
    }
    return {
      logout,
      navigation,
      user,
      isLoggedIn,
    };
  },
};


</script>

