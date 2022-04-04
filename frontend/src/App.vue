<template>
  <div class="bg-[#F9F9F9]">
    <navbar></navbar>
    <router-view v-slot="{ Component }">
      <transition name="route" mode="out-in">
        <component :is="Component"></component>
      </transition>
    </router-view>
    
  </div>
</template>

<script setup>
import navbar from "./views/navbar.vue"
import { computed } from "vue";
import { useStore } from "vuex";
const store = useStore();
const isLoggedIn = computed(() => store.getters['user/isAuthenticated']);

if (isLoggedIn.value) {
  store.dispatch("user/getUser");
}
store.dispatch("cart/fetchCart");


</script>

<style>
</style>