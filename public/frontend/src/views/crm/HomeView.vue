<template>
  <CrmLayout>
    <div class="bg-gray-300">
      <span>Home</span>
      <br />
      <LogoutButton />
    </div>
  </CrmLayout>
</template>
<script>
import LogoutButton from "@/components/auth/LogoutButton.vue";
import CrmLayout from "@/layouts/crm/CrmLayout.vue";

export default {
  components: { CrmLayout, LogoutButton },
};
</script>
