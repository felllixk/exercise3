import { createRouter, createWebHistory } from "vue-router";
import { authRoutes } from "./auth";
import { userRoutes } from "./user";
import registerGuards from "./guards";

let routes = [...authRoutes, ...userRoutes];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

registerGuards(router);

export default router;
