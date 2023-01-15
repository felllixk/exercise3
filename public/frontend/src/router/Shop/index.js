export default [
  {
    path: "/",
    name: "home",
    component: () =>
      import(/* webpackChunkName: "home" */ "@/views/HomeView.vue"),
  },
  {
    path: "/basket",
    name: "basket",
    component: () =>
      import(/* webpackChunkName: "basket" */ "@/views/BasketView.vue"),
  },
  {
    path: "/orders",
    name: "orders",
    component: () =>
      import(/* webpackChunkName: "orders" */ "@/views/OrdersView.vue"),
  },
];
