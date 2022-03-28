
<template>
  <div class="bg-[#F9F9F9]  ">
    <div class="max-w-7xl mx-auto sm:px-0 lg:px-2">
      <div class="px-0 pt-0 ">
        <div class=" flex overflow-x-auto lg:grid lg:grid-cols-4 divide-gray-300 divide-x">
          <div v-for="incentive in incentives" :key="incentive.name" class="flex mt-3 lg:mt-0 mr-10">
            <div class="flex-shrink-0">
              <img class="w-10 h-14 mr-2 lg:h-20 ml-6 lg:ml-6" :src="incentive.imageSrc" alt="" />
            </div>
            <div class="mt-0 sm:mt-0 ml-2 lg:mt-3 lg:ml-4">
              <h3 class="text-sm font-medium text-gray-900">
                {{ incentive.name }}
              </h3>
              <p class="mt-1 mb-3 text-sm text-black w-52 mr-4 lg:w-full">
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
    imageSrc: 'https://svgshare.com/i/fe0.svg',
    description: "Shipping label sent to you after a BuyBack.",
  },
  {
    name: 'Valuation in 30 Seconds',
    imageSrc: 'https://svgshare.com/i/feh.svg',
    description: "Sell your junk in under 1 minute flat!",
  },
  {
    name: 'Fast & Secure Payments',
    imageSrc: 'https://svgshare.com/i/ffB.svg',
    description:
      "Straight into your selected payment method.",
  },
    {
    name: 'Competitive Pricing',
    imageSrc: 'https://svgshare.com/i/fe0.svg',
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