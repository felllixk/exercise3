<template>
  <div
    v-if="open"
    class="relative mx-auto bg-red-500 p-3 rounded-lg text-white"
  >
    <div class="text-left">
      <span class="block" v-for="(error, name) in errors" :key="name">{{
        error[0]
      }}</span>
    </div>
  </div>
</template>

<style></style>

<script>
export default {
  props: {
    open: {
      type: Boolean,
    },
    errors: {
      type: Object,
    },
  },
};
</script>
