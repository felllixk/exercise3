<template>
  <div class="min-h-screen bg-gray-700">
    <TheNavbar />
    <div
      class="relative flex justify-center items-center flex-col antialiased overflow-hidden py-6 sm:py-12 h-full"
    >
      <slot />
    </div>
  </div>
</template>

<script>
import TheNavbar from "@/components/TheNavbar.vue";

export default {
  name: "AuthLayout",
  components: { TheNavbar },
};
</script>
