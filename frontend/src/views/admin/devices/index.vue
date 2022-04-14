<template>
    <div class="flex flex-col">
        <div class="flex items-center justify-between">
            <div class="py-4 text-3xl">Devices</div>
            <div>
                <router-link :to="{ name: 'AdminCreateCategory' }"
                    class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add device
                </router-link>
            </div>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Id
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Category
                                </th>
                                  <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Title
                                </th>
                                 <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Price
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(device, index) in devices" :key="index">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{ index + 1 }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ device.brand.title }}
                                </td>
                                  <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ device.model }}
                                </td>
                                  <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    {{ device.oldPrice }}
                                </td>

                                <td
                                    class="flex items-center gap-4 px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                    <router-link :to="`/admin/categories/${device.id}/edit`"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <PencilAltIcon class="w-6 h-6 text-green-500" />
                                    </router-link>
                                    <button @click="showModal(device)">
                                        <TrashIcon class="w-6 h-6 text-red-500" />
                                    </button>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <Modal :isDeleteModalVisible="isDeleteModalVisible" @remove-record="removeRecord" @close-modal="closeModal"
            :item="device" />
    </div>
</template>

<script setup>
import Modal from "../../../components/common/Modal.vue";
import { PencilAltIcon } from '@heroicons/vue/solid'
import { TrashIcon } from '@heroicons/vue/solid'
import { useStore } from "vuex";
import { onMounted, ref } from "vue";
import axiosClient from "../../../axios";

const store = useStore();

const isDeleteModalVisible = ref(false)
const devices = ref(null)

const device = ref(null)

function showModal(item) {
    isDeleteModalVisible.value = true
    device.value = item
}

function closeModal() {
    isDeleteModalVisible.value = false
}

const removeRecord = async (device) => {
    await axiosClient.delete(`/products/${device.id}/delete`)
    isDeleteModalVisible.value = false
      store.commit("notify", {
        type: "success",
        message: "Successfully deleted!",
    });
    const { data } = await axiosClient.get(`/products`)
    devices.value = data.data
  
}
onMounted(async () => {
    const { data } = await axiosClient.get(`/products`)
    devices.value = data.data
})


</script>