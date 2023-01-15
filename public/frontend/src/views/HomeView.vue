<template>
  <div class="home">
    <ShopLayout>
      <TheShop />
    </ShopLayout>
  </div>
</template>

<script>
import TheShop from "@/components/Shop/TheShop.vue";
import ShopLayout from "@/layouts/ShopLayout.vue";

export default {
  name: "HomeView",
  components: { ShopLayout, TheShop },
};
</script>

<style></style>
