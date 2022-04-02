<template>
  <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <router-link :to="{ name: 'Home' }">
        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
          The Ultimate Electronic BuyBack Marketplace.
        </h2>
      </router-link>

        <div class="my-4 text-2xl text-center text-[#010101]">Reset Password</div>
            <router-link :to="{ name: 'Login' }">
        <h2 class="mt-6 text-left text-gray-900 text-md font-baseline">
          Back to Log in / Sign Up
        </h2>
      </router-link>
    </div>

    

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-md ">
      <div class="px-4 py-8 bg-white border-[#D5D6D7] border rounded-lg sm:px-10">
        <p class="text-sm text-center text-[#010101] mb-4">Please enter the email address that is associated with your account.</p>
        <div v-if="mode == 'login'">
          <RestoreLoginForm />
        </div>
        <div v-if="mode == 'code'">
          <NewPasswordForm />
        </div>
      </div>
    </div>
  </div>
</template>
<script setup>
import RestoreLoginForm from "../components/restore/RestoreLoginForm.vue";
import NewPasswordForm from "../components/restore/NewPasswordForm.vue";
import store from "../store";
import { computed } from "vue";

store.commit("user/setRestorePasswordMode", "login");
store.commit("user/setRestorePasswordEmail", null);

const mode = computed(() => store.state.user.restorePassword.mode);
</script>
