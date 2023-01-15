<template>
  <div>
    <button
      class="mx-2"
      @click="previousPage()"
    >
      &laquo;
    </button>
    <span>{{ paginate.current_page }}</span>
    <button
      class="mx-2"
      @click="nextPage"
    >
      &raquo;
    </button>
  </div>
</template>
<script>
export default {
  props: {
    paginate: {
      type: Object,
      default() {},
    },
  },
  emits: ["setPage"],
  data: () => {
    return {};
  },
  mounted() {},
  methods: {
    nextPage() {
      let page = this.paginate.current_page + 1;
      if (page > this.paginate.last_page) {
        return;
      }
      this.setPage(page);
    },
    previousPage() {
      let page = this.paginate.current_page - 1;
      if (page < 1) {
        return;
      }
      this.setPage(page);
    },
    setPage(page) {
      this.$emit("setPage", page);
    },
  },
};
</script>
