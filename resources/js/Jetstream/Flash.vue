<template>
  <div>
    <div :class="style" v-if="flashError && showingBanner">
      <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
            <span class="flex p-2 rounded-lg" :class="style">
              <!-- Heroicon name: outline/speakerphone -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                />
              </svg>
            </span>
            <ul class="list-disc list-inside">
              <li
                v-for="(error, i) in this.$page.props.errors"
                :key="i"
                class="ml-3 my-1 font-medium text-white truncate"
              >
                {{ error }}
              </li>
            </ul>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button
              type="button"
              @click="showingBanner = false"
              class="
                -mr-1
                flex
                p-2
                rounded-md
                focus:outline-none focus:ring-2 focus:ring-white
                sm:-mr-2
              "
              :class="'hover:' + style"
            >
              <span class="sr-only">Dismiss</span>
              <!-- Heroicon name: outline/x -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div :class="styleFlash" v-if="flash && showingBanner">
      <div class="max-w-7xl mx-auto py-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
          <div class="w-0 flex-1 flex items-center">
            <span class="flex p-2 rounded-lg" :class="styleFlash">
              <!-- Heroicon name: outline/speakerphone -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"
                />
              </svg>
            </span>
            <p class="ml-3 font-medium text-white truncate">
              <span>{{ flash }}</span>
            </p>
          </div>
          <div class="order-2 flex-shrink-0 sm:order-3 sm:ml-3">
            <button
              type="button"
              @click="showingBanner = false"
              class="
                -mr-1
                flex
                p-2
                rounded-md
                focus:outline-none focus:ring-2 focus:ring-white
                sm:-mr-2
              "
              :class="'hover:' + styleFlash"
            >
              <span class="sr-only">Dismiss</span>
              <!-- Heroicon name: outline/x -->
              <svg
                class="h-6 w-6 text-white"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";

export default defineComponent({
  data() {
    return {
      showingBanner: true,
      success: false,
      error: false,
    };
  },
  computed: {
    flash() {
      this.showingBanner = true;
      this.success = this.$page.props.flash?.success || false;
      this.error = this.$page.props.flash?.error || false;
      return this.success || this.error;
    },
    flashError() {
      this.showingBanner = true;
      return Object.keys(this.$page.props.errors).length > 0;
    },
    style() {
      if (this.flashError) return "bg-red-500";
      else return "bg-indigo-600";
    },
    styleFlash() {
      if (this.success) return "bg-indigo-600";
      else if (this.error) return "bg-red-600";
      else return "bg-green-600";
    },
  },
});
</script>
