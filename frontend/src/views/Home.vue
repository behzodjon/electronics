<template>
  <div>
    <header class="bg-[#00633F]">
      <nav class="px-4 mx-auto max-w-7xl sm:px-4 lg:px-8" aria-label="Top">
        <div
          class="flex items-center justify-between w-full py-3 lg:border-none"
        >
          <div class="flex items-center">
            <a href="#">
              <span class="sr-only">Workflow</span>
              <img
                class="w-auto h-10"
                src="https://ta1ilwindui.com/img/logos/workflow-mark.svg?color=white"
                alt=""
              />
            </a>
            <div class="hidden ml-10 space-x-8 lg:block">
              <a
                v-for="link in navigation"
                :key="link.name"
                :href="link.href"
                class="text-base font-medium text-white hover:text-indigo-50"
              >
                {{ link.name }}
              </a>
            </div>
          </div>
          <div class="ml-10 space-x-4">
            <router-link to="/Login" class="font-semibold text-white text-md"
              >Login</router-link
            >
            <Signup></Signup>
            <Sell></Sell>
          </div>
        </div>
      </nav>
    </header>

    <div class="bg-white">
      <h2 class="sr-only">Why you should buy from us</h2>
      <div class="flex overflow-x-auto">
        <div
          class="
            mx-auto
            flex
            space-x-8
            whitespace-nowrap
            py-3
            px-4
            sm:px-6
            lg:space-x-24 lg:px-8
            pb-0
            pt-4
            tracking-wide
            underline
            decoration-[#00c389]
            lg:decoration-4 lg:underline-offset-2
            decoration-4
            underline-offset-4
          "
        >
          <div
            v-for="incentive in incentives"
            :key="incentive.name"
            class="flex items-center text-sm font-semibold text-black"
          >
            <component
              :is="incentive.icon"
              class="flex-none w-6 h-6 mr-2"
              aria-hidden="true"
            />
            <p>{{ incentive.name }}</p>
          </div>
        </div>
      </div>
    </div>

    <div
      class="px-4 pt-4 pb-2 mx-auto max-w-7xl sm:py-6 sm:px-2 lg:px-8 lg:pb-2"
    >
      <div class="relative overflow-hidden rounded-md bg-neutral-900">
        <div
          class="max-w-md px-4 mx-auto  sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24 md:grid md:grid-cols-2"
        >
          <div>
            <div class="mt-10">
              <div class="mt-6 sm:max-w-xl">
                <div class="animate__animated animate__flipInX">
                  <p
                    class="mt-6 mb-2 text-xl text-gray-400  blink lg:text-xl font-base"
                  >
                    Flip Your Device in Seconds!
                  </p>

                  <h1
                    class="text-4xl font-extrabold tracking-tighter  text-gray-50 lg:text-5xl"
                  >
                    The Ultimate Electronic BuyBack Marketplace.
                  </h1>
                </div>
                <div class="animate__animated animate__flipInX animate">
                  <p class="mt-6 text-gray-400 text-l font-base lg:text-xl">
                    We're a buyback startup that focuses on Resuable, Recyclable
                    tech. Sell or Recycle your device in 3 simple steps.
                  </p>
                </div>
              </div>
            </div>

            <div>
              <div class="animate__animated animate__flipInX animate">
                <div class="relative flex items-center mt-8 rounded-md">
                  <input
                    type="text"
                    name="search"
                    id="search"
                    class="block w-full pr-12 border-gray-300 rounded-md shadow-sm  focus:ring-green-800 focus:border-green-800 sm:text-sm"
                  />
                  <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                    <kbd
                      class="inline-flex items-center px-2 font-sans text-sm font-medium text-gray-400 border border-gray-200 rounded-md "
                    >
                      Search
                    </kbd>
                  </div>
                </div>
              </div>

              <div class="mt-6 mb-10 lg:mb-8">
                <div class="inline-flex items-center divide-x divide-gray-300">
                  <div class="flex flex-shrink-0 pr-5">
                    <StarIcon
                      class="h-5 w-5 text-[#E9D758]"
                      aria-hidden="true"
                    />
                    <StarIcon
                      class="h-5 w-5 text-[#E9D758]"
                      aria-hidden="true"
                    />
                    <StarIcon
                      class="h-5 w-5 text-[#E9D758]"
                      aria-hidden="true"
                    />
                    <StarIcon
                      class="h-5 w-5 text-[#E9D758]"
                      aria-hidden="true"
                    />
                    <StarIcon
                      class="h-5 w-5 text-[#E9D758]"
                      aria-hidden="true"
                    />
                  </div>
                  <div
                    class="flex-1 min-w-0 py-1 pl-5 text-sm  text-gray-50 sm:py-3"
                  >
                    <span class="font-medium text-gray-500">Rated 5 stars</span>
                    by over
                    <span class="font-medium text-green-500">500 sellers</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div
          class="hidden py-0  lg:block sm:mt-0 sm:py-0 lg:absolute lg:inset-y-0 lg:right-0 border-left"
        >
          <div
            class="relative pl-4 -mr-40  sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-10"
          >
            <img
              class="w-full rounded-none opacity-100  lg:h-full lg:w-auto lg:max-w-none"
              src="../images/coverphoto123.jpg"
              alt=""
            />
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white">
      <div
        class="py-4  sm:py-20 lg:max-w-7xl lg:mx-auto lg:px-8 lg:pt-4 lg:pb-0 md:pt-0"
      >
        <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
          <h2 class="text-base font-semibold text-gray-900">
            Popular Devices We Buy
          </h2>
          <a
            href="#"
            class="hidden text-sm font-semibold underline  sm:block text-neautral-600 hover:text-green-500"
            >See everything<span aria-hidden="true"> &rarr;</span></a
          >
        </div>

        <div class="relative mt-2">
          <div class="relative mb-2 overflow-x-auto">
            <ul role="list" class="flex mt-4 mb-4 ml-4 lg:ml-0">
              <li
                v-for="product in products"
                :key="product.id"
                class="flex-col flex-none col-span-1 mr-4 text-center bg-white border-2 border-gray-200 divide-y divide-gray-300 rounded-md "
              >
                <div class="flex-col flex-none p-4">
                  <img
                    class="flex-shrink-0 mx-auto rounded-none w-28 h-28"
                    src="https://www.reliancedigital.in/medias/iPhone-11-64GB-White-491901639-i-5-1200Wx1200H?context=bWFzdGVyfGltYWdlc3w4MzU5OHxpbWFnZS9qcGVnfGltYWdlcy9oY2EvaDM2Lzk0MjE5MDI1NDQ5MjYuanBnfGQxNzZkZGFlYzgyNGFkZGM0OTU1ODA2OGEzMjI3NzJmMzQ4MzJiY2M4MmIwMGEyMzkxZjEyYjEzZWY2NGM4MWQ"
                    alt=""
                  />
                  <h3 class="mt-2 text-sm font-medium text-gray-900">
                    {{ product.model }}
                  </h3>
                  <dl class="flex flex-col justify-between flex-grow mt-1">
                    <dt class="sr-only">Title</dt>
                    <dd class="text-sm text-gray-500">{{ product.model }}</dd>
                    <dt class="sr-only">Role</dt>
                    <dd class="mt-3"></dd>
                  </dl>
                </div>
                <div>
                  <div
                    class="flex -mt-px border-t-2 border-gray-200 divide-x divide-gray-200  bg-gray-50 rounded-b-md hover:bg-neutral-900"
                  >
                    <div class="flex flex-1 w-0 -ml-px">
                      <a
                        @click="openDevice(product)"
                        class="relative inline-flex items-center justify-center flex-1 w-0 py-4 text-sm font-medium text-black border border-transparent rounded-br-lg cursor-pointer  hover:text-white"
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
            class="text-sm font-semibold underline  text-neautral-600 hover:text-indigo-500"
            >Start Selling<span aria-hidden="true"> &rarr;</span></a
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
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
import store from "../store";
import { computed } from "vue";
import { ref } from "vue";

const incentives = [
  { name: "Free Shipping, Free & Secure", icon: TruckIcon },
  { name: "Instant Buyback, No Waiting", icon: BadgeCheckIcon },
  { name: "Fast Payments Into Your Account", icon: CashIcon },
];

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
  },
  setup() {
    const open = ref(false);

    const products = computed(() => store.state.products);
    store.dispatch("getProducts");
    function openDevice(value) {
      open.value = true;
      store.dispatch("getSideBarState", open.value);
      store.dispatch("setDirectOpen", open.value);
      store.dispatch("getProductStorages", value);
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
</script>
