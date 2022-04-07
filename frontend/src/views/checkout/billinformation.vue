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
    <form ref="form_bill" @submit.prevent="submitBilling">
      <div
        class="-mx-4 lg:-mx-0 px-6 py-4 rounded-none lg:rounded-lg bg-white border border-[#D5D6D7]"
      >
        <div class="md:grid md:grid-cols-1 md:gap-6">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input
                  @change="dataChange"
                  v-model="form.first_name"
                  type="text"
                  id="first-name"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input
                  @change="dataChange"
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
                  @change="dataChange"
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
                  @change="dataChange"
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
                  @change="dataChange"
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
                  @change="dataChange"
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
                  @change="dataChange"
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
                  @change="dataChange"
                  name="postal-code"
                  id="postal-code"
                  autocomplete="postal-code"
                  required
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <CheckoutBottom class="lg:px-0">
        <div class="shrink-0">
          <button
            :disabled="isEmpty"
          :class="{ inactive: isEmpty }"
            type="submit"
            @click="nextStep"
            class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2"
          >Next Step</button>
        </div>
      </CheckoutBottom>
    </form>
  </div>
</template>

<script setup>
import CheckoutBottom from "../../components/common/CheckoutBottom.vue";
import { ChevronRightIcon, ChevronUpIcon } from '@heroicons/vue/solid'
import { useStore } from "vuex";
import { computed, ref } from "vue";
import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const countries = computed(() => store.state.countries);
const store = useStore();

const form_bill = ref(null)
const isEmpty = ref(true)

store.dispatch("getCountries")

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

function dataChange() {
  isEmpty.value = Object.values(form).every(x => x === null || x === '');
  
}
function submitBilling() {

  store.dispatch("storeBillingData", form).then(() => {
    form_bill.value.reset()
    store.commit('cart/SET_BILL_INFO', true)
    router.push({
      name: "PaymentMethod",
    });
    store.commit("notify", {
      type: "success",
      message: "Your data was saved!",
    });
  });

}
</script>
<style scoped>

</style>






