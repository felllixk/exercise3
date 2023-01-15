import { createStore } from "vuex";
import AuthModule from "./modules/Auth";
import BasketModule from "./modules/BasketModule";
import UserModule from "./modules/UserModule";

export default createStore({
  modules: {
    Auth: AuthModule,
    UserModule: UserModule,
    Basket: BasketModule,
  },
});
