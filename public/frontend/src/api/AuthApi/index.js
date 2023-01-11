import { ApiInstance } from "@/api";
import store from "@/store";
import routes from "./routes";
export const AuthApi = {
  /**
   * Authorize user, then set token
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
      if ("token" in response.data) {
        store.dispatch("Auth/setToken", response.data.token);
      }
      return response;
    });
  },

  /**
   * Logout user, and set token null
   * @returns {Promise}
   */
  async logout() {
    return ApiInstance.delete(routes.logout).then((response) => {
      store.dispatch("Auth/unsetToken");
      return response;
    });
  },
};
