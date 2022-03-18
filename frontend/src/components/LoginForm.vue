<template>
  <div>
    <div class="mb-6">
      <div class="grid grid-cols-1 gap-3 mt-6">
        <div>
          <button
            @click="handleSignIn"
            class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"
          >
            <span class="sr-only"></span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              fill="currentColor"
              viewBox="0 0 20 20"
            >
              <path
                d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"
              />
            </svg>
          </button>
        </div>
      </div>
      <div class="relative">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-300" />
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2 text-gray-500 bg-white">
            Or continue with Sign in with google{{
              Vue3GoogleOauth.isInit
            }}</span
          >

          <span class="px-2 text-gray-500 bg-white">{{
            Vue3GoogleOauth.isAuthorized
          }}</span>
        </div>
      </div>
    </div>
    <form class="space-y-6" @submit.prevent="login">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">
          Email address
        </label>
        <div class="mt-1">
          <input
            id="email"
            v-model="user.email"
            name="email"
            type="email"
            autocomplete="email"
            required=""
            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">
          Password
        </label>
        <div class="mt-1">
          <input
            id="password"
            v-model="user.password"
            name="password"
            type="password"
            autocomplete="current-password"
            required=""
            class="block w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>
      </div>

      <div>
        <button
          type="submit"
          class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Sign In
        </button>
      </div>
    </form>
  </div>
</template>


<script>
import { inject } from "vue";

import store from "../store";
import { useRouter } from "vue-router";
export default {
  setup() {
    const router = useRouter();
    const user = {
      email: "",
      password: "",
    };
    const Vue3GoogleOauth = inject("Vue3GoogleOauth");

    function login() {
      store
        .dispatch("login", user)
        .then(() => {
          router.push({
            name: "Home",
          });
        })
        .catch((error) => {
          errorMsg.value = error.response.data.error;
        });
    }
    return {
      login,
      user,
      Vue3GoogleOauth,
    };
  },
  methods: {
    async handleSignIn() {
      try {
        const googleUser = await this.$gAuth.signIn();
        if (!googleUser) {
          return null;
        }
        await this.$store.dispatch("loginWithGoogle");

        // let user= googleUser.getBasicProfile().getEmail();
        //  console.log(user)
      } catch (error) {
        console.log(error);
        return null;
      }
    },
  },
};
</script>

<style lang="scss" scoped>
</style>
