
<template>

  <div class="min-h-full">
    <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
      <div class="mx-auto w-full max-w-sm lg:w-96">
        <div>
          <img class="h-12 w-auto" src="https://tailwin1dui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow" />
          <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
            Sign Up
          </h2>
          <p class="mt-2 text-sm text-gray-600">
            Or
            {{ ' ' }}
          <router-link to="/login" class="font-medium text-indigo-600 hover:text-indigo-500"
            >Sign in here</router-link>
          </p>
        </div>

        <div class="mt-8">
          <div>
            <div>
              <p class="text-sm font-medium text-gray-700">
                Sign in with
              </p>

              <div class="mt-1 grid grid-cols-1 gap-3">
                <div>
                  <a href="#" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Sign in with Facebook</span>
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>

              </div>
            </div>

            <div class="mt-6 relative">
              <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-300" />
              </div>
              <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">
                  Or continue with
                </span>
              </div>
            </div>
          </div>

          <div class="mt-6">
            <form action="#" method="POST" class="space-y-6">
                           <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                  First Name
                </label>
                <div class="mt-1">
                  <input id="first-name" name="first-name" type="first-name" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
              </div>
                           <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                  Last Name
                </label>
                <div class="mt-1">
                  <input id="last-name" name="last-name" type="last-name"  required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700">
                  Email address
                </label>
                <div class="mt-1">
                  <input id="email" name="email" type="email" autocomplete="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
              </div>

              <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">
                  Password
                </label>
                <div class="mt-1">
                  <input id="password" name="password" type="password" autocomplete="current-password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
              </div>

              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <input id="agree-terms" name="agree-terms" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" />
                  <label for="agree-terms" class="ml-2 block text-sm text-gray-900">
                    Agree to the terms
                  </label>
                </div>
              </div>

              <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Sign in
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden lg:block relative w-0 flex-1">
      <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1505904267569-f02eaeb45a4c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="" />
    </div>
  </div>
</template>
