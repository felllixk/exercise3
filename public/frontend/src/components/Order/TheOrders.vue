<template>
  <div class="flex justify-center item-center mt-5 w-full">
    <div class="flex flex-col items-center">
      <span class="text-2xl font-bold text-white">Заказы</span>
      <div
        v-if="!$store.getters['Auth/isAuthorized']"
        class="my-5 flex-col flex items-center"
      >
        <label class="mr-2 text-white">Поиск по почте</label>

        <input
          v-model="email"
          class="bg-gray-600 text-white px-1"
          type="email"
        >
        <button
          class="bg-green-700 rounded p-1 m-3 text-white hover:bg-green-600 active:bg-green-500"
          @click="fetchGuest"
        >
          Поиск
        </button>
      </div>
      <div
        class="grid grid-cols-1 max-h-96 overflow-y-scroll box rounded border"
      >
        <div
          v-for="(order, index) in orders"
          :key="index"
        >
          <div class="text-white mb-5">
            <div class="flex flex-col items-center bg-gray-500">
              <span>Общая стоимость: {{ order.amount }} Р</span>
              <span>Продукты: </span>
            </div>
            <div
              v-for="(basket, basketIndex) in order.baskets"
              :key="basketIndex"
              class="flex flex-col items-center bg-gray-800"
            >
              <span>Имя продукта: {{ basket.product.name }}</span>
              <span>Цена: {{ basket.product.amount }}</span>
              <span>Количество: {{ basket.count }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { OrdersApi } from "@/api/Orders";
export default {
  data: () => {
    return {
      email: null,
      orders: [],
    };
  },
  async mounted() {
    if (this.$store.getters["Auth/isAuthorized"]) {
      this.orders = await OrdersApi.fetchAuthorized();
    }
  },
  methods: {
    async fetchGuest() {
      if (!this.email) {
        return;
      }
      this.orders = await OrdersApi.fetchGuest(this.email);
    },
  },
};
</script>
<style>
.box {
  width: 700px;
}
</style>
