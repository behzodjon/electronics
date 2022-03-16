
<template>
  <div class="mt-0 bg-gray-100 lg:mt-10">
    <h2 class="sr-only">Our Process</h2>
    <div class="mx-auto mt-6 max-w-7xl sm:px-0 lg:px-0">
      <div class="grid max-w-2xl grid-cols-1 px-4 mx-auto gap-y-2 gap-x-2">
        <h1
          class="
            font-bold
            text-xl
            underline
            decoration-4 decoration-[#00c389]
            text-center
          "
        >
          Here's How It Works.
        </h1>
        <p class="mb-2 text-sm text-center lg:text-base">
          See more information in our Terms and Conditions
        </p>
        <div v-for="perk in perks" :key="perk.name" class="flex ml-4 mr-4">
          <div class="flex-shrink-0">
            <div class="flow-root">
              <img class="w-16 h-28" :src="perk.imageSrc" alt="" />
            </div>
          </div>
          <div class="mt-5 ml-4 mr-4">
            <h3 class="text-sm font-medium text-gray-900 lg:text-base">
              {{ perk.name }}
            </h3>
            <p class="mt-2 text-sm text-gray-500 lg:text-base">
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
    name: "Select your device, answer some questions.",
    imageSrc:
      "https://stockx-assets.imgix.net/svg/icons/graph-up.svg?auto=compress,format",
    description:
      "Answer some simple questions about your device to get a valuation.",
  },
  {
    name: "Accept valuation, ship or dropoff device.",
    imageSrc:
      "https://stockx-assets.imgix.net/svg/icons/shipping-box.svg?auto=compress,format",
    description:
      "Youve got an offer! Choose a option, add to your wallet and select a delivery method.",
  },
  {
    name: "Get Paid!",
    imageSrc:
      "https://stockx-assets.imgix.net/svg/icons/cash.svg?auto=compress,format",
    description:
      "Once we have your device, we will do our internal testing and pay you according.",
  },
];
import store from "../store";

export default {
  setup() {
    store.dispatch("getCategories");
    store.dispatch("changeSelectedValue", 1);

    return {
      perks,
    };
  },
};
</script>