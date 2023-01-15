<template>
  <AuthLayout>
    <LoginForm
      class="2xl:mt-32"
      @error="alertError"
      @success="$router.push({ name: 'home' })"
    />
    <ErrorAlert
      :errors="errors"
      class="mt-5"
    />
  </AuthLayout>
</template>

<script>
import ErrorAlert from "@/components/Error/ErrorAlert.vue";
import LoginForm from "../components/Auth/LoginForm.vue";
import AuthLayout from "../layouts/AuthLayout.vue";

export default {
  components: { AuthLayout, LoginForm, ErrorAlert },
  data() {
    return {
      errors: {},
    };
  },
  methods: {
    alertError(errors) {
      this.errors = errors;
    },
  },
};
</script>
<style>
</style>
