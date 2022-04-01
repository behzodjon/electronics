<template>
  <div>
    <div class="mb-6">
      <div class="grid grid-cols-1 gap-3 mt-6">
        <div>
          <button
            @click="handleSignIn"
            class="
              inline-flex
              justify-center
              w-full
              p-4
              text-sm
              font-medium
              text-[#0F0F0F]
              bg-white
              border border-[#0F0F0F]
              shadow-sm
              rounded-lg
              hover:bg-white
            "
          >
            <div class="inline-flex space-x-2">
              <div>
                <span class="sr-only"></span>
                <figure>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    x="0px"
                    y="0px"
                    width="20"
                    height="20"
                    viewBox="0 0 48 48"
                    style="fill: #000000"
                  >
                    <path
                      fill="#FFC107"
                      d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"
                    ></path>
                    <path
                      fill="#FF3D00"
                      d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"
                    ></path>
                    <path
                      fill="#4CAF50"
                      d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"
                    ></path>
                    <path
                      fill="#1976D2"
                      d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"
                    ></path>
                  </svg>
                </figure>
              </div>
              <span> Continue with Google</span>
            </div>
          </button>
        </div>
      </div>
      <div class="relative mt-4">
        <div class="absolute inset-0 flex items-center">
          <div class="w-full border-t border-gray-300" />
        </div>
        <div class="relative flex justify-center text-sm">
          <span class="px-2 text-gray-500 uppercase bg-white"> or </span>
        </div>
      </div>
    </div>
    <form class="space-y-6" @submit.prevent="register">
      <Alert
        v-if="Object.keys(errors).length"
        class="flex-col items-stretch text-sm"
      >
        <div v-for="(field, i) of Object.keys(errors)" :key="i">
          <div v-for="(error, ind) of errors[field] || []" :key="ind">
            * {{ error }}
          </div>
        </div>
      </Alert>
      <div class="relative">
        <input
          id="name"
          name="name"
          type="text"
          v-model="user.name"
          autocomplete="name"
          required
          placeholder="Name"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            rounded-lg
            border-2 border-[#EAEAEB]
            focus:border-transparent focus:ring-[#0BADA2]
          "
        />
        <label for="name" class="form-label">Full name</label>
      </div>
      <div class="relative">
        <input
          id="email"
          name="email"
          v-model="user.email"
          type="text"
          required
          placeholder="Email"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            rounded-lg
            border-2 border-[#EAEAEB]
            focus:border-transparent focus:ring-[#0BADA2]
          "
        />
        <label for="email" class="form-label">Email address</label>
      </div>

      <div class="relative">
        <input
          id="password"
          v-model="user.password"
          name="password"
          type="password"
          autocomplete="current-password"
          required
          placeholder="Password"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            rounded-lg
            border-2 border-[#EAEAEB]
            focus:border-transparent focus:ring-[#0BADA2]
          "
        />
        <label for="password" class="form-label"> Password </label>
      </div>
      <div class="relative">
        <input
          id="password_confirmation"
          v-model="user.password_confirmation"
          name="password_confirmation"
          type="password"
          autocomplete="password_confirmation"
          required
          placeholder="password_confirmation"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            rounded-lg
            border-2 border-[#EAEAEB]
            focus:border-transparent focus:ring-[#0BADA2]
          "
        />
        <label for="password_confirmation" class="form-label">
          Password confirmation
        </label>
        <p class="text-[#010101] text-xs mt-4">
          At least 8 characters, 1 uppercase letter, 1 number & 1 symbol
        </p>
      </div>
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input
            id="check"
            name="privacy"
            type="checkbox"
            v-model="acceptPrivacy"
            class="w-4 h-4 text-black border-gray-300 rounded focus:ring-black"
          />
          <label for="check" class="block ml-2 text-sm text-gray-900">
            <p class="text-xs text-[#949494] mt-2">
              By signing up, you agree to the
              <a href="#" class="text-black">Terms of Service</a> and
              <a href="#" class="text-black">Privacy Policy</a>
            </p>
          </label>
        </div>
      </div>

      <div>
        <button
          :disabled="!acceptPrivacy || loading"
          :class="{
            'pointer-events-none opacity-40': !acceptPrivacy || loading,
          }"
          type="submit"
          class="flex justify-center w-full px-4 py-4 text-sm font-medium text-white bg-black border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          <svg
            v-if="loading"
            class="w-5 h-5 mr-3 -ml-1 text-white animate-spin"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
          >
            <circle
              class="opacity-25"
              cx="12"
              cy="12"
              r="10"
              stroke="currentColor"
              stroke-width="4"
            ></circle>
            <path
              class="opacity-75"
              fill="currentColor"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
            ></path>
          </svg>
          Sign Up
        </button>
      </div>
    </form>
  </div>
</template>

<script >
import { ref } from "vue";
import { inject } from "vue";

import store from "../store";
import { useRouter } from "vue-router";
import Alert from "../components/common/Alert.vue";

export default {
  components: { Alert },

  setup() {
    const router = useRouter();
    const user = {
      name: "",
      email: "",
      password: "",
    };
    const Vue3GoogleOauth = inject("Vue3GoogleOauth");

    const errors = ref({});
    const loading = ref(false);

    const acceptPrivacy = ref(false);

    function register() {
      loading.value = true;

      store
        .dispatch("user/register", user)
        .then(() => {
          loading.value = false;

          router.push({
            name: "Home",
          });
        })
        .catch((error) => {
          loading.value = false;

          if (error.response.status === 422) {
            errors.value = error.response.data.errors;
          }
        });
    }
    return {
      register,
      loading,
      acceptPrivacy,
      user,
      errors,
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
        await this.$store.dispatch(
          "loginWithGoogle",
          googleUser.getAuthResponse().access_token
        );
        this.$router.push({ name: "Home" });
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