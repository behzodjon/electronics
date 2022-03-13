<template>
  <RadioGroup v-model="selected">
    <RadioGroupLabel class="sr-only"> Privacy setting </RadioGroupLabel>
    <div class="-space-y-px bg-white rounded-none">
      <div v-if="products.length">
        <RadioGroupOption
          as="template"
          v-for="(item, index) in products"
          :key="index"
          :value="item.id"
          @click="productStorages(item)"
          v-slot="{ checked, active }"
        >
          <div
            :class="[
              index === 0 ? 'rounded-none' : '',
              index === products.length - 1 ? 'rounded-none' : '',
              checked
                ? 'bg-green-400 bg-opacity-10 border-1 border-green-800 z-10'
                : 'border-gray-200',
              'relative border p-4 flex cursor-pointer focus:outline-none',
            ]"
          >
            <span
              :class="[
                checked
                  ? 'bg-green-800 border-transparent'
                  : 'bg-white border-gray-300',
                active ? 'ring-0 ring-offset-0 ring-green-700' : '',
                'h-4 w-4 mt-0.5 cursor-pointer rounded-full border flex items-center justify-center',
              ]"
              aria-hidden="true"
            >
              <span class="rounded-full bg-white w-1.5 h-1.5" />
            </span>
            <div class="flex flex-col ml-3">
              <RadioGroupLabel
                as="span"
                :class="[
                  checked ? 'text-black' : 'text-gray-900',
                  'block text-sm lg:text-base font-medium',
                ]"
              >
                {{ item.model }}
              </RadioGroupLabel>
              <RadioGroupDescription
                as="span"
                :class="[
                  checked ? 'text-black' : 'text-gray-500',
                  'block text-sm',
                ]"
              >
                {{ item.brand.title }}
              </RadioGroupDescription>
            </div>
          </div>
        </RadioGroupOption>
      </div>
      <div class="text-center" v-else>No data</div>
    </div>
  </RadioGroup>
</template>

<script>
import { ref } from "vue";
import { computed } from "vue";

import {
  RadioGroup,
  RadioGroupDescription,
  DialogTitle,
  RadioGroupLabel,
  RadioGroupOption,
} from "@headlessui/vue";
import store from "../store";

const settings = [];

export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    DialogTitle,
  },
  setup() {
    const selected = ref(settings[0]);
    const products = computed(() => store.state.products);

    return {
      settings,
      products,
      selected,
      name: "SelectDevice",
    };
  },

  methods: {
    productStorages(value) {
      this.$store.dispatch("getProductStorages", value);
      this.$store.commit("setProductId", value.id);
    },
  },

};
</script>
