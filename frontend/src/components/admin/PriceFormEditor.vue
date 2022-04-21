<template>
    <div>
        <div class="flex items-center justify-between mt-8">
            <div>
                <h3 class="text-lg font-bold">
                    {{ index + 1 }}.

                </h3>
            </div>
            <div>
                <button type="button" @click="deletePrice"
                    class="flex items-center px-3 py-1 text-base text-red-500 border border-transparent border-red-600 rounded-sm">
                    Delete
                    <TrashIcon class="w-6 h-6 text-red-500" />
                </button>
            </div>
        </div>
        <div class="my-6 sm:col-span-3">
            <label :for="'storage_' + model.id" class="block text-sm font-medium text-gray-700">
                Device Storage
            </label>
            <div class="mt-1">
                <select :class="{ 'border-red-500': errors[`prices.${index}.storage_id`] }"
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    v-model="model.storage_id" @change="dataChange" :name="'storage_' + model.id" id="">
                    <option v-for="storage in storages" :key="storage.id" :value="storage.id">
                        {{ storage.title }}
                    </option>
                </select>
                <div v-if="errors.hasOwnProperty(`prices.${index}.storage_id`)" class="mt-1 text-sm text-red-500">
                    <div v-for="(error, errorIndex) in errors[`prices.${index}.storage_id`]"
                        :key="`name-${errorIndex}`">
                        <div>* {{ error }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="errors.hasOwnProperty(`prices.${index}.values`)" class="mt-4 text-sm text-red-500">
            <div v-for="(error, errorIndex) in errors[`prices.${index}.values`]" :key="`name-${errorIndex}`">
                <div>* {{ error }}</div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div v-for="(condition, key) in conditions" :key="key" class="">
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Price for {{ condition.title }}
                </label>
                <div class="mt-1">
                    <input @change="dataChange" :name="'price_' + model.id" v-model="model.values[key]" type="number"
                        :id="'price_' + model.id"
                        :class="{ 'border-red-500': errors[`prices.${index}.values.${key}`] || errors[`prices.${index}.values`] }"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                    <!-- <span v-if="errors[`prices.${index}.values.${key}`]"
                        class="block px-4 my-1 font-medium text-red-500 ">*{{
                            errors[`prices.${index}.values.${key}`][0]
                        }}</span> -->
                    <div v-if="errors.hasOwnProperty(`prices.${index}.values.${key}`)" class="mt-1 text-sm text-red-500">
                        <div v-for="(error, errorIndex) in errors[`prices.${index}.values.${key}`]"
                            :key="`name-${errorIndex}`">
                            <div>* {{ error }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axiosClient from "../../axios";
import { TrashIcon } from '@heroicons/vue/solid'


const emit = defineEmits(["change", "deletePrice"]);

const props = defineProps({
    price: Object,
    index: Number,
    errors: Object,
})
const storages = ref(null);
const conditions = ref(null);
const model = ref(JSON.parse(JSON.stringify(props.price)));
onMounted(async () => {
    const storagesData = await axiosClient.get(`/storages`)
    const conditionsData = await axiosClient.get(`/conditions`)
    conditions.value = conditionsData.data
    storages.value = storagesData.data
})

// Emit the data change
function dataChange() {
    const data = model.value;
    emit("change", data);
}

function deletePrice() {
    emit("deletePrice", props.price);
}
</script>

<style src="@vueform/multiselect/themes/default.css">
</style>
