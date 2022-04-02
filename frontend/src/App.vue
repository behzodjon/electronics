<template>
<div class="bg-[#F9F9F9] ">
<navbar></navbar>
<router-view v-slot="{ Component }">
<transition name="route" mode="out-in">
<component :is="Component"></component>
</transition>
  </router-view>

</div>
</template>

<script>
import navbar from "./views/navbar.vue";

export default {
  components: {
    navbar,
},
  
};
</script>

<style>
</style>