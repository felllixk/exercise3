<template>
  <div
    class="flex flex-col bg-gray-600 w-56 items-center m-5 rounded-lg text-white font-sans font-semibold shadow-2xl relative"
    :class="{ 'rounded-b-none': showRemoveButton }"
    @mouseover="showRemoveButton = true"
    @mouseleave="showRemoveButton = false"
  >
    <span>{{ basket.product.name }}</span>
    <span>Цена: {{ basket.product.amount }} Р</span>
    <span>{{ basket.product.description }}</span>
    <span>Количество: {{ basket.count
    }}<button
      class="mx-2 hover:font-bold p-1"
      @click="setCountBasket(basket, basket.count + 1)"
    >
      +</button><button
      class="mx-2 hover:font-bold p-1"
      @click="setCountBasket(basket, basket.count - 1)"
    >
      -
    </button>
    </span>
    <button
      v-show="showRemoveButton"
      class="w-full bg-red-800 hover:bg-red-700 active:bg-red-600 absolute top-full rounded-b shadow-lg"
      @click="removeBasket(basket)"
    >
      Убрать из корзины
    </button>
  </div>
</template>
<script>
import { BasketApi } from "@/api/Basket";

export default {
  props: {
    basket: {
      type: Object,
      default() {
        return {
          id: null,
          product: {
            name: null,
            amount: null,
            description: null,
          },
          count: null,
        };
      },
    },
  },
  emits: ["updateBasket"],
  data: () => {
    return {
      showRemoveButton: false,
    };
  },
  methods: {
    async removeBasket(basket) {
      if (this.$store.getters["Auth/isAuthorized"]) {
        await BasketApi.removeBasket(basket.id);
      }
      this.$store.dispatch("Basket/removeProduct", basket.product);
    },
    async setCountBasket(basket, count) {
      if (count < 1) {
        return;
      }
      if (this.$store.getters["Auth/isAuthorized"]) {
        await BasketApi.setCountBasket(basket.id, count);
      }
      this.$store.dispatch("Basket/setCount", { id: basket.product.id, count });
      this.$emit("updateBasket");
    },
  },
};
</script>
