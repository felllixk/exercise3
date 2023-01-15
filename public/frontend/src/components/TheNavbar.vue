<template>
  <div class="flex bg-gray-700">
    <ul class="flex bg-gray-700 mt-5">
      <li class="-mb-px mr-1">
        <RouterLink
          class="ml-10 text-white font-semibold"
          :to="{ name: 'home' }"
        >
          Магазин
        </RouterLink>
      </li>
    </ul>
    <ul class="flex justify-end w-full mr-5 mt-5">
      <li class="mr-1 px-2 font-semibold text-white">
        <RouterLink :to="{ name: 'basket' }">
          Корзина
        </RouterLink>
      </li>
      <li
        v-if="!isAuthorized"
        class="mr-1 px-2 text-white font-semibold"
      >
        <RouterLink :to="{ name: 'login' }">
          Войти
        </RouterLink>
      </li>
      <li
        v-if="!isAuthorized"
        class="mr-1 px-2 text-white font-semibold"
      >
        <RouterLink :to="{ name: 'register' }">
          Регистрация
        </RouterLink>
      </li>
      <li class="mr-1 px-2 text-white font-semibold pointer-events-none">
        <span>{{ $store.getters["UserModule/getUser"]?.name }}</span>
      </li>
      <li
        v-if="isAuthorized"
        class="mr-1 px-2 text-white font-semibold"
      >
        <LogoutButton />
      </li>
    </ul>
  </div>
</template>
<script>
import LogoutButton from "./Auth/LogoutButton.vue";

export default {
  components: { LogoutButton },
  computed: {
    isAuthorized() {
      return this.$store.getters["Auth/isAuthorized"];
    },
  },
};
</script>
<style></style>
