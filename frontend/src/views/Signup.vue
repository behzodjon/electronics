<template>
  <button
    @click="open = true"
    class="inline-block py-2 px-2 border border-transparent rounded-md font-medium text-white hover:bg-opacity-10"
  >
    Sign Up
  </button>
  <TransitionRoot as="template" :show="open">
    <Dialog
      as="div"
      class="fixed inset-0 overflow-hidden"
      @close="open = false"
    >
      <div class="absolute inset-0 overflow-hidden">
        <TransitionChild
          as="template"
          enter="ease-in-out duration-500"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in-out duration-500"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay
            class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
          />
        </TransitionChild>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
          <TransitionChild
            as="template"
            enter="transform transition ease-in-out duration-500 sm:duration-700"
            enter-from="translate-x-full"
            enter-to="translate-x-0"
            leave="transform transition ease-in-out duration-500 sm:duration-700"
            leave-from="translate-x-0"
            leave-to="translate-x-full"
          >
            <div class="w-screen max-w-md">
              <div
                class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll"
              >
                <div class="py-5 px-4 bg-green-800 sm:px-6">
                  <div class="flex items-center justify-between">
                    <DialogTitle
                      class="text-center text-2xl font-extrabold text-white"
                    >
                      Sign Up
                    </DialogTitle>

                    <div class="ml-3 h-7 flex items-center">
                      <button
                        type="button"
                        class="text-white hover:text-white focus:outline-none focus:ring-white"
                        @click="open = false"
                      >
                        <span class="sr-only">Close panel</span>
                        <XIcon class="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>
                </div>
                <div class="mt-6 relative flex-1 px-4 sm:px-6">
                  <!-- Replace with your content -->
                  <div
                    class="max-w-7xl mx-auto py-6 px-0 sm:py-8 lg:px-4 lg:pb-2"
                  >
                    <div class="sm:mx-auto sm:w-full sm:max-w-md">
                      <p class="text-center text-2xl font-extrabold text-black">
                        Log in to Alvah.
                      </p>
                      <p class="text-center text-md mt-2 text-black">
                        Welcome back! Please enter your details.
                      </p>
                    </div>

                    <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-md">
                      <div class="bg-white py-8 px-4 sm:px-0">
                        <form class="space-y-4" action="#" method="POST">
                          <div>
                            <label
                              for="email"
                              class="block text-sm font-medium text-gray-800"
                            >
                              Email address
                            </label>
                            <div class="mt-1">
                              <input
                                id="email"
                                name="email"
                                type="email"
                                autocomplete="email"
                                required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-none shadow-sm placeholder-gray-400 focus:outline-none focus:ring-black focus:border-black sm:text-sm"
                              />
                            </div>
                          </div>

                          <div>
                            <label
                              for="password"
                              class="block text-sm font-medium text-gray-700"
                            >
                              Password
                            </label>
                            <div class="mt-1">
                              <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required=""
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-none placeholder-gray-400 focus:outline-none focus:ring-black focus:border-black sm:text-sm"
                              />
                            </div>
                          </div>

                          <div class="flex items-center justify-between">
                            <div class="flex items-center">
                              <input
                                id="remember-me"
                                name="remember-me"
                                type="checkbox"
                                class="h-4 w-4 text-black border-gray-300"
                              />
                              <label
                                for="remember-me"
                                class="ml-2 block text-sm text-gray-900"
                              >
                                Remember me
                              </label>
                            </div>

                            <div class="text-sm">
                              <a href="#" class="font-medium text-green-800">
                                Forgot your password?
                              </a>
                            </div>
                          </div>

                          <div>
                            <button
                              type="submit"
                              class="w-full flex justify-center py-2 px-4 border border-transparent rounded-none text-sm font-medium text-white bg-black focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black"
                            >
                              Sign in
                            </button>
                          </div>
                        </form>

                        <div class="mt-6">
                          <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                              <div class="w-full border-t border-gray-300" />
                            </div>
                            <div class="relative flex justify-center text-sm">
                              <span class="px-2 bg-white text-gray-500">
                                OR
                              </span>
                            </div>
                          </div>

                          <div class="mt-6 grid grid-cols-1 gap-3">
                            <div>
                              <a
                                href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-none bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                              >
                                <span class="sr-only"
                                  >Sign in with Facebook</span
                                >
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="black"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z"
                                    clip-rule="evenodd"
                                  />
                                </svg>
                              </a>
                            </div>

                            <div>
                              <a
                                href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-none bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                              >
                                <span class="sr-only"
                                  >Sign in with Twitter</span
                                >
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="black"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84"
                                  />
                                </svg>
                              </a>
                            </div>

                            <div>
                              <a
                                href="#"
                                class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-none bg-white text-sm font-medium text-gray-500 hover:bg-gray-50"
                              >
                                <span class="sr-only">Sign in with GitHub</span>
                                <svg
                                  class="w-5 h-5"
                                  aria-hidden="true"
                                  fill="black"
                                  viewBox="0 0 20 20"
                                >
                                  <path
                                    fill-rule="evenodd"
                                    d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                    clip-rule="evenodd"
                                  />
                                </svg>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /End replace -->
                </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { ref } from "vue";
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from "@headlessui/vue";
import { XIcon } from "@heroicons/vue/outline";

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
  },
  setup() {
    const open = ref(false);

    return {
      open,
    };
  },
};
</script>
