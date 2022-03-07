<template>
  <div>
    <component v-bind:is="steps[currentStep].component" />
    <div class="bg-gray-100 border-t-2 border-gray-300 w-full fixed bottom-0">
      <div class="w-full mx-auto pt-0 lg:pt-2 pb-2 lg:pb-4 px-4">
        <div class="flex items-center justify-start">
          <div
            class="mt-2 flex-shrink-0 w-auto sm:order-2 sm:mt-0 grid grid-cols-2 gap-x-4"
          >
            <button
              v-if="currentStep !== 0"
              v-on:click="previous"
              class="flex items-center justify-center px-4 py-2rounded-none text-md font-medium text-black underline decoration-4 decoration-green-500"
            >
              Prev
            </button>
            <button
              v-if="currentStep < steps.length - 1"
              v-on:click="next"
              class="flex items-center justify-center px-4 py-2 border border-black rounded-md shadow-sm text-sm font-medium text-white bg-neutral-800 hover:bg-black"
            >
              Next
            </button>
            <button
              v-else
              class="flex items-center justify-center px-4 py-2 border border-black rounded-md shadow-sm text-sm font-medium text-white bg-neutral-800 hover:bg-black"
            >
              Get Paid!
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SelectDevice from "./SelectDevice.vue";
import SelectStorage from "./SelectStorage.vue";
import SelectCondition from "./SelectCondition.vue";
import Valuation from "./Valuation.vue";
import { SpeakerphoneIcon, XIcon } from "@heroicons/vue/outline";
import Understand from "./understandprocess.vue";

export default {
  name: "wizard",
  data() {
    return {
      currentStep: 0,
      steps: [
        {
          component: Understand,
        },
        {
          component: SelectDevice,
        },
        {
          component: SelectStorage,
        },
        {
          component: SelectCondition,
        },
        {
          component: Valuation,
        },
      ],
    };
  },

  methods: {
    next() {
      this.currentStep += 1;
    },
    previous() {
      this.currentStep -= 1;
    },
  },

  components: [Understand, SelectDevice, SelectStorage, SelectCondition, Valuation],
};
</script>
