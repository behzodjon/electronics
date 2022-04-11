<template>
  <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
    <!-- method selection -->
    <RadioGroup v-model="selectedMethod" class="px-40">
      <RadioGroupLabel class="my-4 text-base font-medium text-gray-900">Select a delivery method</RadioGroupLabel>
      <div class="grid flex-col mt-4 sm:grid-cols-2 sm:gap-4">
        <RadioGroupOption as="template" v-for="method in methods" :key="method.id" :value="method.title"
          v-slot="{ checked, active }">
          <div
            :class="[checked ? 'border-transparent' : 'border-gray-300', active ? 'ring-2 ring-indigo-500' : '', 'relative bg-white border rounded-lg shadow-sm p-4  cursor-pointer focus:outline-none']">
            <div class="flex items-center gap-2">
              <CheckCircleIcon :class="[!checked ? 'invisible' : '', 'h-5 w-5 text-indigo-600']" aria-hidden="true" />
              <div
                :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']"
                aria-hidden="true" />
              <RadioGroupLabel class="text-base font-medium text-gray-900">{{ method.title }}</RadioGroupLabel>
            </div>
            <div class="flex justify-center pb-4">

            </div>
          </div>
        </RadioGroupOption>
      </div>
    </RadioGroup>

    <!-- form data -->
    <div class="px-32 mt-8">
      <form @submit.prevent="submitData">

        <!-- next submit button -->
        <CheckoutBottom class="lg:px-0">
          <div class="shrink-0">
            <button :disabled="!selectedMethod" :class="{ inactive: !selectedMethod }" type="submit" @click="nextStep"
              class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2">Next
              Step</button>
          </div>
        </CheckoutBottom>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { RadioGroup, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CheckCircleIcon } from '@heroicons/vue/solid'
import CheckoutBottom from "../../components/common/CheckoutBottom.vue";
import { useRouter, useRoute } from "vue-router";
import { useStore } from "vuex";
const store = useStore();

const router = useRouter();
const methods = [
  { id: 1, title: 'Mailer Bag', description: 'Last message sent an hour ago', },
  { id: 2, title: 'Shipping Label', description: 'Last message sent 2 weeks ago', },
]

const isEmpty = ref(true)
const selectedMethod = ref(null)


  store.commit('cart/SET_ROUTE_ACTIVE', false)


function submitData() {
  store.commit('cart/SET_ROUTE_ACTIVE', true)
  router.push({
    name: "Confirmation",
  });
}
</script>