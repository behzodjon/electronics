<template>
    <div>
        <h1 class="text-3xl">Edit device</h1>
        <UpdateOrCreateDevice />
    </div>
</template>

<script setup>
import UpdateOrCreateDevice from "../../../components/admin/UpdateOrCreateDevice.vue";
import axiosClient from "../../../axios";
import { ref, onMounted } from "vue";
import {  useRoute } from "vue-router";

const route = useRoute();
const product = ref(null)

onMounted(async () => {
    const productData = await axiosClient.get(`/products/${route.params.id}`)
    console.log(productData.data.data)
    product.value = productData.data.data
})
</script>