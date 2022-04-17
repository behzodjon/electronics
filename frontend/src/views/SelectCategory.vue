<template>
  <div>
    <div v-if="categories.length" class="animate__animated animate__lightSpeedInRight">
      <RadioGroup v-model="selected">
        <RadioGroupLabel class="sr-only"> Privacy setting </RadioGroupLabel>
        <div class="-space-y-px bg-white rounded-none">
          <div v-if="categories.length">
            <p v-if="!selected && clickedState" class="py-2 text-center text-red-500">
              Please, select a category!
            </p>
            <RadioGroupOption as="template" v-for="(item, index) in categories" :key="index" :value="item.id"
              @click="categoryProducts(item)" v-slot="{ checked, active }">
              <div :class="[
                index === 0 ? 'rounded-none' : '',
                index === categories.length - 1 ? 'rounded-none' : '',
                checked
                  ? 'bg-green-400 bg-opacity-10 border-1 border-green-800 z-10'
                  : 'border-gray-200',
                'relative border p-4 flex cursor-pointer focus:outline-none',
              ]">
                <span :class="[
                  checked
                    ? 'bg-green-800 border-transparent'
                    : 'bg-white border-gray-300',
                  active ? 'ring-0 ring-offset-0 ring-green-700' : '',
                  'h-4 w-4 mt-0.5 cursor-pointer rounded-full border flex items-center justify-center',
                ]" aria-hidden="true">
                  <span class="rounded-full bg-white w-1.5 h-1.5" />
                </span>
                <div class="flex flex-col ml-3">
                  <RadioGroupLabel as="span" :class="[
                    checked ? 'text-black' : 'text-gray-900',
                    'block text-sm lg:text-base font-medium',
                  ]">
                    {{ item.title }}
                  </RadioGroupLabel>
                </div>
              </div>
            </RadioGroupOption>
          </div>
          <div class="text-center" v-else>No data</div>
        </div>
      </RadioGroup>
    </div>
    <div v-else class="flex justify-center mt-8">
      <DeviceFormSpinner class="w-10 h-10" />
    </div>
  </div>
</template>

<script setup>
import store from "../store";
import { computed, ref } from "vue";
import DeviceFormSpinner from "../components/common/DeviceFormSpinner.vue";

import {
  RadioGroup,
  RadioGroupLabel,
  RadioGroupOption,
} from "@headlessui/vue";

//fetching products
const categories = computed(() => store.state.categories);
const clickedState = computed(() => store.state.clicked);

const selected = ref(null);

store.dispatch("getCategories");
store.dispatch("changeSelectedValue", selected.value);
store.dispatch("changeClickedValue", false);

store.commit("setSectionTitle", "Select category");

//fetching product storages
function categoryProducts(value) {
  store.commit("setCategoryId", value.id);
  store.dispatch("changeSelectedValue", selected.value);
}
</script>
