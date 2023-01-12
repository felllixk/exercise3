<template>
  <div class="relative py-3 sm:w-96 mx-auto text-center">
    <div class="text-2xl font-light">
      Авторизация
    </div>
    <form
      class="mt-4 bg-white shadow-md rounded-lg text-left"
      @submit.prevent="login"
    >
      <div class="h-2 bg-yellow-400 rounded-t-md" />
      <div class="px-8 py-6">
        <label class="block font-semibold">Почта</label>
        <input
          v-model="email"
          type="text"
          placeholder="Почта"
          class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
        >
        <label class="block mt-5 font-semibold">Пароль</label>
        <input
          v-model="password"
          type="text"
          placeholder="Пароль"
          class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
        >
        <div class="flex justify-between">
          <button
            type="submit"
            class="mt-4 bg-yellow-500 text-white py-2 px-6 rounded-md hover:bg-yellow-400"
          >
            Войти
          </button>
          <div class="mt-5">
            <a
              href="#"
              class="text-sm hover:underline block"
              @click="test()"
            >Забыли пароль?
            </a>
            <RouterLink
              class="hover:underline text-sm"
              :to="{ name: 'register' }"
            >
              Нет аккаунта?
            </RouterLink>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { AuthApi } from "@/api/Auth";

export default {
  name: "LoginForm",
  emits: ["error", "submit", "success"],
  data: () => {
    return {
      email: null,
      password: null,
    };
  },
  methods: {
    login() {
      this.$emit("submit");
      AuthApi.login(this.email, this.password)
        .then((response) => {
          this.$emit("success");
          return response;
        })
        .catch((error) => {
          if ("errors" in error.response.data) {
            this.$emit("error", error.response.data.errors);
          }
        });
    },
  },
};
</script>
