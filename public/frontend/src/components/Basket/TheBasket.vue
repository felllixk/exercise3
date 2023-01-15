<template>
  <div class="flex justify-center item-center mt-5 w-full">
    <div class="flex flex-col items-center">
      <span class="text-2xl font-bold text-white">Корзина</span>
      <div class="grid grid-cols-1 max-h-96 overflow-y-scroll">
        <BasketProduct
          v-for="(item, index) in basket"
          :key="index"
          :basket="item"
          @update-basket="fetchBasket"
        />
      </div>
      <div
        v-if="basket.length != 0"
        class="bg-gray-600 w-full flex flex-col items-center font-semibold text-white rounded-lg mt-5"
      >
        <span>Общая стоимость: {{ fullAmount }} Р</span>
        <button class="bg-gray-600 w-full hover:bg-gray-500 rounded">
          Оплатить
        </button>
      </div>
      <div
        v-else
        class="bg-gray-600 w-full flex flex-col items-center font-semibold text-white rounded-lg mt-5 p-5"
      >
        <span>Корзина пуста</span>
      </div>
    </div>
  </div>
</template>
<script>
import { BasketApi } from "@/api/Basket";
import BasketProduct from "./BasketProduct.vue";

export default {
  components: { BasketProduct },
  data: () => {
    return {
      basket: [],
    };
  },
  computed: {
    fullAmount() {
      let fullAmount = null;
      this.basket.forEach((item) => {
        fullAmount += item.product.amount * item.count;
      });
      return fullAmount;
    },
  },
  mounted() {
    this.fetchBasket();
  },
  methods: {
    async fetchBasket() {
      this.basket = this.$store.getters["Basket/getBasket"];
      console.log(this.basket);
    },
  },
};
</script>
