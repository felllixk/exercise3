import { createRouter, createWebHistory } from "vue-router";
import Auth from "./Auth";
import registerGuards from "./guards";
import Shop from "./Shop";

const routes = [...Shop, ...Auth];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

registerGuards(router);

export default router;
