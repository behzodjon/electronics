<template>
  <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">Ta-Da! Let's Get You Paid 🎉</h1>
        <p class="mt-2 text-gray-700 text-md">Please review your BuyBack order below. Remove the item or if good,click
          continue to the next step.</p>
      </div>
    </div>
    <div class="mt-6 -mx-4 bg-white ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
      <table v-if="items.length" class="min-w-full divide-y divide-[#EAEAEB]">
        <thead>
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Device</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Model
            </th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
              Storage</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">
              Condition</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Payout</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Select</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(item, index) in items" :key="index">
            <td :class="[index === 0 ? '' : 'border-t border-transparent', 'relative py-4 pl-4 sm:pl-6 pr-3 text-sm']">
              <div class="font-medium text-gray-900">{{ item.category }}</div>
              <div class="flex flex-col mt-1 text-gray-500 sm:block lg:hidden">
                <span>{{ item.product }} / {{ item.storage }}</span>
                <span class="hidden sm:inline">·</span>
                <span>{{ item.condition }}</span>
              </div>
              <div v-if="index !== 0" class="absolute right-0 h-px bg-gray-200 left-6 -top-px" />
            </td>
            <td
              :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">
              {{ item.product }}</td>
            <td
              :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">
              {{ item.storage }}</td>
            <td
              :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">
              {{ item.condition }}</td>
            <td :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'px-3 py-3.5 text-sm text-black']">
              <div class="sm:hidden">{{ item.price }}$</div>
              <div class="hidden sm:block">{{ item.price }}$</div>
            </td>
            <td
              :class="[index === 0 ? '' : 'border-t border-transparent', 'relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium']">
              <button @click="showModal(item)" type="button"
                class="inline-flex items-center rounded-md bg-[#FDF2F2] px-3 py-2 text-sm font-medium leading-4 text-[#EA3E3E] shadow-sm focus:outline-none disabled:cursor-not-allowed disabled:opacity-30 hover:text-[#FDF2F2] hover:bg-[#EA3E3E]">
                Remove
                <span class="sr-only">, {{ item.product }}</span>
              </button>
              <div v-if="index !== 0" class="absolute left-0 h-px bg-gray-200 right-6 -top-px" />
            </td>
          </tr>
        </tbody>
      </table>
      <div class="flex justify-center py-4" v-else>No devices...</div>
    </div>
    <Modal :isDeleteModalVisible="isDeleteModalVisible" @remove-record="removeRecord" @close-modal="closeModal"
      :item="cartItem" />
    <CheckoutBottom>
      <div v-if="items.length" class="shrink-0">
        <button type="submit" @click="nextStep"
          class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2">Next
          Step</button>
      </div>
      <Sell class="w-full">
        <template v-slot:sell="{ openSidebar }">
          <button @click="openSidebar" type="button"
            class="px-4 py-2 text-sm font-medium text-black underline border border-transparent rounded-md focus:outline-none focus:ring-offset-2 sm:w-auto">Add
            Another Device</button>
        </template>
      </Sell>
    </CheckoutBottom>
  </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed, ref,onMounted } from "vue";
import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import Modal from "../../components/common/Modal.vue";
import CheckoutBottom from "../../components/common/CheckoutBottom.vue";
import Sell from "../Sell.vue"
import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();
const store = useStore();

const items = computed(() => store.state.cart.items);
const isDeleteModalVisible = ref(false)
const cartItem = ref(null)

function showModal(item) {
  isDeleteModalVisible.value = true
  cartItem.value = item
}

function closeModal() {
  isDeleteModalVisible.value = false
}

function removeRecord(item) {
  store.dispatch('cart/deleteItem', item).then(() => {
    isDeleteModalVisible.value = false
    store.dispatch("cart/fetchCart");
  });
}

function nextStep() {
  store.commit('cart/SET_ROUTE_ACTIVE', true)
  router.push({
    name: "Cartinfo",
  });
}

onMounted(async () => {
  
})
</script>






