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
                                    <router-link :to="step.to">{{ step.name }}</router-link>
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
            <router-view v-slot="{ Component }">
                <transition name="route" mode="out-in">
                    <component :is="Component"></component>
                </transition>
            </router-view>
            <Notification />
        </div>

        <div class="max-w-5xl px-4 pb-10 mx-auto mt-6 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <div class="mt-4 space-x-4 sm:mt-0 sm:ml-0 sm:flex">
                        <div class="shrink-0">
                            <button
                                @click="nextStep"
                                class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2"
                            >Next Step</button>
                        </div>
                        <Sell v-if="route.path == '/checkout'" class="w-full">
                            <template v-slot:sell="{ openSidebar }">
                                <button
                                    @click="openSidebar"
                                    type="button"
                                    class="px-4 py-2 text-sm font-medium text-black underline border border-transparent rounded-md focus:outline-none focus:ring-offset-2 sm:w-auto"
                                >Add Another Device</button>
                            </template>
                        </Sell>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter, useRoute } from "vue-router";
import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { Popover, PopoverButton, PopoverOverlay, PopoverPanel, TransitionChild, TransitionRoot } from '@headlessui/vue'
import Sell from "../views/Sell.vue";
import Notification from "../components/common/Notification.vue";

const steps = [
    { name: 'Wallet', to: '/checkout', },
    { name: 'Billing Information', to: '/cart-info', },
    { name: 'Payment Method', to: '/payment', },
    { name: 'Delivery Method', to: '/delivery', },
    { name: 'Confirmation', to: '/confirmation', },
]
const router = useRouter();
const route = useRoute();
const store = useStore();


function nextStep() {
    router.push({
        name: "Cartinfo",
    });
}
</script>
<style scoped>
.active-link {
    color: #0bada2;
}
</style>





