<template>
  <div>
    <incentives></incentives>

    <div class="max-w-full pt-6 pb-0 mx-auto sm:pt-6 lg:px-4 lg:pb-2">
      <div class="relative overflow-hidden bg-[#F9F9F9] rounded-md">
        <div
          class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-4 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24 md:grid md:grid-cols-2"
        >
          <div>
            <div class="mt-0">
              <div class="mt-2 sm:max-w-xl">
                <h1
                  class="text-4xl font-extrabold tracking-tighter text-[#0C0D0D] lg:text-5xl"
                >The Ultimate Electronic BuyBack Marketplace.</h1>

                <p class="mt-6 text-[#414244] text-l font-base lg:text-xl">
                  We're a buyback startup that focuses on Resuable, Recyclable
                  tech. Sell or Recycle your device in 3 simple steps.
                </p>
              </div>
            </div>

            <div>
              <div class="flex justify-start mt-5">
                <div class="rounded-md">
                  <Sell>
                    <template v-slot:sell="{ openSidebar }">
                      <button
                        @click="openSidebar"
                        class="flex items-center px-4 py-3 text-xl font-medium text-white bg-[#0C0D0D] rounded-md w-fit hover:bg-indigo-700 md:py-3 md:text-sm md:px-4"
                      >Sell Now</button>
                    </template>
                  </Sell>
                  <img src="../assets/Group3.svg" class="h-24" alt="my-logo" />
                </div>
              </div>
              <div class="mt-6 mb-10 lg:mb-8">
                <div class="inline-flex items-center divide-x divide-gray-300">
                  <div>
                    <img src="../assets/trustpilot.svg" class="h-16 mr-5" alt="my-logo" />
                  </div>
                  <div class="flex-1 min-w-0 py-1 pl-5 text-sm text-gray-500 sm:py-3">
                    <span class="font-medium text-gray-500">Rated 5 stars</span>
                    by over
                    <span class="font-medium text-green-500">500 sellers</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-[#F9F9F9]">
      <div class="py-4 sm:py-20 lg:max-w-7xl lg:mx-auto lg:px-8 lg:pt-4 lg:pb-0 md:pt-0">
        <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
          <h2 class="text-base font-semibold text-gray-900">Popular Devices We Buy</h2>
          <a
            href="#"
            class="hidden text-sm font-semibold underline sm:block text-neautral-600 hover:text-green-500"
          >
            See everything
            <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
        <div class="relative mt-2">
          <div class="relative mb-2 overflow-x-auto">
            <ul role="list" class="flex mt-4 mb-4 ml-4 lg:ml-0">
              <li
                v-for="product in products"
                :key="product.id"
                class="flex-col flex-none col-span-1 mr-4 text-center bg-white border-2 border-gray-200 divide-y divide-gray-300 rounded-md"
              >
                <div class="flex-col flex-none p-4">
                  <img
                    class="flex-shrink-0 object-cover mx-auto rounded-none w-28 h-28"
                    :src="product.image"
                    alt
                  />
                  <h3 class="mt-2 text-sm font-medium text-gray-900">{{ product.model }}</h3>
                  <dl class="flex flex-col justify-between flex-grow mt-1">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-sm text-gray-500">{{ product.model }}</dd>
                    <dt class="sr-only">Role</dt>
                    <dd class="mt-3"></dd>
                  </dl>
                </div>
                <div>
                  <div
                    class="flex -mt-px border-t-2 border-gray-200 divide-x divide-gray-200 bg-gray-50 rounded-b-md hover:bg-neutral-900"
                  >
                    <div class="flex flex-1 w-0 -ml-px">
                      <a
                        @click="openDevice(product)"
                        class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-black border border-transparent rounded-br-lg cursor-pointer hover:text-white"
                      >
                        <span class="ml-3">Sell Now</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="flex px-4 sm:hidden">
          <a
            href="#"
            class="text-sm font-semibold underline text-neautral-600 hover:text-indigo-500"
          >
            Start Selling
            <span aria-hidden="true">&rarr;</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from "vue";
import { ref } from "vue";
import { useStore } from "vuex";

const navigation = [
  { name: "About Us", href: "#" },
  { name: "Our Process", href: "#" },
  { name: "Contact Us", href: "#" },
  { name: "FAQS", href: "#" },
  { name: "About Us", href: "#" },
  { name: "Our Process", href: "#" },
  { name: "Contact Us", href: "#" },
  { name: "FAQS", href: "#" },
];

export default {
  components: {
    StarIcon,
    CheckIcon,
    Login,
    Signup,
    Sell,
    MailIcon,
    PhoneIcon,
    XIcon,
    VTypical,
    navbar,
    incentives,
  },
  setup() {
    const open = ref(false);
    const store = useStore();

    const products = computed(() => store.state.products);

    store.dispatch("getProducts");


    function openDevice(value) {
      store.dispatch("getSideBarState", true);
      store.dispatch("setDirectOpen", true);
      store.dispatch("getProductStorages", value.id);
    }
 

    return {
      products,
      navigation,
      XIcon,
      incentives,
      openDevice,
      open,
    };
  },
};

import { ChevronRightIcon, StarIcon } from "@heroicons/vue/solid";
import { XIcon } from "@heroicons/vue/outline";
import { CheckIcon } from "@heroicons/vue/outline";
import {
  BadgeCheckIcon,
  CalendarIcon,
  TruckIcon,
  CashIcon,
} from "@heroicons/vue/outline";
import Login from "./Login.vue";
import Signup from "./Signup.vue";
import Sell from "./Sell.vue";
import { MailIcon, PhoneIcon } from "@heroicons/vue/solid";
import VTypical from "vue-typical";
import navbar from "./navbar.vue";
import incentives from "./incentives.vue";
</script>
