import { ApiInstance } from "@/api";
import routes from "./routes";
export const BasketApi = {
  async fetchBasket(data) {
    return ApiInstance.get(routes.rest, { params: data }).then((response) => {
      return response.data;
    });
  },
  async addBasket(data) {
    return ApiInstance.post(routes.rest, data).then((response) => {
      return response.data;
    });
  },
  async removeBasket(id) {
    return ApiInstance.delete(routes.rest + "/" + id).then((response) => {
      return response.data;
    });
  },
  async setCountBasket(id, count) {
    return ApiInstance.put(routes.rest + "/" + id, {
      count: count,
    }).then((response) => {
      return response.data;
    });
  },
  async storeMany(data) {
    return ApiInstance.post(routes.storeMany, data).then((response) => {
      return response.data;
    });
  },
};
