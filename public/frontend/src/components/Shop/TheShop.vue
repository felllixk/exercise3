<template>
  <div class="flex justify-center w-full">
    <div
      class="mt-10 border-2 border-black w-full xl:w-4/6 flex rounded-lg mb-10"
    >
      <div class="w-1/4 bg-dark-sky">
        <ShopNavigation class="mb-4" />
      </div>
      <div class="w-3/4 bg-moon-sky">
        <ShopProducts class="mt-10" />
      </div>
    </div>
  </div>
</template>
<script>
import ShopProducts from "./ShopProducts.vue";
import ShopNavigation from "./ShopNavigation.vue";

export default {
  components: { ShopProducts, ShopNavigation },
};
</script>

<style>
@media (min-width: 1800px) {
  .height4xl-screen {
    height: 100vh;
  }
}
</style>
