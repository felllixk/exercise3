<template>
  <ShopLayout>
    <TheOrders />
  </ShopLayout>
</template>
<script>
import TheOrders from "@/components/Order/TheOrders.vue";
import ShopLayout from "@/layouts/ShopLayout.vue";
export default { components: { ShopLayout, TheOrders } };
</script>
