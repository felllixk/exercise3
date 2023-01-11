export const authRoutes = [
  {
    path: "/login",
    name: "login",
    meta: {
      isNotAuthorized: true,
    },
    component: () =>
      import(/* webpackChunkName: "login" */ "../../views/auth/SignInView.vue"),
  },
];
