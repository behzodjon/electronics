<template>
    <div class="min-h-full">
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog as="div" class="fixed inset-0 z-40 flex lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
                </TransitionChild>
                <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                    enter-from="-translate-x-full" enter-to="translate-x-0"
                    leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                    leave-to="-translate-x-full">
                    <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-cyan-700">
                        <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                            enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100"
                            leave-to="opacity-0">
                            <div class="absolute top-0 right-0 pt-2 -mr-12">
                                <button type="button"
                                    class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                    @click="sidebarOpen = false">
                                    <span class="sr-only">Close sidebar</span>
                                    <XIcon class="w-6 h-6 text-white" aria-hidden="true" />
                                </button>
                            </div>
                        </TransitionChild>
                        <div class="flex items-center flex-shrink-0 px-4">
                            <img class="w-auto h-8"
                                src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                                alt="Easywire logo" />
                        </div>
                        <nav class="flex-shrink-0 h-full mt-5 overflow-y-auto divide-y divide-cyan-800"
                            aria-label="Sidebar">
                            <div class="px-2 space-y-1">
                                <a v-for="item in navigation" :key="item.name" :href="item.href"
                                    :class="[item.current ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']"
                                    :aria-current="item.current ? 'page' : undefined">
                                    <component :is="item.icon" class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                                        aria-hidden="true" />
                                    {{ item.name }}
                                </a>
                            </div>
                            <div class="pt-6 mt-6">
                                <div class="px-2 space-y-1">
                                    <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href"
                                        class="flex items-center px-2 py-2 text-base font-medium rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
                                        <component :is="item.icon" class="w-6 h-6 mr-4 text-cyan-200"
                                            aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </TransitionChild>
                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-grow pt-5 pb-4 overflow-y-auto bg-cyan-700">
                <div class="flex items-center flex-shrink-0 px-4">
                    <img class="w-auto h-8"
                        src="https://tailwindui.com/img/logos/easywire-logo-cyan-300-mark-white-text.svg"
                        alt="Easywire logo" />
                </div>
                <nav class="flex flex-col flex-1 mt-5 overflow-y-auto divide-y divide-cyan-800" aria-label="Sidebar">
                    <div class="px-2 space-y-1">
                        <a v-for="item in navigation" :key="item.name" :href="item.href"
                            :class="[item.current ? 'bg-cyan-800 text-white' : 'text-cyan-100 hover:text-white hover:bg-cyan-600', 'group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md']"
                            :aria-current="item.current ? 'page' : undefined">
                            <component :is="item.icon" class="flex-shrink-0 w-6 h-6 mr-4 text-cyan-200"
                                aria-hidden="true" />
                            {{ item.name }}
                        </a>
                    </div>
                    <div class="pt-6 mt-6">
                        <div class="px-2 space-y-1">
                            <a v-for="item in secondaryNavigation" :key="item.name" :href="item.href"
                                class="flex items-center px-2 py-2 text-sm font-medium leading-6 rounded-md group text-cyan-100 hover:text-white hover:bg-cyan-600">
                                <component :is="item.icon" class="w-6 h-6 mr-4 text-cyan-200" aria-hidden="true" />
                                {{ item.name }}
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div class="flex flex-col flex-1 lg:pl-64">
            <div class="relative z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 lg:border-none">
                <button type="button"
                    class="px-4 text-gray-400 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500 lg:hidden"
                    @click="sidebarOpen = true">
                    <span class="sr-only">Open sidebar</span>
                    <MenuAlt1Icon class="w-6 h-6" aria-hidden="true" />
                </button>
                <!-- Search bar -->
                <div class="flex justify-between flex-1 px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                    <div class="flex flex-1">
                       
                    </div>
                    <div class="flex items-center ml-4 md:ml-6">
                        <button type="button"
                            class="p-1 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="w-6 h-6" aria-hidden="true" />
                        </button>

                        <!-- Profile dropdown -->
                        <Menu as="div" class="relative ml-3">
                            <div>
                                <MenuButton
                                    class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 lg:p-2 lg:rounded-md lg:hover:bg-gray-50">
                                    <img class="w-8 h-8 rounded-full"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="" />
                                    <span class="hidden ml-3 text-sm font-medium text-gray-700 lg:block"><span
                                            class="sr-only">Open user menu for </span>Emilia Birch</span>
                                    <ChevronDownIcon class="flex-shrink-0 hidden w-5 h-5 ml-1 text-gray-400 lg:block"
                                        aria-hidden="true" />
                                </MenuButton>
                            </div>
                            <transition enter-active-class="transition duration-100 ease-out"
                                enter-from-class="transform scale-95 opacity-0"
                                enter-to-class="transform scale-100 opacity-100"
                                leave-active-class="transition duration-75 ease-in"
                                leave-from-class="transform scale-100 opacity-100"
                                leave-to-class="transform scale-95 opacity-0">
                                <MenuItems
                                    class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <MenuItem v-slot="{ active }">
                                    <a href="#"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your
                                        Profile</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                    <a href="#"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Settings</a>
                                    </MenuItem>
                                    <MenuItem v-slot="{ active }">
                                    <a href="#"
                                        :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Logout</a>
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>
                </div>
            </div>
            <main class="flex-1 pb-8">
             <router-view></router-view>
            </main>
        </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    BellIcon,
    ClockIcon,
    CogIcon,
    CreditCardIcon,
    DocumentReportIcon,
    HomeIcon,
    MenuAlt1Icon,
    QuestionMarkCircleIcon,
    ScaleIcon,
    ShieldCheckIcon,
    UserGroupIcon,
    XIcon,
} from '@heroicons/vue/outline'
import {
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    OfficeBuildingIcon,
    SearchIcon,
} from '@heroicons/vue/solid'

const navigation = [
    { name: 'Home', href: '#', icon: HomeIcon, current: true },
    { name: 'History', href: '#', icon: ClockIcon, current: false },
    { name: 'Balances', href: '#', icon: ScaleIcon, current: false },
    { name: 'Cards', href: '#', icon: CreditCardIcon, current: false },
    { name: 'Recipients', href: '#', icon: UserGroupIcon, current: false },
    { name: 'Reports', href: '#', icon: DocumentReportIcon, current: false },
]
const secondaryNavigation = [
    { name: 'Settings', href: '#', icon: CogIcon },
    { name: 'Help', href: '#', icon: QuestionMarkCircleIcon },
    { name: 'Privacy', href: '#', icon: ShieldCheckIcon },
]


const sidebarOpen = ref(false)


</script>