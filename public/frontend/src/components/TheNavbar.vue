<template>
  <div class="flex border-b">
    <ul class="flex">
      <li class="-mb-px mr-1">
        <a
          class="nav-element active"
          href="#"
        >Магазин</a>
      </li>
    </ul>
    <ul class="flex justify-end w-full">
      <li class="mr-1">
        <RouterLink
          v-if="!isAuthorized"
          class="nav-element"
          :to="{ name: 'login' }"
        >
          Войти
        </RouterLink>
      </li>
      <li class="mr-1">
        <RouterLink
          v-if="!isAuthorized"
          class="nav-element"
          :to="{ name: 'register' }"
        >
          Регистрация
        </RouterLink>
      </li>
      <li class="mr-1">
        <span class="nav-element name">{{
          $store.getters["UserModule/getUser"]?.name
        }}</span>
      </li>
      <li class="mr-1">
        <LogoutButton
          v-if="isAuthorized"
          class="nav-element"
        />
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
<style>
.nav-element {
  @apply bg-white inline-block rounded-t py-2 px-4 text-blue-700 font-semibold;
}
.nav-element.name {
  @apply bg-white inline-block rounded-t py-2 px-4 text-black font-semibold;
}
.active {
  @apply border-l border-t border-r;
}
</style>
