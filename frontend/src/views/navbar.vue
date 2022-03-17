
<template>
  <header class="bg-neutral-900">
    <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8" aria-label="Top">
      <div class="flex items-center justify-between w-full py-6 lg:border-none">
        <div class="flex items-center">
          <a href="#">
            <span class="sr-only">Nav</span>
            <img
              class="h-5"
              src="https://d1eh9yux7w8iql.cloudfront.net/front/public/statics/pastrami/img/logo_animated_bm.gif"
              alt=""
            />
          </a>
          <div class="hidden ml-10 space-x-8 lg:block">
            <a
              v-for="link in navigation"
              :key="link.name"
              :href="link.href"
              class="text-base text-white font-baseline hover:text-indigo-50"
            >
              {{ link.name }}
            </a>
          </div>
          <div v-if="isLoggedIn" class="hidden ml-10 space-x-8 lg:block">
            <router-link to="#" class="font-semibold text-white text-md"
              >{{user.name}}</router-link
            >
              <router-link to="#" @click="logout" class="font-semibold text-white text-md"
              >Logout</router-link
            >
          </div>
          <div v-else class="hidden ml-10 space-x-8 lg:block">
            <router-link to="/Login" class="font-semibold text-white text-md"
              >Login</router-link
            >
            <router-link to="/Signup" class="font-semibold text-white text-md"
              >Sign Up</router-link
            >
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
    const isLoggedIn = computed(() => store.getters.isAuthenticated);
    const user = computed(() => store.state.user.data);
    const router = useRouter();

    function logout() {
      store.dispatch("logout").then(() => {
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