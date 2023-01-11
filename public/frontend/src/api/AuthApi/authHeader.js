import store from "@/store";
import { ApiInstance } from "..";

export default function () {
  if (store.getters["Auth/isAuthorized"]) {
    ApiInstance.defaults.headers.common["Authorization"] =
      "Bearer " + store.getters["Auth/token"];
  }
}
