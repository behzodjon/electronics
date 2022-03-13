<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <button
    @click="openSidebar"
    class="inline-block px-5 py-2 text-base font-medium border border-transparent rounded-md bg-neutral-900 text-slate-50 hover:bg-neutral-800"
  >
    Sell
    <div
      class="absolute w-4 h-4 -mt-1 -mr-1 bg-green-600 rounded-full top-3 right-4 animate-ping lg:invisible"
    ></div>
    <div
      class="absolute w-4 h-4 -mt-1 -mr-1 bg-green-400 rounded-full top-3 right-4 lg:invisible"
    ></div>
  </button>
  <TransitionRoot as="template" :show="open">
    <Dialog
      as="div"
      class="fixed inset-0 overflow-hidden"
      @close="closeSidebar"
    >
      <div class="absolute inset-0 overflow-hidden">
        <TransitionChild
          as="template"
          enter="ease-in-out duration-500"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in-out duration-500"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="absolute inset-0 transition-opacity bg-gray-500 bg-opacity-75 "
          />
        </TransitionChild>

        <div class="fixed inset-y-0 right-0 flex max-w-full pl-0">
          <TransitionChild
            as="template"
            enter="transform transition ease-in-out duration-500 sm:duration-700"
            enter-from="translate-x-full"
            enter-to="translate-x-0"
            leave="transform transition ease-in-out duration-500 sm:duration-700"
            leave-from="translate-x-0"
            leave-to="translate-x-full"
          >
            <div class="w-screen max-w-md">
              <div
                class="flex flex-col h-full overflow-y-scroll bg-gray-100 shadow-xl "
              >
                <div class="py-4 px-4 bg-[#00633F] sm:px-6">
                  <div class="flex items-center justify-between">
                    <DialogTitle
                      class="text-xl font-bold text-center text-white"
                    >
                      Select Your Device
                    </DialogTitle>
                    <div class="flex items-center ml-3 h-7">
                      <button
                        type="button"
                        class="text-white hover:text-white focus:outline-none focus:ring-white"
                        @click="closeSidebar"
                      >
                        <span class="sr-only">Close panel</span>
                        <XIcon class="w-6 h-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="relative flex-1 mt-0">
                  <wizard></wizard>
                </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import store from "../store";

import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { XIcon } from "@heroicons/vue/outline";
import wizard from "./wizard.vue";
import { computed } from "vue";

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
    wizard,
  },

  setup() {
    const open = computed(() => store.state.sideBarOpen);

    function openSidebar() {
      store.dispatch("getSideBarState", true);
    }
    function closeSidebar() {
      store.dispatch("getSideBarState", false);
      store.dispatch("setDirectOpen", false);
    }
    return {
      open,
      closeSidebar,
      openSidebar,
    };
  },
};
</script>