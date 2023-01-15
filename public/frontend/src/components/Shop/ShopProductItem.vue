<template>
  <div
    class="relative"
    @mouseover="basketButton = true"
    @mouseleave="basketButton = false"
  >
    <span>{{ product.name }}</span>
    <span>{{ product.amount }} ₽</span>
    <div
      v-for="(item, index) in product.characteristics"
      :key="index"
      class="bg-cyan-300 p-1 rounded w-full"
    >
      <span>{{ item.name }} : {{ item.value }}</span>
    </div>
    <button
      v-show="basketButton"
      class="basketButton"
      @click="addBasket(product)"
    >
      Добавить в корзину
    </button>
  </div>
</template>
<script>
import { BasketApi } from "@/api/Basket";

export default {
  props: {
    product: {
      type: Object,
      default() {
        return {
          id: null,
          name: "",
          amount: 0,
          characteristics: [],
        };
      },
    },
  },
  data: () => {
    return {
      basketButton: false,
    };
  },
  methods: {
    async addBasket(product) {
      if (this.$store.getters["Auth/isAuthorized"]) {
        const id = await BasketApi.addBasket({
          product_id: product.id,
        });
        this.$store.dispatch("Basket/pushProduct", product);
        this.$store.dispatch("Basket/setProductId", { product, id });
        return;
      }
      this.$store.dispatch("Basket/pushProduct", product);
    },
  },
};
</script>
<style>
.basketButton {
  @apply bg-green-700 text-white z-10 absolute w-full p-1 active:bg-green-600;
  top: 98%;
}
</style>
