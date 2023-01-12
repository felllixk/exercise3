import store from "@/store";

export default [
  function (to) {
    if (to.meta.isAuthorized && !store.getters["Auth/isAuthorized"]) {
      return { name: "login" };
    }
  },
  function (to) {
    if (to.meta.isNotAuthorized && store.getters["Auth/isAuthorized"]) {
      return { name: "home" };
    }
  },
];
