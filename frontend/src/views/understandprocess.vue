
<template>
  <div class="bg-gray-100 mt-0 lg:mt-10">
    <h2 class="sr-only">Our Process</h2>
    <div class="max-w-7xl mx-auto sm:px-0 lg:px-0 mt-6">
      <div class="max-w-2xl mx-auto px-4 grid grid-cols-1 gap-y-2 gap-x-2">
          <h1 class="font-bold text-xl underline decoration-4 decoration-[#00c389] text-center">Here's How It Works.</h1>
          <p1 class="text-sm lg:text-base text-center mb-2"> See more information in our Terms and Conditions</p1>
        <div v-for="perk in perks" :key="perk.name" class="flex mr-4 ml-4">
          <div class="flex-shrink-0">
            <div class="flow-root">
              <img class="w-16 h-28" :src="perk.imageSrc" alt="" />
            </div>
          </div>
          <div class="mt-5 mr-4 ml-4">
            <h3 class="text-sm lg:text-base font-medium text-gray-900">
              {{ perk.name }}
            </h3>
            <p class="mt-2 text-sm lg:text-base text-gray-500">
              {{ perk.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const perks = [
  {
    name: 'Select your device, answer some questions.',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/graph-up.svg?auto=compress,format',
    description:
      'Answer some simple questions about your device to get a valuation.',
  },
  {
    name: 'Accept valuation, ship or dropoff device.',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/shipping-box.svg?auto=compress,format',
    description:
      'Youve got an offer! Choose a option, add to your wallet and select a delivery method.',
  },
  {
    name: 'Get Paid!',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/cash.svg?auto=compress,format',
    description:
      'Once we have your device, we will do our internal testing and pay you according.',
  },

]

export default {
  setup() {
    return {
      perks,
    }
  },
}
</script>