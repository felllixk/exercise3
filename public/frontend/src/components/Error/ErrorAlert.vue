<template>
  <div
    v-if="open"
    class="relative mx-auto bg-red-500 p-3 rounded-lg text-white"
  >
    <div class="text-left">
      <span
        v-for="(error, name) in errors"
        :key="name"
        class="block"
      >{{
        error[0]
      }}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    errors: {
      type: Object,
      default() {
        return {};
      },
    },
  },
  computed: {
    open() {
      return Object.keys(this.errors).length > 0;
    },
  },
};
</script>

<style></style>
