import { ApiInstance } from "@/api";
import store from "@/store";
import { UserApi } from "../User";
import routes from "./routes";
export const AuthApi = {
  /**
   * Авторизует пользователя
   * @param {string} email - Email
   * @param {string} password - Password.
   * @returns {Promise}
   */
  async login(email, password) {
    const data = {
      email: email,
      password: password,
    };
    const json = JSON.stringify(data);
    return ApiInstance.post(routes.login, json).then((response) => {
      if ("access_token" in response.data) {
        store.dispatch("Auth/setToken", response.data.access_token);
        UserApi.getUser();
      } else {
        throw Error("shit");
      }
      return response;
    });
  },

  async register(email, name, password, password_confirm) {
    const data = {
      email: email,
      name: name,
      password: password,
      password_confirm: password_confirm,
    };
    const json = JSON.stringify(data);
    return ApiInstance.post(routes.register, json).then((response) => {
      console.log("register success!");
      return this.login(email, password);
    });
  },

  /**
   * Выполняет выход
   * @returns {Promise}
   */
  async logout() {
    return ApiInstance.delete(routes.logout).then((response) => {
      store.dispatch("UserModule/setUser", null);
      store.dispatch("Auth/unsetToken");
      return response;
    });
  },
};
