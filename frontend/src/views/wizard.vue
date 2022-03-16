<template>
  <div>
    <component :is="steps[currentStep].component" />
    <div class="fixed bottom-0 w-full bg-gray-100 border-t-2 border-gray-300">
      <div class="w-full px-4 pt-0 pb-2 mx-auto lg:pt-2 lg:pb-4">
        <div class="flex items-center justify-start">
          <div
            class="grid flex-shrink-0 w-auto grid-cols-2 mt-2 sm:order-2 sm:mt-0 gap-x-4"
          >
            <button
              v-if="currentStep !== 0"
              v-on:click="previous"
              class="flex items-center justify-center px-4 font-medium text-black underline py-2rounded-none text-md decoration-4 decoration-green-500"
            >
              Prev
            </button>
            <button
              v-if="currentStep < steps.length - 1"
              v-on:click="next"
              class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white border border-black rounded-md shadow-sm bg-neutral-800 hover:bg-black"
            >
              Next
            </button>
            <button
              v-else
              class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white border border-black rounded-md shadow-sm bg-neutral-800 hover:bg-black"
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
import SelectCategory from './SelectCategory.vue';

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
          component: SelectCategory,
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
  computed: {
    selected() {
     return this.$store.state.selected;
    },
  },
  methods: {
    next() {
      if (this.selected) {
        this.currentStep += 1;
      }
      this.$store.dispatch("changeClickedValue", true);
    },
    previous() {
      this.currentStep -= 1;
    },
  
  },
  created() {
    if (this.$store.state.directOpen) {
      this.currentStep = 2;
    }
  },

  components: [
    Understand,
    SelectDevice,
    SelectStorage,
    SelectCondition,
    Valuation,
  ],
};
</script>
