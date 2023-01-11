import axios from "axios";

const AxiosApiConfig = {
  baseURL: process.env.VUE_APP_API_URL,
  headers: {
    "Content-Type": "application/json",
  },
};

export const ApiInstance = axios.create(AxiosApiConfig);
