<template>
    <div>
        <div class="mt-4 sm:col-span-3">
            <label :for="'storage_' + model.id" class="block text-sm font-medium text-gray-700">
                Storage
            </label>
            <div class="mt-1">
                <!-- <Multiselect  :name="'storage_' + model.id"  @change="dataChange" placeholder="Select category" valueProp="id" track-by="title" label="title"
                    v-model="model.storage_id" :close-on-select="true" :create-option="true" :options="storages">
                </Multiselect> -->
                <select
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    v-model="model.storage_id" @change="dataChange" :name="'storage_' + model.id" id="">
                    <option v-for="storage in storages" :key="storage.id" :value="storage.id">
                        {{ storage.title }}
                    </option>
                </select>
            </div>
        </div>

        <div>
            <div v-for="(condition, index) in conditions" :key="index" class="mt-4 sm:col-span-3">
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Price for {{ condition.title }}
                </label>
                <div class="mt-1">
                    <input @change="dataChange" :name="'price_' + model.id" v-model="model.values[index]" type="number"
                        :id="'price_' + model.id"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Multiselect from '@vueform/multiselect'
import { ref, onMounted } from "vue";
import axiosClient from "../../axios";


const emit = defineEmits(["change"]);

const props = defineProps({
    price: Object,
    index: Number,
})
const storages = ref(null);
const conditions = ref(null);
const model = ref(JSON.parse(JSON.stringify(props.price)));
console.log("Model: ", model.storage_id)
onMounted(async () => {
    const storagesData = await axiosClient.get(`/storages`)
    const conditionsData = await axiosClient.get(`/conditions`)
    conditions.value = conditionsData.data
    storages.value = storagesData.data
})

// Emit the data change
function dataChange() {
    const data = model.value;
    console.log(data.storage_id)
    emit("change", data);
}
</script>

<style src="@vueform/multiselect/themes/default.css">
</style>
