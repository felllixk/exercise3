<template>
  <div class="relative py-3 sm:w-96 mx-auto text-center">
    <div class="text-2xl text-white font-semibold">
      Регистрация
    </div>
    <form
      class="mt-4 bg-gray-600 shadow-md rounded-lg text-left text-white"
      @submit.prevent="register"
    >
      <div class="h-2 bg-green-800 rounded-t-md" />
      <div class="px-8 py-6">
        <label class="block font-semibold">Почта</label>
        <input
          v-model="email"
          type="text"
          placeholder="Почта"
          class="bg-gray-500 ring-gray-400 focus:ring-2 w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none rounded-md"
        >
        <label class="block mt-5 font-semibold">Имя</label>
        <input
          v-model="name"
          type="text"
          placeholder="Имя"
          class="bg-gray-500 ring-gray-400 focus:ring-2 w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none rounded-md"
        >
        <label class="block mt-5 font-semibold">Пароль</label>
        <input
          v-model="password"
          type="password"
          placeholder="Пароль"
          class="bg-gray-500 ring-gray-400 focus:ring-2 w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none rounded-md"
        >
        <label class="block mt-5 font-semibold">Подтвердите пароль</label>
        <input
          v-model="password_confirm"
          type="password"
          placeholder="Пароль"
          class="bg-gray-500 ring-gray-400 focus:ring-2 w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none rounded-md"
        >
        <div class="flex justify-between items-baseline">
          <button
            type="submit"
            class="mt-4 bg-green-700 text-white py-2 px-6 rounded-md hover:bg-green-600"
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
