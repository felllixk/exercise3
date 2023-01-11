<template>
  <RouterView />
</template>

<script>
import authHeader from "./api/AuthApi/authHeader";

export default {
  name: "App",
  mounted() {
    authHeader();
  },
};
</script>
