import { ApiInstance } from "@/api";

export default function setBearerToken(token) {
    ApiInstance.defaults.headers.common["Authorization"] = "Bearer " + token;
}
