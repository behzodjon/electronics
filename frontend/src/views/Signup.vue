<template>
  <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <router-link :to="{ name: 'Home' }">
        <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900">
          The Ultimate Electronic ByBack Marketplace.
        </h2>
      </router-link>
    </div>
    <div v-if="loading" class="flex justify-center mt-8">
      <Spinner class="w-10 h-10" />
    </div>
    <div v-else class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
        <TabGroup>
          <TabList class="flex p-1 space-x-1 rounded-xl">
            <Tab as="template" v-slot="{ selected }">
              <button
                :class="[
                  selected
                    ? 'border-black text-black'
                    : 'border-[#e0e0e0] text-[#616161]',
                ]"
                class="
                  w-full
                  py-2.5
                  text-sm
                  leading-5
                  font-medium
                  focus:outline-none
                  border-b-2 border-solid
                "
              >
                Sign Up
              </button>
            </Tab>

            <Tab as="template" v-slot="{ selected }">
              <button
                :class="[
                  selected
                    ? 'border-black text-black'
                    : 'border-[#e0e0e0] text-[#616161]',
                ]"
                class="
                  w-full
                  py-2.5
                  text-sm
                  leading-5
                  font-medium
                  focus:outline-none
                  border-b-2 border-solid
                "
              >
                Sign In
              </button>
            </Tab>
          </TabList>
          <TabPanels>
            <TabPanel>
              <SignUpForm />
            </TabPanel>
            <TabPanel>
              <LoginForm />
            </TabPanel>
          </TabPanels>
        </TabGroup>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { TabGroup, TabList, Tab, TabPanels, TabPanel } from "@headlessui/vue";
import SignUpForm from "../components/SignUpForm.vue";
import LoginForm from "../components/LoginForm.vue";
import Spinner from "../components/common/Spinner.vue";

const loading = ref(true);

setTimeout(() => (loading.value = false), 500);
</script>
