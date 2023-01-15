<template>
  <div class="bg-green-800 hover:bg-green-600 rounded-md m-5 p-2">
    <h2 class="text-center font-semibold">
      Цена
    </h2>
    <div class="flex flex-col font-semibold w-5/6">
      <label>От</label>
      <input
        v-model="min"
        class="mx-auto"
        type="number"
      >
      <label>До</label>
      <input
        v-model="max"
        class="mx-auto"
        type="number"
      >
    </div>
  </div>
</template>
<script>
import emitter from "@/emitter";

export default {
  data: () => {
    return {
      min: 0,
      max: 10000,
    };
  },
  watch: {
    min(value) {
      emitter.emit("setMinAmount", value);
    },
    max(value) {
      emitter.emit("setMaxAmount", value);
    },
  },
};
</script>
