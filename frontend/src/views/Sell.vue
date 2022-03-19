<template>
<div>
  <button
    @click="openSidebar"
    class="flex items-center px-4 py-3 text-base font-medium text-white bg-green-900 border-b-4 border-r-4 border-black rounded-md w-fit hover:bg-indigo-700 md:py-4 md:text-sm md:px-6"
  >
    Sell Now
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
                      {{sectionTitle}}
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
  </div>
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
    const sectionTitle = computed(() => store.state.sectionTitle);

    function openSidebar() {
      store.dispatch("getSideBarState", true);
    }
    function closeSidebar() {
      store.dispatch("getSideBarState", false);
      store.dispatch("setDirectOpen", false);
    }
    return {
      open,
      sectionTitle,
      closeSidebar,
      openSidebar,
    };
  },
};
</script>