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

                    <div class="sm:col-span-6">
                        <label for="photo" class="block text-sm font-medium text-gray-700">
                            Device image
                        </label>
                        <div class="flex items-center mt-1 ">
                            <img v-if="form.image_url" :src="form.image_url" :alt="form.title"
                                class="object-cover w-64 h-48" />
                            <PhotographIcon v-else class="w-16 h-16 ml-3 text-gray-700" />
                            <button type="button"
                                class="relative px-3 py-2 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <input type="file" @change="onImageChoose"
                                    class="absolute top-0 bottom-0 left-0 right-0 opacity-0 cursor-pointer" />
                                Change
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between mt-8">
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
                    <PriceFormEditor @change="priceChange" @deletePrice="deletePrice" :index="parseInt(index)"
                        :price="price" />
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
import { PhotographIcon } from '@heroicons/vue/outline'
import axiosClient from "../../axios";
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from "vue-router";
import { useStore } from "vuex";
import PriceFormEditor from "./PriceFormEditor.vue";

const store = useStore();
const router = useRouter();
const route = useRoute();


const form = ref({
    title: "",
    category_id: null,
    image: null,
    image_url: null,
    prices: [],
})

const product = ref(null)

const categories = ref(null);

function onImageChoose(ev) {
    const file = ev.target.files[0];
    const reader = new FileReader();
    reader.onload = () => {
        // The field to send on backend and apply validations
        form.value.image = reader.result;
        // The field to display here
        form.value.image_url = reader.result;
        ev.target.value = "";
    };
    reader.readAsDataURL(file);
}

function addPrice(index) {
    const newPrice = {
        id: uuidv4(),
        storage_id: null,
        values: []
    };
    form.value.prices.splice(index, 0, newPrice);
}

function priceChange(price) {
    form.value.prices = form.value.prices.map((item) => {
        if (item.id === price.id) {
            return JSON.parse(JSON.stringify(price));
        }
        return item;
    });
}

const onSubmit = async () => {
    try {
        if (route.params.id) {
            await axiosClient.post(`/products/${route.params.id}/update`, form.value)
        } else {
            await axiosClient.post(`/products/create`, form.value)
        }
        router.push({ name: "AdminDevices" });

        store.commit("notify", {
            type: "success",
            message: "Successfully saved!",
        });
    } catch (err) {
        console.log(err)
    }
}

function deletePrice(price) {
    form.value.prices = form.value.prices.filter((item) => item !== price);
}
onMounted(async () => {
    if (route.params.id) {
        const productData = await axiosClient.get(`/products/${route.params.id}`)
        product.value = productData.data.data
        form.value.title = productData.data.data.title
        form.value.category_id = productData.data.data.category_id
        form.value.image_url = productData.data.data.image_url
        form.value.prices = [...productData.data.data.prices]
    }

    const categoriesData = await axiosClient.get(`/categories`)
    categories.value = categoriesData.data
})
</script>
<style src="@vueform/multiselect/themes/default.css">
</style>

