<template>
<div>
<navbar></navbar>
<incentives></incentives>

 <div class="max-w-full pt-6 pb-0 mx-auto sm:pt-6 lg:px-4 lg:pb-2">
    <div class="relative overflow-hidden bg-gray-100 rounded-md">
      <div
        class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-4 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24 md:grid md:grid-cols-2" 
      >
        <div>
          <div class="mt-0">
            <div class="mt-2 sm:max-w-xl">
              <div class="animate__animated animate__flipInX">

                <h1
                  class="text-4xl font-extrabold tracking-tighter text-neutral-900 lg:text-5xl"
                >
                  The Ultimate Electronic BuyBack Marketplace.
                </h1>
              </div>
              <div class="animate__animated animate__flipInX animate">
                <p class="mt-6 text-gray-800 text-l font-base lg:text-xl">
                  We're a buyback startup that focuses on Resuable, Recyclable
                  tech. Sell or Recycle your device in 3 simple steps.
                </p>
              </div>
            </div>
          </div>


          <div>
          <div class="flex justify-start mt-5">
            <div class="rounded-md">
              <Sell></Sell>
                
    <img src="../assets/Group3.svg" class="h-24" alt="my-logo" />

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
                  class="flex-1 min-w-0 py-1 pl-5 text-sm text-gray-50 sm:py-3"
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
    </div>
  </div>
  <div class="bg-gray-100">
    <div
      class="py-4 sm:py-20 lg:max-w-7xl lg:mx-auto lg:px-8 lg:pt-4 lg:pb-0 md:pt-0"
    >
      <div class="flex items-center justify-between px-4 sm:px-6 lg:px-0">
        <h2 class="text-base font-semibold text-gray-900">
          Popular Devices We Buy
        </h2>
        <a
          href="#"
          class="hidden text-sm font-semibold underline sm:block text-neautral-600 hover:text-green-500"
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
          >Start Selling<span aria-hidden="true"> &rarr;</span></a
        >
      </div>
    </div>
  </div>
</div>

</template>

<script>
import store from "../store";
import { computed } from "vue";
import { ref } from "vue";
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

const people = [
  {
    name: "iPhone X 64GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://i5.walmartimages.com/asr/8fd7a90e-caaa-4cf6-b1ff-bc4d06ce9115.c607dd8960e9beaba6bbb451a2e7b325.png?odnHeight=612&odnWidth=612&odnBg=FFFFFF",
  },
  {
    name: "iPhone 8 256GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "data:image/jpeg;base64,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",
  },
  {
    name: "iPhone 11 64GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://www.reliancedigital.in/medias/iPhone-11-64GB-White-491901639-i-5-1200Wx1200H?context=bWFzdGVyfGltYWdlc3w4MzU5OHxpbWFnZS9qcGVnfGltYWdlcy9oY2EvaDM2Lzk0MjE5MDI1NDQ5MjYuanBnfGQxNzZkZGFlYzgyNGFkZGM0OTU1ODA2OGEzMjI3NzJmMzQ4MzJiY2M4MmIwMGEyMzkxZjEyYjEzZWY2NGM4MWQ",
  },
  {
    name: "MacBook Pro 2020",
    title: "Content Goes Here Soon",
    role: "Admin",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/mbp-spacegray-select-202011_GEO_AU?wid=904&hei=840&fmt=jpeg&qlt=80&.v=1632948915000",
  },
  {
    name: "iPad 5th Gen 32GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://cdn11.bigcommerce.com/s-xt5en0q8kf/images/stencil/1280x1280/products/4278/11807/IPAD5-CEL-32-SG-E-2__52582__93671__84995.1544476975.jpg?c=2",
  },
  {
    name: "Galaxy S10",
    title: "Content Goes Here Soon",
    role: "Samsung",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://cdn.movertix.com/media/catalog/product/cache/image/600x/s/a/samsung-galaxy-s10-5g-en-negro-de-256gb-y-8gb-ram-sm-g977.jpg",
  },
  {
    name: "iPhone 7 Plus 128GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://cdn.alloallo.media/catalog/product/apple/iphone/iphone-7-plus/iphone-7-plus-black.jpg",
  },
  {
    name: "iPhone XS Max 64GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "data:image/jpeg;base64,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",
  },
  {
    name: "iPad Pro 9.7 128GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://assets.umart.com.au/newsite/images/201905/source_img/35541_P_1556670041740.jpg",
  },
  {
    name: "MacBook Pro 2020",
    title: "Content Goes Here Soon",
    role: "Admin",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://store.storeimages.cdn-apple.com/8756/as-images.apple.com/is/mbp-spacegray-select-202011_GEO_AU?wid=904&hei=840&fmt=jpeg&qlt=80&.v=1632948915000",
  },
  {
    name: "iPad 5th Gen 32GB",
    title: "Content Goes Here Soon",
    role: "Apple",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://cdn11.bigcommerce.com/s-xt5en0q8kf/images/stencil/1280x1280/products/4278/11807/IPAD5-CEL-32-SG-E-2__52582__93671__84995.1544476975.jpg?c=2",
  },
  {
    name: "Galaxy S10",
    title: "Content Goes Here Soon",
    role: "Samsung",
    email: "janecooper@example.com",
    telephone: "+1-202-555-0170",
    imageUrl:
      "https://cdn.movertix.com/media/catalog/product/cache/image/600x/s/a/samsung-galaxy-s10-5g-en-negro-de-256gb-y-8gb-ram-sm-g977.jpg",
  },
  // More people...
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
    tabs,
    navbar,
    incentives,

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
import tabs from "./tabs.vue"
import navbar from "./navbar.vue"
import incentives from "./incentives.vue";


</script>
