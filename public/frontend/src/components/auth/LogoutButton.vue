<template>
    <button @click="logout">Выход</button>
</template>

<script>
import { ApiInstance } from "@/api";
import { AuthApi } from "@/api/AuthApi";
export default {
    methods: {
        logout() {
            console.log(ApiInstance.defaults.headers.common);
            AuthApi.logout().then(() => {
                this.$router.push({ name: "login" });
            });
        },
    },
};
</script>
