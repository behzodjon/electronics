<template>
    <form @submit.prevent="onSubmit" class="space-y-8 divide-y divide-gray-200">
        <div class="space-y-8 divide-y divide-gray-200">
            <div class="pt-8">
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Title
                        </label>
                        <div class="mt-1">
                            <input type="text" v-model="form.title" id="title"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium text-gray-700">
                            Category
                        </label>
                        <div class="mt-1">
                            <Multiselect placeholder="Select category" valueProp="id" track-by="title" label="title"
                                v-model="form.category_id" :close-on-select="true" :create-option="true"
                                :options="categories">
                            </Multiselect>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <div>
                        <h1 class="text-2xl font-medium text-gray-700">Prices</h1>
                    </div>
                    <div><button @click="addPrice()" type="button"
                            class="inline-flex items-center justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                            price
                            <PlusIcon class="w-4 h-4 ml-3 text-white" />
                        </button></div>
                </div>
                <div v-for="(price, index) in form.prices" :key="price.id">
                    <PriceFormEditor @change="priceChange" :index="index" :price="price" />
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">

                <button type="submit"
                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>
</template>
<script setup>
import { v4 as uuidv4 } from "uuid";
import Multiselect from '@vueform/multiselect'
import { PlusIcon } from '@heroicons/vue/solid'
import axiosClient from "../../axios";
import { toRef, ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import PriceFormEditor from "./PriceFormEditor.vue";

const store = useStore();
const router = useRouter();

let form = ref({
    title: "",
    category_id: null,
    prices: [],
});

const categories = ref(null);


function addPrice(index) {
    const newPrice = {
        id: uuidv4(),
        storage_id: '',
        values: []
    };
    form.value.prices.splice(index, 0, newPrice);
}

function priceChange(price) {
    // Important to explicitelly assign question.data.options, because otherwise it is a Proxy object
    // and it is lost in JSON.stringify()
    form.value.prices = form.value.prices.map((item) => {
        if (item.id === price.id) {
            return JSON.parse(JSON.stringify(price));
        }
        return item;
    });
}

const onSubmit = async () => {
    try {
        await axiosClient.post(`/products/create`, form.value)
        store.commit("notify", {
            type: "success",
            message: "Successfully saved!",
        });
    } catch (err) {
        console.log(err)
    }
}
onMounted(async () => {
    const categoriesData = await axiosClient.get(`/categories`)
    categories.value = categoriesData.data
})
</script>
<style src="@vueform/multiselect/themes/default.css">
</style>

