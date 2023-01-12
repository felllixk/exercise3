<template>
  <router-view />
</template>

<script>
import AuthHeader from "./api/Auth/AuthHeader";

export default {
  mounted() {
    AuthHeader();
  },
};
</script>
<style></style>
