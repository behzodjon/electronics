
<template>
  <header class="bg-neutral-900">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
      <div class="w-full py-6 flex items-center justify-between  lg:border-none">
        <div class="flex items-center">
          <a href="#">
            <span class="sr-only">Nav</span>
            <img class="h-5" src="https://d1eh9yux7w8iql.cloudfront.net/front/public/statics/pastrami/img/logo_animated_bm.gif" alt="" />
          </a>
          <div class="hidden ml-10 space-x-8 lg:block">
            <a v-for="link in navigation" :key="link.name" :href="link.href" class="text-base font-baseline text-white hover:text-indigo-50">
              {{ link.name }}
            </a>
          </div>
            <div class="hidden ml-10 space-x-8 lg:block">
          <router-link to="/Login" class="text-white text-md font-semibold"
            >Login</router-link>
          <router-link to="/Signup" class="text-white text-md font-semibold"
            >Sign Up</router-link>
          </div>
          
        </div>

      </div>

    </nav>
  </header>
</template>

<script>
const navigation = [
  { name: 'About Us', href: '#' },
  { name: 'Our Process', href: '#' },
  { name: 'Recycle', href: '#' },
  { name: 'Company', href: '#' },
  { name: 'Solutions', href: '#' },
]

export default {
  setup() {
    return {
      navigation,
    }
  },
}
</script>