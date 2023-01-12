export default [
  {
    path: "/login",
    name: "login",
    meta: { isNotAuthorized: true },
    component: () =>
      import(/* webpackChunkName: "login" */ "@/views/LoginView.vue"),
  },
  {
    path: "/register",
    name: "register",
    meta: { isNotAuthorized: true },
    component: () =>
      import(/* webpackChunkName: "register" */ "@/views/RegisterView.vue"),
  },
];
