import { ApiInstance } from "@/api";
import routes from "./routes";
export const CharacteristicsApi = {
  async fetchCharacteristics(data) {
    return ApiInstance.get(routes.index, { params: data }).then((response) => {
      return response.data.data;
    });
  },
};
