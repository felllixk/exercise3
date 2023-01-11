<template>
  <form
    @submit.prevent="login"
    class="mt-4 bg-white shadow-md rounded-lg text-left"
  >
    <div class="h-2 bg-yellow-400 rounded-t-md"></div>
    <div class="px-8 py-6">
      <label class="block font-semibold">Почта</label>
      <input
        v-model="email"
        type="text"
        placeholder="Почта"
        class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
      />
      <label class="block mt-5 font-semibold">Пароль</label>
      <input
        v-model="password"
        type="text"
        placeholder="Пароль"
        class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-yellow-500 focus:ring-1 rounded-md"
      />
      <div class="flex justify-between items-baseline">
        <button
          type="submit"
          class="mt-4 bg-yellow-500 text-white py-2 px-6 rounded-md hover:bg-yellow-400"
        >
          Войти
        </button>
        <a @click="test()" href="#" class="text-sm hover:underline"
          >Забыли пароль?
        </a>
      </div>
    </div>
  </form>
</template>
<script>
import { AuthApi } from "@/api/AuthApi";
export default {
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
  emits: ["error", "submit", "success"],
};
</script>
