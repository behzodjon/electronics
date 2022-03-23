<template>
  <div>
    <form class="space-y-6" @submit.prevent="submitPassword">
      <Alert v-if="errors">
        <div class="flex flex-col">
          <div v-for="(v, k) in errors" :key="k">
            <p v-for="error in v" :key="error" class="text-sm">* {{ error }}</p>
          </div>
        </div>
        <span
          @click="errors = null"
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
          id="code"
          name="text"
          v-model="form.code"
          type="text"
          required
          placeholder="Code"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            border border-[#e5e7ea]
            focus:border-transparent focus:ring-black
          "
        />
        <label for="code" class="form-label">Code</label>
      </div>

      <div class="relative">
        <input
          id="password"
          v-model="form.password"
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
            border border-[#e5e7ea]
            focus:border-transparent focus:ring-black
          "
        />
        <label for="password" class="form-label"> Password </label>
      </div>
      <div class="relative">
        <input
          id="password_confirmation"
          v-model="form.password_confirmation"
          name="password_confirmation"
          type="password"
          autocomplete="password_confirmation"
          required
          placeholder="Password confirmation"
          class="
            w-full
            text-gray-900
            placeholder-transparent
            h-14
            peer
            focus:outline-none
            border border-[#e5e7ea]
            focus:border-transparent focus:ring-black
          "
        />
        <label for="password_confirmation" class="form-label">
          Password confirmation</label
        >
      </div>
      <div>
        <button
          type="submit"
          class="flex justify-center w-full px-4 py-4 text-sm font-medium text-white bg-black border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-transparent"
        >
          Send
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
import { computed } from "vue";

const router = useRouter();
const form = {
  code: "",
  password: "",
  password_confirmation: "",
};
let errors = ref(null);
const email = computed(() => store.state.restorePassword.email.login);

function submitPassword() {
  store
    .dispatch("setNewPassword", {
      ...form,
      email:email.value,
    })
    .then(() => {
      router.push({
        name: "Home",
      });
    })
    .catch((err) => {
      console.log(err);
    });
}
</script>

<style lang="scss" scoped>
</style>
