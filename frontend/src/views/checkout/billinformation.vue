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
        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">Just A Few Questions!</h1>
        <p class="mt-2 text-md text-gray-700 pb-6">Please fill in the below questions. Once complete, click next.</p>
      </div>

    </div>
    <div class="-mx-4 lg:-mx-0 px-6 py-4 rounded-none lg:rounded-lg bg-white border border-[#D5D6D7]">
      <div class="md:grid md:grid-cols-1 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form action="#" method="POST">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#0BADA2] focus:border-[#0BADA2] sm:text-sm">
                  <option>Australia</option>
                </select>
              </div>

              <div class="col-span-6">
                <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input type="text" name="region" id="region" autocomplete="address-level1" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    


  </div>
  </div>
  <div class="px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto pb-10 mt-6">
      <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
      <div class="mt-4 sm:mt-0 sm:ml-0 sm:flex-none space-x-4">
      <button type="button" class=" rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2 sm:w-auto">Next Step</button>
      </div>
      </div>
    </div>
    </div>
    </div>
</template>

<script>
const steps = [
  { name: 'Wallet', href: '#', status: 'past' },
  { name: 'Billing Information', href: '#', status: 'current' },
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






