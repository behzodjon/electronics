<template>
    <div aria-live="assertive" class="fixed flex items-end px-4 py-6 pointer-events-none left-2 bottom-4 sm:p-6 sm:items-start w-[300px]">
        <div class="flex flex-col items-center w-full space-y-4 sm:items-end">
            <transition enter-active-class="transition duration-300 ease-out transform"
                enter-from-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <div v-if="notification.show"
                    class="w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-lg pointer-events-auto ring-1 ring-black ring-opacity-5">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <CheckCircleIcon class="w-6 h-6 text-green-400" aria-hidden="true" />
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900">
                                   {{ notification.message }}
                                </p>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { CheckCircleIcon } from '@heroicons/vue/outline'
import { XIcon } from '@heroicons/vue/solid'
import { computed } from "vue";
import { useStore } from "vuex";
const store = useStore();
const notification = computed(() => store.state.notification);

</script>