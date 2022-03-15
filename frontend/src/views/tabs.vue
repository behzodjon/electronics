<template>
  <div>
    <div class="sm:block">
      <div class="border-b border-gray-200">
        <nav class="-mb-px flex" aria-label="Tabs">
          <a v-for="tab in tabs" :key="tab.name" :href="tab.href" :class="[tab.current ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300', 'w-1/4 py-4 px-1 text-center border-b-2 font-medium text-sm']" :aria-current="tab.current ? 'page' : undefined">
            {{ tab.name }}
          </a>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
const tabs = [
  { name: 'Popular', href: '#', current: false },
  { name: 'Company', href: '#', current: false },
  { name: 'Team', href: '#', current: true },
  { name: 'Billing', href: '#', current: false },
]

export default {
  setup() {
    return {
      tabs,
    }
  },
}
</script>