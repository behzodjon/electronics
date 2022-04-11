<template>
    <div class="max-h-100">
        <div class="bg-[#F9F9F9]">
            <header
                class="relative bg-[#F9F9F9] border-b border-[#EAEAEB] text-sm lg:text-base font-medium text-gray-700"
            >
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="relative flex justify-end sm:justify-center">
                        <nav aria-label="Progress" class>
                            <ol role="list" class="flex space-x-4">
                                <li
                                    v-for="(step, index) in steps"
                                    :key="index"
                                    class="flex items-center"
                                >
                                    <router-link     :to="step.to">{{ step.name }}</router-link>
                                    <ChevronRightIcon
                                        v-if="index !== steps.length - 1"
                                        class="w-5 h-5 ml-2 text-gray-300"
                                        aria-hidden="true"
                                    />
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </header>
            <router-view ref="view" v-slot="{ Component }">
                <transition name="route" mode="out-in">
                    <component  :is="Component"></component>
                </transition>
            </router-view>
            <Notification />
        </div>
    </div>
</template>

<script setup>

import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Notification from "../components/common/Notification.vue";
import { useStore } from "vuex";
import { computed, ref } from "vue";

const store = useStore();
const activeRoute = computed(() => store.state.cart.activeRoute);

const steps = [
    { name: 'Wallet', status: 'completed', to: '/checkout', },
    { name: 'Billing Information', status: 'uncompleted', to: '/cart-info', },
    { name: 'Payment Method', status: 'uncompleted', to: '/payment', },
    { name: 'Delivery Method', status: 'uncompleted', to: '/delivery', },
    { name: 'Confirmation', status: 'uncompleted', to: '/confirmation', },
]



</script>
<style scoped>
.active-link {
    color: #0bada2;
}
</style>





