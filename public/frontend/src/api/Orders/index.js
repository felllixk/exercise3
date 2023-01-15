import { ApiInstance } from "@/api";
import routes from "./routes";
export const OrdersApi = {
  async fetchGuest(email) {
    return ApiInstance.get(routes.restGuest + "/" + email)
      .then((response) => {
        return response.data;
      })
      .catch(() => {
        return [];
      });
  },
  async fetchAuthorized() {
    return ApiInstance.get(routes.restAuthorized).then((response) => {
      return response.data;
    });
  },
  async storeGuest(data) {
    return ApiInstance.post(routes.restGuest, data).then((response) => {
      return response.data;
    });
  },
  async storeAuthorized() {
    return ApiInstance.post(routes.restAuthorized).then((response) => {
      return response.data;
    });
  },
};
