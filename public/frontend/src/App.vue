<template>
  <router-view />
</template>

<script>
import AuthHeader from "./api/Auth/AuthHeader";
import { BasketApi } from "./api/Basket";

export default {
  async mounted() {
    await AuthHeader();
    if (this.$store.getters["Auth/isAuthorized"]) {
      const localBaskets = this.$store.getters["Basket/getBasket"];
      const filteredBaskets = [];
      localBaskets.forEach((item) => {
        if (item.id == null) {
          filteredBaskets.push({
            product_id: item.product.id,
            count: item.count,
          });
        }
      });
      if (filteredBaskets.length != 0) {
        await BasketApi.storeMany({ baskets: filteredBaskets });
        const baskets = await BasketApi.fetchBasket();
        this.$store.dispatch("Basket/setBasket", baskets.data);
      }
    }
  },
};
</script>
<style></style>
