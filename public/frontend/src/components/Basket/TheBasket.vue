<template>
  <div class="flex justify-center item-center mt-5 w-full">
    <div class="flex flex-col items-center mb-5">
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

        <div
          v-if="!$store.getters['Auth/isAuthorized']"
          class="flex flex-col mb-5"
        >
          <label>Почта</label>
          <input
            v-model="credential.email"
            class="bg-gray-500 text-white px-1"
            type="email"
          >
          <label>Имя</label>
          <input
            v-model="credential.name"
            class="bg-gray-500 text-white px-1"
            type="text"
          >
        </div>

        <button
          class="bg-gray-600 w-full hover:bg-gray-500 rounded"
          @click="order"
        >
          Заказать
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
import { OrdersApi } from "@/api/Orders";
import BasketProduct from "./BasketProduct.vue";

export default {
  components: { BasketProduct },
  data: () => {
    return {
      credential: {
        name: null,
        email: null,
      },
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
    },
    async order() {
      if (this.$store.getters["Auth/isAuthorized"]) {
        await OrdersApi.storeAuthorized();
        this.$store.dispatch("Basket/setBasket", []);
        this.fetchBasket();
        return;
      }

      if (!this.credential.email || !this.credential.name) {
        return;
      }
      const basket = this.$store.getters["Basket/getBasket"];
      let baskets = [];
      basket.forEach((item) => {
        baskets.push({
          product_id: item.product.id,
          count: item.count,
        });
      });

      await OrdersApi.storeGuest({
        email: this.credential.email,
        name: this.credential.name,
        baskets: baskets,
      });

      this.$store.dispatch("Basket/setBasket", []);
      this.fetchBasket();
    },
  },
};
</script>
