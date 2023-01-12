import { ApiInstance } from "@/api";
import store from "@/store";
import routes from "./routes";
export const UserApi = {
  async getUser() {
    return ApiInstance.get(routes.user)
      .then((response) => {
        store.dispatch("UserModule/setUser", response.data);
        console.log(response);
        return response;
      })
      .catch(() => {
        return null;
      });
  },
};
