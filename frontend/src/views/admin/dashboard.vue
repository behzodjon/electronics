<template>
    <div>
        <h1 class="text-2xl font-medium leading-6 text-gray-900">Dashboard</h1>
        <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
            
    <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-3">
      <div v-for="item in stats" :key="item.name" class="px-4 py-5 overflow-hidden bg-white rounded-lg shadow sm:p-6">
        <dt class="text-sm font-medium text-gray-500 truncate">
          {{ item.name }}
        </dt>
        <dd class="mt-1 text-3xl font-semibold text-gray-900">
          {{ item.stat }}
        </dd>
      </div>
    </dl>
        </div>
    </div>
</template>

<script setup>

const stats = [
  { name: 'Total Subscribers', stat: '71,897' },
  { name: 'Avg. Open Rate', stat: '58.16%' },
  { name: 'Avg. Click Rate', stat: '24.57%' },
]

</script>