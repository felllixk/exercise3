<template>
  <ShopLayout>
    <TheBasket />
  </ShopLayout>
</template>

<script>
import TheBasket from "@/components/Basket/TheBasket.vue";
import ShopLayout from "@/layouts/ShopLayout.vue";

export default { components: { ShopLayout, TheBasket } };
</script>

<style>
.basket {
  width: 1000px;
}
</style>
