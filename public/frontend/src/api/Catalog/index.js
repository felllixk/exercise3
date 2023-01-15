import { ApiInstance } from "@/api";
import routes from "./routes";
export const CatalogApi = {
  async fetchCatalog(data) {
    return ApiInstance.get(routes.index, { params: data }).then((response) => {
      return response.data;
    });
  },
};
