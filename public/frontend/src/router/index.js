import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import Auth from "./Auth";
import registerGuards from "./guards";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  ...Auth,
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

registerGuards(router);

export default router;
