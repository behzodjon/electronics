<template>
 <div class="max-w-5xl px-4 mx-auto mt-6 sm:px-6 lg:px-8">
  <RadioGroup v-model="selectedMailingLists">
    <RadioGroupLabel class="text-base font-medium text-gray-900">
      Select a payment method
    </RadioGroupLabel>

    <div class="grid grid-cols-1 mt-4 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
      <RadioGroupOption as="template" v-for="mailingList in mailingLists" :key="mailingList.id" :value="mailingList" v-slot="{ checked, active }">
        <div :class="[checked ? 'border-transparent' : 'border-gray-300', active ? 'ring-2 ring-indigo-500' : '', 'relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none']">
          <div class="flex flex-1">
            <div class="flex flex-col">
              <RadioGroupLabel as="span" class="block text-sm font-medium text-gray-900">
                {{ mailingList.title }}
              </RadioGroupLabel>
              <RadioGroupDescription as="span" class="flex items-center mt-1 text-sm text-gray-500">
                {{ mailingList.description }}
              </RadioGroupDescription>
              <RadioGroupDescription as="span" class="mt-6 text-sm font-medium text-gray-900">
                {{ mailingList.users }}
              </RadioGroupDescription>
            </div>
          </div>
          <CheckCircleIcon :class="[!checked ? 'invisible' : '', 'h-5 w-5 text-indigo-600']" aria-hidden="true" />
          <div :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']" aria-hidden="true" />
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>
  </div>
</template>

<script>
import { ref } from 'vue'
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { CheckCircleIcon } from '@heroicons/vue/solid'

const mailingLists = [
  { id: 1, title: 'Newsletter', description: 'Last message sent an hour ago', users: '621 users' },
  { id: 2, title: 'Existing Customers', description: 'Last message sent 2 weeks ago', users: '1200 users' },
]

export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    CheckCircleIcon,
  },
  setup() {
    const selectedMailingLists = ref(mailingLists[0])

    return {
      mailingLists,
      selectedMailingLists,
    }
  },
}
</script>