<template>
    <form v-if="category" @submit.prevent="onSubmit"
        class="grid grid-cols-1 space-y-8 divide-y divide-gray-200 md:grid-cols-2">
        <div class="space-y-8 divide-y divide-gray-200">
            <div class="pt-8">
                <div class="grid grid-cols-1">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Category title
                        </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.title" id="title" required
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>
                    <div class="pt-5 ">
                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import axiosClient from "../../axios";
import { toRef } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const props = defineProps({
    category: {
        type: Object,
        default() {
            return { title: '' }
        }
    },
})

const form = toRef(props, 'category')


const onSubmit = async () => {
    try {
        if (props.category && props.category.id) {
            await axiosClient.put(`/categories/${props.category.id}/update`, form.value)
        } else {
            await axiosClient.post(`/categories/create`, form.value)
        }
        router.push({ name: "AdminCategories" });
        store.commit("notify", {
            type: "success",
            message: "Successfully saved!",
        });
    } catch (err) {
        console.log(err)
    }
}
</script>