<template>
  <TheNavbar />
  <ShopCatalog />
</template>
<script>
import ShopCatalog from "@/components/Shop/ShopCatalog.vue";
import TheNavbar from "@/components/TheNavbar.vue";

export default { components: { TheNavbar, ShopCatalog } };
</script>
