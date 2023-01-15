<template>
  <div>
    <div class="text-center mt-5">
      <span class="text-xl text-white">Навигация</span>
    </div>
    <div class="flex flex-col items-center justify-center mt-14">
      <ShopCatalog class="my-5" />
      <ShopAmountFilter class="mt-5" />
      <ShopCharacteristicFilter class="mt-5" />
    </div>
  </div>
</template>
<script>
import ShopAmountFilter from "./ShopAmountFilter.vue";
import ShopCatalog from "./ShopCatalog.vue";
import ShopCharacteristicFilter from "./ShopCharacteristicFilter.vue";

export default {
  components: { ShopCatalog, ShopAmountFilter, ShopCharacteristicFilter },
};
</script>
