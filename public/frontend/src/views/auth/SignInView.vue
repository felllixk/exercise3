<template>
  <AuthLayout>
    <div v-show="!loading" class="relative py-3 sm:w-96 mx-auto text-center">
      <div class="text-2xl font-light">Авторизация</div>
      <AuthForm
        @submit="loading = true"
        @error="errorHandle"
        @success="redirectToHome"
      ></AuthForm>
      <ErrorAlert :open="hasErrors" :errors="errors" class="mt-5" />
    </div>
    <div v-if="loading" class="relative py-3 sm:w-96 mx-auto text-center">
      <LoadingSvg />
    </div>
  </AuthLayout>
</template>

<script>
import AuthLayout from "@/layouts/auth/AuthLayout.vue";
import AuthForm from "@/components/auth/AuthForm.vue";
import ErrorAlert from "@/components/error/ErrorAlert.vue";
import LoadingSvg from "@/components/svg/LoadingSvg.vue";
export default {
  name: "FormView",
  data() {
    return {
      loading: false,
      errors: {},
    };
  },
  methods: {
    redirectToHome() {
      this.$router.push({ name: "home" });
    },
    errorHandle(data) {
      this.loading = false;
      this.errors = data;
    },
  },
  computed: {
    hasErrors() {
      return Object.keys(this.errors).length != 0;
    },
  },
  components: { AuthLayout, AuthForm, ErrorAlert, LoadingSvg },
};
</script>
