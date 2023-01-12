<template>
  <button @click="logout">
    Выход
  </button>
</template>

<script>
import { AuthApi } from "@/api/Auth";

export default {
  methods: {
    logout() {
      AuthApi.logout().then(() => {
        this.$router.push({ name: "login" });
      });
    },
  },
};
</script>
