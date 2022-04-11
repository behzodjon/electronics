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
                        <form class="flex w-full md:ml-0" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none"
                                    aria-hidden="true">
                                    <SearchIcon class="w-5 h-5" aria-hidden="true" />
                                </div>
                                <input id="search-field" name="search-field"
                                    class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:ring-0 focus:border-transparent sm:text-sm"
                                    placeholder="Search transactions" type="search" />
                            </div>
                        </form>
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
                <!-- Page header -->
                <div class="bg-white shadow">
                    <div class="px-4 sm:px-6 lg:max-w-6xl lg:mx-auto lg:px-8">
                        <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                            <div class="flex-1 min-w-0">
                                <!-- Profile -->
                                <div class="flex items-center">
                                    <img class="hidden w-16 h-16 rounded-full sm:block"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                        alt="" />
                                    <div>
                                        <div class="flex items-center">
                                            <img class="w-16 h-16 rounded-full sm:hidden"
                                                src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.6&w=256&h=256&q=80"
                                                alt="" />
                                            <h1
                                                class="ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                                Good morning, Emilia Birch
                                            </h1>
                                        </div>
                                        <dl class="flex flex-col mt-6 sm:ml-3 sm:mt-1 sm:flex-row sm:flex-wrap">
                                            <dt class="sr-only">Company</dt>
                                            <dd
                                                class="flex items-center text-sm font-medium text-gray-500 capitalize sm:mr-6">
                                                <OfficeBuildingIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400"
                                                    aria-hidden="true" />
                                                Duke street studio
                                            </dd>
                                            <dt class="sr-only">Account status</dt>
                                            <dd
                                                class="flex items-center mt-3 text-sm font-medium text-gray-500 capitalize sm:mr-6 sm:mt-0">
                                                <CheckCircleIcon class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400"
                                                    aria-hidden="true" />
                                                Verified account
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-6 space-x-3 md:mt-0 md:ml-4">
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    Add money
                                </button>
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">
                                    Send money
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                        <h2 class="text-lg font-medium leading-6 text-gray-900">Overview</h2>
                        <div class="grid grid-cols-1 gap-5 mt-2 sm:grid-cols-2 lg:grid-cols-3">
                            <!-- Card -->
                            <div v-for="card in cards" :key="card.name"
                                class="overflow-hidden bg-white rounded-lg shadow">
                                <div class="p-5">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <component :is="card.icon" class="w-6 h-6 text-gray-400"
                                                aria-hidden="true" />
                                        </div>
                                        <div class="flex-1 w-0 ml-5">
                                            <dl>
                                                <dt class="text-sm font-medium text-gray-500 truncate">
                                                    {{ card.name }}
                                                </dt>
                                                <dd>
                                                    <div class="text-lg font-medium text-gray-900">
                                                        {{ card.amount }}
                                                    </div>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-3 bg-gray-50">
                                    <div class="text-sm">
                                        <a :href="card.href" class="font-medium text-cyan-700 hover:text-cyan-900">
                                            View all
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="max-w-6xl px-4 mx-auto mt-8 text-lg font-medium leading-6 text-gray-900 sm:px-6 lg:px-8">
                        Recent activity
                    </h2>

                    <!-- Activity list (smallest breakpoint only) -->
                    <div class="shadow sm:hidden">
                        <ul role="list" class="mt-2 overflow-hidden divide-y divide-gray-200 shadow sm:hidden">
                            <li v-for="transaction in transactions" :key="transaction.id">
                                <a :href="transaction.href" class="block px-4 py-4 bg-white hover:bg-gray-50">
                                    <span class="flex items-center space-x-4">
                                        <span class="flex flex-1 space-x-2 truncate">
                                            <CashIcon class="flex-shrink-0 w-5 h-5 text-gray-400" aria-hidden="true" />
                                            <span class="flex flex-col text-sm text-gray-500 truncate">
                                                <span class="truncate">{{ transaction.name }}</span>
                                                <span><span class="font-medium text-gray-900">{{
                                                    transaction.amount
                                                }}</span> {{ transaction.currency }}</span>
                                                <time :datetime="transaction.datetime">{{ transaction.date }}</time>
                                            </span>
                                        </span>
                                        <ChevronRightIcon class="flex-shrink-0 w-5 h-5 text-gray-400"
                                            aria-hidden="true" />
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <nav class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200"
                            aria-label="Pagination">
                            <div class="flex justify-between flex-1">
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
                                    Previous
                                </a>
                                <a href="#"
                                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500">
                                    Next
                                </a>
                            </div>
                        </nav>
                    </div>

                    <!-- Activity table (small breakpoint and up) -->
                    <div class="hidden sm:block">
                        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
                            <div class="flex flex-col mt-2">
                                <div
                                    class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                                    Transaction
                                                </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                                    Amount
                                                </th>
                                                <th
                                                    class="hidden px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:block">
                                                    Status
                                                </th>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase bg-gray-50">
                                                    Date
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr v-for="transaction in transactions" :key="transaction.id"
                                                class="bg-white">
                                                <td
                                                    class="w-full px-6 py-4 text-sm text-gray-900 max-w-0 whitespace-nowrap">
                                                    <div class="flex">
                                                        <a :href="transaction.href"
                                                            class="inline-flex space-x-2 text-sm truncate group">
                                                            <CashIcon
                                                                class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500"
                                                                aria-hidden="true" />
                                                            <p class="text-gray-500 truncate group-hover:text-gray-900">
                                                                {{ transaction.name }}
                                                            </p>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">
                                                    <span class="font-medium text-gray-900">{{ transaction.amount }}
                                                    </span>
                                                    {{ transaction.currency }}
                                                </td>
                                                <td
                                                    class="hidden px-6 py-4 text-sm text-gray-500 whitespace-nowrap md:block">
                                                    <span
                                                        :class="[statusStyles[transaction.status], 'inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium capitalize']">
                                                        {{ transaction.status }}
                                                    </span>
                                                </td>
                                                <td
                                                    class="px-6 py-4 text-sm text-right text-gray-500 whitespace-nowrap">
                                                    <time :datetime="transaction.datetime">{{ transaction.date }}</time>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- Pagination -->
                                    <nav class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6"
                                        aria-label="Pagination">
                                        <div class="hidden sm:block">
                                            <p class="text-sm text-gray-700">
                                                Showing
                                                {{ ' ' }}
                                                <span class="font-medium">1</span>
                                                {{ ' ' }}
                                                to
                                                {{ ' ' }}
                                                <span class="font-medium">10</span>
                                                {{ ' ' }}
                                                of
                                                {{ ' ' }}
                                                <span class="font-medium">20</span>
                                                {{ ' ' }}
                                                results
                                            </p>
                                        </div>
                                        <div class="flex justify-between flex-1 sm:justify-end">
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                                Previous
                                            </a>
                                            <a href="#"
                                                class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                                Next
                                            </a>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
const cards = [
    { name: 'Account balance', href: '#', icon: ScaleIcon, amount: '$30,659.45' },
    // More items...
]
const transactions = [
    {
        id: 1,
        name: 'Payment to Molly Sanders',
        href: '#',
        amount: '$20,000',
        currency: 'USD',
        status: 'success',
        date: 'July 11, 2020',
        datetime: '2020-07-11',
    },
    // More transactions...
]
const statusStyles = {
    success: 'bg-green-100 text-green-800',
    processing: 'bg-yellow-100 text-yellow-800',
    failed: 'bg-gray-100 text-gray-800',
}

const sidebarOpen = ref(false)


</script>