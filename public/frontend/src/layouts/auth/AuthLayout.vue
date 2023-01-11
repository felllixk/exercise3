<template>
  <div
    class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12"
  >
    <slot />
  </div>
</template>

<script>
export default {
  name: "AuthLayout",
};
</script>
