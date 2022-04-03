<template>
  <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">Just A Few Questions!</h1>
        <p
          class="pb-6 mt-2 text-gray-700 text-md"
        >Please fill in the below questions. Once complete, click next.</p>
      </div>
    </div>
    <div
      class="-mx-4 lg:-mx-0 px-6 py-4 rounded-none lg:rounded-lg bg-white border border-[#D5D6D7]"
    >
      <div class="md:grid md:grid-cols-1 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form @submit.prevent="submitBilling">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input
                  v-model="form.first_name"
                  type="text"
                  name="first-name"
                  id="first-name"
                  required
                  autocomplete="given-name"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input
                  v-model="form.last_name"
                  type="text"
                  name="last-name"
                  id="last-name"
                  autocomplete="family-name"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label
                  for="email-address"
                  class="block text-sm font-medium text-gray-700"
                >Email address</label>
                <input
                  type="text"
                  v-model="form.email"
                  name="email-address"
                  id="email-address"
                  autocomplete="email"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select
                  required
                  id="country"
                  v-model="form.country_id"
                  name="country"
                  autocomplete="country-name"
                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#0BADA2] focus:border-[#0BADA2] sm:text-sm"
                >
                  <option
                    v-for="country in countries"
                    :key="country.id"
                    :value="country.id"
                  >{{ country.name }}</option>
                </select>
              </div>

              <div class="col-span-6">
                <label
                  for="street-address"
                  class="block text-sm font-medium text-gray-700"
                >Street address</label>
                <input
                  v-model="form.street_address"
                  type="text"
                  name="street-address"
                  id="street-address"
                  autocomplete="street-address"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input
                  v-model="form.city"
                  type="text"
                  name="city"
                  id="city"
                  autocomplete="address-level2"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input
                  type="text"
                  name="region"
                  v-model="form.state"
                  id="region"
                  autocomplete="address-level1"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label
                  for="postal-code"
                  class="block text-sm font-medium text-gray-700"
                >ZIP / Postal code</label>
                <input
                  v-model="form.zip"
                  type="text"
                  name="postal-code"
                  id="postal-code"
                  autocomplete="postal-code"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>
            <div class="flex justify-end mt-4">
              <button
                type="submit"
                class="flex items-center px-4 py-3 text-xl font-medium text-white bg-[#0C0D0D] rounded-md w-fit hover:bg-indigo-700 md:py-3 md:text-sm md:px-8"
              >Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { useStore } from "vuex";
import { computed } from "vue";

const countries = computed(() => store.state.countries);
const store = useStore();

const form = {
  first_name: "",
  last_name: "",
  email: "",
  country_id: "",
  street_address: "",
  city: "",
  state: "",
  zip: "",
};
function submitBilling() {
  store.dispatch("storeBillingData", form)
}
store.dispatch("getCountries")
</script>






