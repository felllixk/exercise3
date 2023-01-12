import store from "@/store";
import { ApiInstance } from "..";
import { UserApi } from "../User";

export default function () {
  if (!store.getters["Auth/isAuthorized"]) {
    return;
  }
  ApiInstance.defaults.headers.common["Authorization"] =
    "Bearer " + store.getters["Auth/token"];
  if (!UserApi.getUser()) {
    store.dispatch("Auth/unsetToken");
  }
}
