<template>
  <div class="min-h-screen bg-gray-700">
    <TheNavbar />
    <div class="flex justify-center">
      <slot />
    </div>
  </div>
</template>
<script>
import TheNavbar from "@/components/TheNavbar.vue";

export default { components: { TheNavbar } };
</script>
