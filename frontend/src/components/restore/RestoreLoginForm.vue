<template>
  <div>
    <form class="space-y-6" @submit.prevent="submitLogin">
      <Alert v-if="error">
        <div class="flex flex-col">
          <p class="text-sm">* {{ error }}</p>
        </div>
        <span
          @click="error = null"
          class="
            w-8
            h-8
            flex
            items-center
            justify-center
            rounded-full
            transition-colors
            cursor-pointer
            hover:bg-[rgba(0,0,0,0.2)]
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-6 h-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M6 18L18 6M6 6l12 12"
            />
          </svg>
        </span>
      </Alert>
      <div class="relative">
        <input
          id="email"
          name="email"
          v-model="form.login"
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
      <div>
        <button
          :disabled="loading"
          :class="{
            'cursor-not-allowed': loading,
            'hover:bg-gray-400': loading,
          }"
          type="submit"
          class="flex justify-center w-full px-4 py-4 text-sm font-medium text-white bg-black border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent"
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
          Reset Password
        </button>
      </div>
    </form>
  </div>
</template>


<script setup>
import store from "../../store";
import { ref } from "vue";
import { useRouter } from "vue-router";
import Alert from "../../components/common/Alert.vue";

const router = useRouter();
const form = {
  login: "",
};
let error = ref(null);
const loading = ref(false);

function submitLogin() {
  loading.value = true;

  store
    .dispatch("user/sendCode", form)
    .then(() => {
      loading.value = false;
    })
    .catch((err) => {
      loading.value = false;
      error.value = err;
    });
}
</script>

<style lang="scss" scoped>
</style>
