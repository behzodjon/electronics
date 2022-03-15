
<template>
  <div class="bg-gray-100 border-b-2 border-gray-300">
    <div class="max-w-7xl mx-auto sm:px-0 lg:px-2">
      <div class="px-0 pt-0 ">
        <div class=" flex overflow-x-auto lg:grid lg:grid-cols-4 divide-gray-300 divide-x-2">
          <div v-for="incentive in incentives" :key="incentive.name" class="flex mt-3 lg:mt-0 mr-10">
            <div class="flex-shrink-0">
              <img class="w-14 h-14 lg:h-20 ml-2 lg:ml-4" :src="incentive.imageSrc" alt="" />
            </div>
            <div class="mt-0 sm:mt-0 ml-2 lg:mt-3 lg:ml-4">
              <h3 class="text-sm font-medium text-gray-900">
                {{ incentive.name }}
              </h3>
              <p class="mt-1 mb-3 text-sm text-gray-500 w-52 mr-4 lg:w-full">
                {{ incentive.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
const incentives = [
  {
    name: 'Free Shipping To Us',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/graph-up.svg?auto=compress,format',
    description: "Shipping label sent to you after a BuyBack.",
  },
  {
    name: 'Valuation in 30 Seconds',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/shipping-box.svg?auto=compress,format',
    description: "Sell your junk in under 1 minute flat!",
  },
  {
    name: 'Fast & Secure Payments',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/cash.svg?auto=compress,format',
    description:
      "Straight into your selected payment method.",
  },
    {
    name: 'Competitive Pricing',
    imageSrc: 'https://stockx-assets.imgix.net/svg/icons/cash.svg?auto=compress,format',
    description:
      "Found a BuyBack higher then ours? We'll beat it",
  },
]

export default {
  setup() {
    return {
      incentives,
    }
  },
}
</script>