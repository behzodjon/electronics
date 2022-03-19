<template>
  <nav aria-label="Progress">
    <ol role="list" class="flex items-center justify-center">
      <li
        v-for="(step, index) in steps"
        :key="index"
        :class="[
          index !== steps.length - 1 ? 'pr-4 sm:pr-10' : '',
          'relative',
        ]"
      >
        <template v-if="step.status === 'complete'">
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="h-0.5 w-full bg-white" />
          </div>
          <a
            href="#"
            class="relative flex items-center justify-center w-6 h-6 bg-white rounded-full hover:bg-black"
          >
            <CheckIcon
              class="w-5 h-5 text-[#20633f] hover:text-white"
              aria-hidden="true"
            />
            <span class="sr-only">{{ step.component }}</span>
          </a>
        </template>
        <template
          v-else-if="step.status === 'current'"
          condition="step.status === 'current'"
        >
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="h-0.5 w-full bg-gray-200" />
          </div>
          <a
            href="#"
            class="
              relative
              flex
              items-center
              justify-center
              w-6
              h-6
              bg-white
              border-2 border-[#20633f]
              rounded-full
            "
            aria-current="step"
          >
            <span
              class="h-2.5 w-2.5 bg-[#20633f] rounded-full"
              aria-hidden="true"
            />
            <span class="sr-only">{{ step.component }}</span>
          </a>
        </template>
        <template v-else>
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="h-0.5 w-full bg-gray-200" />
          </div>
          <a
            href="#"
            class="relative flex items-center justify-center w-6 h-6 bg-white border-2 border-gray-300 rounded-full group hover:border-gray-400"
          >
            <span
              class="
                h-2.5
                w-2.5
                bg-transparent
                rounded-full
                group-hover:bg-gray-300
              "
              aria-hidden="true"
            />
            <span class="sr-only">{{ step.component }}</span>
          </a>
        </template>
      </li>
    </ol>
  </nav>
</template>

<script>
import { CheckIcon } from "@heroicons/vue/solid";
import store from "../../store";
import { computed } from "vue";

// const steps = [
//   { name: "Step 1", href: "#", status: "complete" },
//   { name: "Step 2", href: "#", status: "complete" },
//   { name: "Step 3", href: "#", status: "current" },
//   { name: "Step 4", href: "#", status: "upcoming" },
//   { name: "Step 5", href: "#", status: "upcoming" },
//   { name: "Step 6", href: "#", status: "upcoming" },
// ];

export default {
  components: {
    CheckIcon,
  },
  setup() {
    const steps = computed(() => store.state.steps);

    return {
      steps,
    };
  },
};
</script>