<template>
 <div class="animate__animated animate__fadeInRight animate__faster">
  <RadioGroup v-model="selected">
    <RadioGroupLabel class="sr-only"> Privacy setting </RadioGroupLabel>
    <div class="-space-y-px bg-white rounded-none">
      <RadioGroupOption
        as="template"
        v-for="(item, index) in items"
        :key="index"
        @click="getConditionId(item)"
        :value="item.title"
        v-slot="{ checked, active }"
      >
        <div
          :class="[
            index === 0 ? 'rounded-none' : '',
            index === items.length - 1 ? 'rounded-none' : '',
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
              {{ item.title }}
            </RadioGroupLabel>
            <RadioGroupDescription
              as="span"
              :class="[
                checked ? 'text-black' : 'text-gray-500',
                'block text-sm',
              ]"
            >
              Condition
            </RadioGroupDescription>
          </div>
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>
  </div>

  <Great v-if="selected === 'Great Condition'" />
  <Used v-if="selected === 'Used Condition'" />
  <Dead v-if="selected === 'Dead'" />
  <Brand v-if="selected === 'Brand New'" />
</template>

<script>
import { ref } from "vue";
import axiosClient from "../axios";

import {
  RadioGroup,
  RadioGroupDescription,
  RadioGroupLabel,
  RadioGroupOption,
} from "@headlessui/vue";

import Great from "./conditions/great.vue";
import Used from "./conditions/used.vue";
import Dead from "./conditions/dead.vue";
import Brand from "./conditions/brandnew.vue";

const settings = [
  { condition: "Brand New" },
  { condition: "Great Condition" },
  { condition: "Used Condition" },
  { condition: "Dead" },
];

export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    Great,
    Used,
    Dead,
    Brand,
  },
  setup() {
    const selected = ref(settings[0]);

    return {
      settings,
      selected,
      name: "SelectCondition",
    };
  },

  methods: {
    getConditionId(value) {
      this.$store.commit("setConditionId", value.id);
    },
  },
  data() {
    return {
      items: [],
    };
  },
  created() {
    axiosClient
      .get(`/conditions`)
      .then((response) => {
        this.items = response.data;
      })
      .catch((e) => {
        console.log(e);
      });
  },
};
</script>
