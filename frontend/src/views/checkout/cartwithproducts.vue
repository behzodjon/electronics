<template>
<div class="max-h-100">
  <div class="bg-[#F9F9F9]">
    <header class="relative bg-[#F9F9F9] border-b border-[#EAEAEB] text-sm lg:text-base font-medium text-gray-700">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-end sm:justify-center">

          <nav aria-label="Progress" class="">
            <ol role="list" class="flex space-x-4">
              <li v-for="(step, stepIdx) in steps" :key="step.name" class="flex items-center">
                <a v-if="step.status === 'current'" :href="step.href" aria-current="page" class="text-[#0BADA2]">{{ step.name }}</a>
                <a v-else :href="step.href">{{ step.name }}</a>
                <ChevronRightIcon v-if="stepIdx !== steps.length - 1" class="w-5 h-5 text-gray-300 ml-2" aria-hidden="true" />
              </li>
            </ol>
          </nav>

        </div>
      </div>
    </header>

  <div class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto mt-6 ">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Ta-Da! Let's Get You Paid 🎉</h1>
        <p class="mt-2 text-md text-gray-700">Please review your BuyBack order below. Remove the item or if good,click continue to the next step.</p>
      </div>

    </div>
    <div class="-mx-4 mt-6 ring-1 ring-gray-300 sm:-mx-6 md:mx-0 md:rounded-lg bg-white">
      <table class="min-w-full divide-y divide-[#EAEAEB]">
        <thead>
          <tr>
            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Device</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Model</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Storage</th>
            <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Condition</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Payout</th>
            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
              <span class="sr-only">Select</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(plan, planIdx) in plans" :key="plan.id">
            <td :class="[planIdx === 0 ? '' : 'border-t border-transparent', 'relative py-4 pl-4 sm:pl-6 pr-3 text-sm']">
              <div class="font-medium text-gray-900">
                {{ plan.name }}
               
              </div>
              <div class="mt-1 flex flex-col text-gray-500 sm:block lg:hidden">
                <span>{{ plan.memory }} / {{ plan.cpu }}</span>
                <span class="hidden sm:inline"> · </span>
                <span>{{ plan.storage }}</span>
              </div>
              <div v-if="planIdx !== 0" class="absolute right-0 left-6 -top-px h-px bg-gray-200" />
            </td>
            <td :class="[planIdx === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">{{ plan.memory }}</td>
            <td :class="[planIdx === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">{{ plan.cpu }}</td>
            <td :class="[planIdx === 0 ? '' : 'border-t border-[#EAEAEB]', 'hidden px-3 py-3.5 text-sm text-black lg:table-cell']">{{ plan.storage }}</td>
            <td :class="[planIdx === 0 ? '' : 'border-t border-[#EAEAEB]', 'px-3 py-3.5 text-sm text-black']">
              <div class="sm:hidden">{{ plan.price }}</div>
              <div class="hidden sm:block">{{ plan.price }}</div>
            </td>
            <td :class="[planIdx === 0 ? '' : 'border-t border-transparent', 'relative py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-medium']">
              <button type="button" class="inline-flex items-center rounded-md  bg-[#FDF2F2] px-3 py-2 text-sm font-medium leading-4 text-[#EA3E3E] shadow-sm focus:outline-none disabled:cursor-not-allowed disabled:opacity-30" :disabled="plan.isCurrent">
                Remove<span class="sr-only">, {{ plan.name }}</span>
              </button>
              <div v-if="planIdx !== 0" class="absolute right-6 left-0 -top-px h-px bg-gray-200" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <div class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto pb-10 mt-6">
      <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
      <div class="mt-4 sm:mt-0 sm:ml-0 sm:flex-none space-x-4">
       <router-link to="/cart-info" class=" rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2 sm:w-auto">Next Step</router-link>
      <button type="button" class=" rounded-md border border-transparent px-4 py-2 text-sm font-medium text-black underline focus:outline-none focus:ring-offset-2 sm:w-auto">Add Another Device</button>
      </div>
      </div>
    </div>
    </div>
    </div>
</template>

<script>
const steps = [
  { name: 'Wallet', href: '#', status: 'current' },
  { name: 'Billing Information', href: '#', status: 'upcoming' },
  { name: 'Payment Method', href: '#', status: 'upcoming' },
  { name: 'Delivery Method', href: '#', status: 'upcoming' },
  { name: 'Confirmation', href: '#', status: 'upcoming' },
]


const plans = [
  {
    id: 1,
    name: 'Apple',
    memory: 'iPhone X',
    cpu: '256GB',
    storage: 'Great Condition',
    price: '$240',
    isCurrent: false,
  },
    {
    id: 2,
    name: 'Apple',
    memory: 'iPhone X',
    cpu: '256GB',
    storage: 'Great Condition',
    price: '$240',
    isCurrent: false,
  },


  // More plans...
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
    return {
      plans,
      steps,
    }
  },
}

import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
</script>






