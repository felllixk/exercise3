export default {
  namespaced: true,
  state: {
    basket: JSON.parse(localStorage.getItem("basket") || "[]"),
  },
  mutations: {
    FRESH_BASKET(state) {
      localStorage.setItem("basket", JSON.stringify(state.basket));
    },
    PUSH_PRODUCT(state, product) {
      let basketItem = state.basket.find(
        (item) => item?.product?.id == product.id
      );
      if (basketItem) {
        basketItem.count += 1;
      } else {
        basketItem = {
          id: null,
          product: product,
          count: 1,
        };
        state.basket.push(basketItem);
      }
    },
    SET_COUNT(state, { id, count }) {
      const basketItem = state.basket.find((item) => item.product.id == id);
      if (basketItem) {
        basketItem.count = count;
      }
    },
    DELETE_PRODUCT(state, product) {
      let basketIndex = state.basket.findIndex(
        (item) => item?.product?.id == product.id
      );
      if (basketIndex != undefined) {
        state.basket.splice(basketIndex, 1);
      }
    },
    SET_BASKET(state, allBasket) {
      state.basket = allBasket;
    },
  },
  getters: {
    getBasket(state) {
      return state.basket;
    },
  },
  actions: {
    pushProduct({ commit }, product) {
      commit("PUSH_PRODUCT", product);
      commit("FRESH_BASKET");
    },
    setCount({ commit }, { id, count }) {
      commit("SET_COUNT", { id, count });
      commit("FRESH_BASKET");
    },
    removeProduct({ commit }, product) {
      commit("DELETE_PRODUCT", product);
      commit("FRESH_BASKET");
    },
    setBasket({ commit }, basket) {
      commit("SET_BASKET", basket);
      commit("FRESH_BASKET");
    },
  },
};
