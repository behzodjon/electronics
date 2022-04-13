<template>
    <div>
        <h1>Edit category</h1>
        <UpdateOrCreateCategory :category="category" />
    </div>
</template>

<script setup>
import UpdateOrCreateCategory from "../../../components/admin/UpdateOrCreateCategory.vue";
import axiosClient from "../../../axios";
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
const route = useRoute();

const category = ref(null)

onMounted(async () => {
    const { data } = await axiosClient.get(`/categories/${route.params.id}`)
    category.value = data
})
</script>