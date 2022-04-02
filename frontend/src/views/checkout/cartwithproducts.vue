<template>
  <div class="max-h-100">
    <div class="bg-[#F9F9F9]">
      <header
        class="relative bg-[#F9F9F9] border-b border-[#EAEAEB] text-sm lg:text-base font-medium text-gray-700"
      >
        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="relative flex justify-end sm:justify-center">
            <nav aria-label="Progress" class>
              <ol role="list" class="flex space-x-4">
                <li v-for="(step, stepIdx) in steps" :key="step.name" class="flex items-center">
                  <a
                    v-if="step.status === 'current'"
                    :href="step.href"
                    aria-current="page"
                    class="text-[#0BADA2]"
                  >{{ step.name }}</a>
                  <a v-else :href="step.href">{{ step.name }}</a>
                  <ChevronRightIcon
                    v-if="stepIdx !== steps.length - 1"
                    class="w-5 h-5 ml-2 text-gray-300"
                    aria-hidden="true"
                  />
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </header>

      <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
          <div class="sm:flex-auto">
            <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">Ta-Da! Let's Get You Paid 🎉</h1>
            <p
              class="mt-2 text-gray-700 text-md"
            >Please review your BuyBack order below. Remove the item or if good,click continue to the next step.</p>
          </div>
        </div>
        <div class="mt-6 -mx-4 bg-white ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg">
          <table class="min-w-full divide-y divide-[#EAEAEB]">
            <thead>
              <tr>
                <th
                  scope="col"
                  class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                >Device</th>
                <th
                  scope="col"
                  class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                >Model</th>
                <th
                  scope="col"
                  class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                >Storage</th>
                <th
                  scope="col"
                  class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                >Condition</th>
                <th
                  scope="col"
                  class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                >Payout</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                  <span class="sr-only">Select</span>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in items" :key="index">
                <td
                  :class="[index === 0 ? '' : 'border-t border-transparent', 'relative py-4 pl-4 sm:pl-6 pr-3 text-sm']"
                >
                  <div class="font-medium text-gray-900">{{ item.category }}</div>
                  <div class="flex flex-col mt-1 text-gray-500 sm:block lg:hidden">
                    <span>{{ item.product }} / {{ item.storage }}</span>
                    <span class="hidden sm:inline">·</span>
                    <span>{{ item.condition }}</span>
                  </div>
                  <div v-if="index !== 0" class="absolute right-0 h-px bg-gray-200 left-6 -top-px" />
                </td>
                <td
                  :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']"
                >{{ item.product }}</td>
                <td
                  :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']"
                >{{ item.storage }}</td>
                <td
                  :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']"
                >{{ item.condition }}</td>
                <td
                  :class="[index === 0 ? '' : 'border-t border-[#EAEAEB]', 'px-3 py-3.5 text-sm text-black']"
                >
                  <div class="sm:hidden">{{ item.price }}</div>
                  <div class="hidden sm:block">{{ item.price }}</div>
                </td>
                <td
                  :class="[index === 0 ? '' : 'border-t border-transparent', 'relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium']"
                >
                  <button
                  @click="deleteItem(item)"
                    type="button"
                    class="inline-flex items-center rounded-md bg-[#FDF2F2] px-3 py-2 text-sm font-medium leading-4 text-[#EA3E3E] shadow-sm focus:outline-none disabled:cursor-not-allowed disabled:opacity-30 hover:text-[#FDF2F2] hover:bg-[#EA3E3E]"
                  >
                    Remove
                    <span class="sr-only">, {{ item.product }}</span>
                  </button>
                  <div v-if="index !== 0" class="absolute left-0 h-px bg-gray-200 right-6 -top-px" />
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="max-w-5xl px-4 pb-10 mx-auto mt-6 sm:px-6 lg:px-8">
      <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
          <div class="mt-4 space-x-4 sm:mt-0 sm:ml-0 sm:flex-none">
            <router-link
              to="/cart-info"
              class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2 sm:w-auto"
            >Next Step</router-link>
            <button
              type="button"
              class="px-4 py-2 text-sm font-medium text-black underline border border-transparent rounded-md focus:outline-none focus:ring-offset-2 sm:w-auto"
            >Add Another Device</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed } from "vue";
import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'

const steps = [
  { name: 'Wallet', href: '#', status: 'current' },
  { name: 'Billing Information', href: '#', status: 'upcoming' },
  { name: 'Payment Method', href: '#', status: 'upcoming' },
  { name: 'Delivery Method', href: '#', status: 'upcoming' },
  { name: 'Confirmation', href: '#', status: 'upcoming' },
]

export default {
  components: {
    Popover,
    PopoverButton,
    PopoverOverlay,
    PopoverPanel,
    TransitionChild,
    TransitionRoot,
    ChevronRightIcon,
    ChevronUpIcon,
  },
  setup() {
    const store = useStore();
    const items = computed(() => store.state.cart.items);

    store.dispatch('cart/fetchCart');

    function deleteItem(item) {
      store.dispatch('cart/deleteItem', item).then(() => {
      store.dispatch("cart/fetchCart");
    });
    }
    return {
      steps,
      items,
      deleteItem
    }
  },
}


</script>






