<template>
  <div class="relative py-3 sm:w-96 mx-auto text-center">
    <div class="text-2xl font-light">
      Регистрация
    </div>
    <form
      class="mt-4 bg-white shadow-md rounded-lg text-left"
      @submit.prevent="register"
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
        <label class="block mt-5 font-semibold">Имя</label>
        <input
          v-model="name"
          type="text"
          placeholder="Имя"
          class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
        >
        <label class="block mt-5 font-semibold">Пароль</label>
        <input
          v-model="password"
          type="password"
          placeholder="Пароль"
          class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
        >
        <label class="block mt-5 font-semibold">Подтвердите пароль</label>
        <input
          v-model="password_confirm"
          type="password"
          placeholder="Пароль"
          class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
        >
        <div class="flex justify-between items-baseline">
          <button
            type="submit"
            class="mt-4 bg-yellow-500 text-white py-2 px-6 rounded-md hover:bg-yellow-400"
          >
            Регистрация
          </button>
          <router-link
            class="text-sm hover:underline"
            :to="{ name: 'login' }"
          >
            Уже есть аккаунт?
          </router-link>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { AuthApi } from "@/api/Auth";

export default {
  name: "RegisterForm",
  emits: ["error", "submit", "success"],
  data: () => {
    return {
      email: null,
      name: null,
      password: null,
      password_confirm: null,
    };
  },
  methods: {
    register() {
      this.$emit("submit");
      AuthApi.register(
        this.email,
        this.name,
        this.password,
        this.password_confirm
      )
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
