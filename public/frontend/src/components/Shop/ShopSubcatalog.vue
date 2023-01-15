<template>
  <li>{{ subcatalog.name }}</li>
</template>

<script>
export default {
  props: {
    subcatalog: {
      type: object,
      default() {
        return {
          id: null,
          name: "",
          categories: [],
        };
      },
    },
  },
  data: () => {
    return {
      isOpen: false,
    };
  },
};
</script>
