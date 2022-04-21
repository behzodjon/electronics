<template>
  <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-2xl font-bold text-gray-900 lg:text-3xl">Just A Few Questions!</h1>
        <p class="pb-6 mt-2 text-gray-700 text-md">Please fill in the below questions. Once complete, click next.</p>
      </div>
    </div>
    <form ref="form_bill" @submit.prevent="submitBilling">
      <div class="-mx-4 lg:-mx-0 px-6 py-4 rounded-none lg:rounded-lg bg-white border border-[#D5D6D7]">
        <div class="md:grid md:grid-cols-1 md:gap-6">
          <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input @change="dataChange" v-model="form.first_name" type="text" id="first-name"
                  :class="{ 'border-red-500': errors['first_name'] }"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('title')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['title']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input :class="{ 'border-red-500': errors['last_name'] }" @change="dataChange" v-model="form.last_name"
                  type="text" name="last-name" id="last-name"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('last_name')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['last_name']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-4">
                <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                <input :class="{ 'border-red-500': errors['email'] }" type="text" @change="dataChange"
                  v-model="form.email" name="email-address" id="email-address" autocomplete="email"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('email')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['email']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <select id="country" @change="dataChange" v-model="form.country_id"
                  :class="{ 'border-red-500': errors['country_id'] }" name="country" autocomplete="country-name"
                  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-[#0BADA2] focus:border-[#0BADA2] sm:text-sm">
                  <option v-for="country in countries" :key="country.id" :value="country.id">{{ country.name }}</option>
                </select>
                <div v-if="errors.hasOwnProperty('country_id')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['country_id']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6">
                <label for="street-address" class="block text-sm font-medium text-gray-700">Street address</label>
                <input v-model="form.street_address" type="text" @change="dataChange" name="street-address"
                  :class="{ 'border-red-500': errors['street_address'] }" id="street-address"
                  autocomplete="street-address"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('street_address')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['street_address']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <input :class="{ 'border-red-500': errors['city'] }" v-model="form.city" type="text" name="city"
                  @change="dataChange" id="city"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('city')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['city']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="region" class="block text-sm font-medium text-gray-700">State / Province</label>
                <input :class="{ 'border-red-500': errors['state'] }" type="text" name="region" @change="dataChange"
                  v-model="form.state" id="region"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('state')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['state']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal code</label>
                <input :class="{ 'border-red-500': errors['zip'] }" v-model="form.zip" type="text" @change="dataChange"
                  name="postal-code" id="postal-code"
                  class="mt-1 focus:ring-[#0BADA2] focus:border-[#0BADA2] block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                <div v-if="errors.hasOwnProperty('zip')" class="mt-2 text-sm text-red-500">
                  <div v-for="(error, errorIndex) in errors['zip']" :key="`name-${errorIndex}`">
                    <div>* {{ error }}</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <CheckoutBottom class="lg:px-0">
        <div class="shrink-0">
          <button :disabled="isEmpty" :class="{ inactive: isEmpty }" type="submit"
            class="rounded-md border border-transparent bg-[#0C0D0D] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#0C0D0D] focus:outline-none focus:ring-2 focus:ring-[#0C0D0D] focus:ring-offset-2">Next
            Step</button>
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
store.commit('cart/SET_ROUTE_ACTIVE', false)

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

const errors = ref({});


function dataChange() {
  isEmpty.value = Object.values(form).every(x => x === null || x === '');
}

const submitBilling = async () => {
  try {
    await store.dispatch("storeBillingData", form)
    form_bill.value.reset()
    store.commit('cart/SET_ROUTE_ACTIVE', true)
    router.push({
      name: "PaymentMethod",
    });

    store.commit("notify", {
      type: "success",
      message: "Successfully saved!",
    });
  } catch (error) {
    if (error.response.status === 422) {
      errors.value = error.response.data.errors;
    }
  }
}
</script>
<style scoped>
</style>






