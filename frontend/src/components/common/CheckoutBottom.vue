<template>
    <div class="max-w-5xl px-4 pb-10 mx-auto mt-6 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <div class="mt-4 space-x-4 sm:mt-0 sm:ml-0 sm:flex">
                    <slot ></slot>
                    <!-- <div v-if="items.length" class="shrink-0">
                        <button
                            type="submit"
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
                    </Sell>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style lang="scss" scoped>
</style>