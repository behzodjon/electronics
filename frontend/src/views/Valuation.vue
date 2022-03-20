<template>
<div class="animate__animated animate__lightSpeedInRight">
  <TabGroup >
    <TabList
      class="relative z-0 flex bg-gray-200 divide-x divide-gray-300 rounded-none "
    >
      <Tab v-slot="{ selected }">
        <button
          class="flex-1 px-1 py-4 text-base font-medium border-b-2 whitespace-nowrap"
          :class="[
            selected
              ? 'bg-gray-200 border-b-2 border-green-500 text-black'
              : 'bg-gray-200 text-black ',
          ]"
        >
          Option 1
        </button>
      </Tab>
      <Tab v-slot="{ selected }">
        <button
          class="flex-1 px-1 py-4 text-base font-medium border-b-2 whitespace-nowrap"
          :class="[
            selected
              ? 'bg-gray-200 border-b-2 border-green-500 text-black'
              : 'bg-gray-200 text-black',
          ]"
        >
          Option 2
        </button>
      </Tab>
    </TabList>
    <TabPanels>
      <TabPanel>
        <div class="px-0 py-0 mx-auto bg-gray-100 max-w-7xl sm:px-6 lg:px-6">
          <div class="space-y-12 lg:space-y-0">
            <div class="relative flex flex-col p-6">
              <div class="flex-1">
                <h3
                  class="text-xl font-bold text-black underline underline-offset-4 decoration-green-500 decoration-wavy"
                >
                  {{ pricingList[0].title }}
                </h3>
                <p class="flex items-baseline mt-4 text-black animate__animated animate__fadeIn ">
                  <span class="text-4xl font-extrabold tracking-tight"
                    >${{ pricingList[0].price }}</span
                  >
                  <span class="ml-1 text-xl font-semibold">{{
                    pricingList[0].frequency
                  }}</span>
                </p>
                <p class="mt-6 text-gray-900">
                  {{ pricingList[0].description }}
                </p>
                <ul role="list" class="mt-6 space-y-4">
                  <li
                    v-for="feature in pricingList[0].features"
                    :key="feature"
                    class="flex"
                  >
                    <CheckIcon
                      class="flex-shrink-0 w-6 h-6 text-green-500"
                      aria-hidden="true"
                    />
                    <span class="ml-2 text-black">{{ feature }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </TabPanel>
      <TabPanel
        ><div class="px-0 py-0 mx-auto bg-gray-100 max-w-7xl sm:px-6 lg:px-6">
          <div class="space-y-12 lg:space-y-0">
            <div class="relative flex flex-col p-6">
              <div class="flex-1">
                <h3
                  class="text-xl font-bold text-gray-900 underline underline-offset-4 decoration-green-500 decoration-wavy"
                >
                  {{ pricingList[1].title }}
                </h3>
                <p class="flex items-baseline mt-4 text-gray-900 animate__animated animate__fadeIn ">
                  <span
                    class="mr-4 text-3xl font-bold tracking-tight line-through"
                    >${{ pricingList[1].oldprice }}</span
                  >
                  <span class="text-4xl font-extrabold tracking-tight"
                    >${{ pricingList[1].price }}</span
                  >
                  <span class="ml-1 text-xl font-semibold">{{
                    pricingList[1].frequency
                  }}</span>
                </p>
                <p class="mt-6 text-gray-900">
                  {{ pricingList[1].description }}
                </p>
                <ul role="list" class="mt-6 space-y-4">
                  <li
                    v-for="feature in pricingList[1].features"
                    :key="feature"
                    class="flex"
                  >
                    <CheckIcon
                      class="flex-shrink-0 w-6 h-6 text-green-500"
                      aria-hidden="true"
                    />
                    <span class="ml-2 text-gray-900">{{ feature }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </TabPanel>
      <TabPanel>Content 3</TabPanel>
    </TabPanels>
  </TabGroup>
  <faqs></faqs>
  </div>
</template>

<script>
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from "@headlessui/vue";
import { CheckIcon } from "@heroicons/vue/outline";
import Faqs from "./faqs.vue";
import axiosClient from "../axios";
import store from "../store";
export default {
  components: {
    TabGroup,
    TabList,
    Tab,
    TabPanels,
    TabPanel,
    CheckIcon,
    Faqs,
  },
  setup() {
        store.commit("setSectionTitle", "Valuation");

    return {
      pricing,
    };
  },
    data() {
    return {
      product: null,
    };
  },
  mounted() {
    axiosClient
      .get(`/products/${this.productId}/${this.storageId}/${this.conditionId}/price`)
      .then((response) => {
        this.product = response.data.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
    computed: {
      productId() {
        return this.$store.state.productId;
      },
      storageId() {
        return this.$store.state.storageId;
      },
      conditionId() {
        return this.$store.state.conditionId;
      },

    pricingList() {
      return [
        {
          title: "Guranteed Value",
          price: this.product?.oldPrice,
          frequency: "AUD",
          description:
            "Instant cash deposit once we value your device. No waiting around",
          features: [
            "Free shipping label",
            "Free Pickup (Perth Only)",
            "Valid for 14 days",
            "Cash deposit within 4-5 hours",
            "Free return if counter-offer is rejected",
          ],
          cta: "Monthly billing",
        },
        {
          title: "Want 10% extra?",
          oldprice: this.product?.oldPrice,
          price: this.product?.newPrice,
          frequency: "AUD",
          description:
            "Send us your device and well sell it for you. Deposit in your account within 3-4 weeks",
          features: [
            "Free shipping label",
            "Free Pickup (Perth Only)",
            "3-4 weeks time frame",
            "Cash deposit within 4-5 hours",
            "Free return if counter-offer is rejected",
          ],
          cta: "Monthly billing",
        },
      ];
    },
  },
};

const pricing = {
  option1: [
    {
      title: "Guranteed Value",
      price: 239,
      frequency: "AUD",
      description:
        "Instant cash deposit once we value your device. No waiting around",
      features: [
        "Free shipping label",
        "Free Pickup (Perth Only)",
        "Valid for 14 days",
        "Cash deposit within 4-5 hours",
        "Free return if counter-offer is rejected",
      ],
      cta: "Monthly billing",
    },
  ],
  option2: [
    {
      title: "Want 10% extra?",
      oldprice: 239,
      price: 263,
      frequency: "AUD",
      description:
        "Send us your device and well sell it for you. Deposit in your account within 3-4 weeks",
      features: [
        "Free shipping label",
        "Free Pickup (Perth Only)",
        "3-4 weeks time frame",
        "Cash deposit within 4-5 hours",
        "Free return if counter-offer is rejected",
      ],
      cta: "Monthly billing",
    },
  ],
};
</script>
