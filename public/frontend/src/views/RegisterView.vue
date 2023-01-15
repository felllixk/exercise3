<template>
  <AuthLayout>
    <RegisterForm
      class="2xl:mt-12"
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
import RegisterForm from "@/components/Auth/RegisterForm.vue";
import ErrorAlert from "@/components/Error/ErrorAlert.vue";
import AuthLayout from "../layouts/AuthLayout.vue";

export default {
  components: { AuthLayout, ErrorAlert, RegisterForm },
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
