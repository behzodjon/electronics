<!-- This example requires Tailwind CSS v2.0+ -->
<template>
<button @click="open = true"  class="inline-block  py-2 px-5 border border-transparent rounded-md text-base font-medium bg-neutral-900 text-slate-50 hover:bg-neutral-800">Sell<div class="absolute top-3 right-4 -mr-1 -mt-1 w-4 h-4 rounded-full bg-green-600 animate-ping lg:invisible"></div><div class="absolute top-3 right-4 -mr-1 -mt-1 w-4 h-4 rounded-full bg-green-400 lg:invisible"></div></button>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed inset-0 overflow-hidden" @close="open = false">
      <div class="absolute inset-0 overflow-hidden">
        <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <div class="fixed inset-y-0 right-0 pl-0 max-w-full flex">
          <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
            <div class="w-screen max-w-md">
              <div class="h-full flex flex-col bg-gray-100 shadow-xl overflow-y-scroll">
                    <div class="py-4 px-4 bg-[#00633F] sm:px-6">
                  <div class="flex items-center justify-between">
                    <DialogTitle class= "text-center text-xl font-bold text-white">    
                     Select Your Device
                    </DialogTitle>
                     <div class="ml-3 h-7 flex items-center">
                      <button type="button" class=" text-white hover:text-white focus:outline-none focus:ring-white" @click="open = false">
                        <span class="sr-only">Close panel</span>
                        <XIcon class="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="mt-0 relative flex-1">
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


import { ref } from 'vue'
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XIcon } from '@heroicons/vue/outline'
import wizard from './wizard.vue'

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
    wizard
},
  setup() {
    const open = ref(false)

    return {
      open,
    }
  },
}
</script>