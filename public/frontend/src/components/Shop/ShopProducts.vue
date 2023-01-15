<template>
  <div>
    <ShopSearch
      class="2xl:mx-5"
      @submit="setSearch"
    />
    <div class="gridProducts text-center 2xl:m-5 mt-5">
      <ShopProductItem
        v-for="(product, index) in products"
        :key="index"
        class="bg-gray-300 flex flex-col items-center border-2 border-gray-700 rounded"
        :product="product"
      />
    </div>
    <div class="flex justify-center">
      <ThePaginator
        :paginate="meta"
        @set-page="setPage"
      />
    </div>
  </div>
</template>
<script>
import { ProductApi } from "@/api/Product/index";
import emitter from "@/emitter";
import ThePaginator from "../ThePaginator.vue";
import ShopProductItem from "./ShopProductItem.vue";
import ShopSearch from "./ShopSearch.vue";
export default {
  components: { ShopProductItem, ShopSearch, ThePaginator },
  data() {
    return {
      products: [],
      meta: {},
      filters: {
        page: 1,
        perPage: 10,
        slug: "",
        amount: {
          min: 0,
          max: 100000,
        },
      },
    };
  },
  mounted() {
    emitter.on("setCatalog", (id) => {
      this.setCatalog(id);
    });
    emitter.on("setSubcatalog", (id) => {
      this.setSubcatalog(id);
    });
    emitter.on("setCategory", (id) => {
      this.setCategory(id);
    });
    emitter.on("unsetFilters", () => {
      this.unsetFilters();
    });
    emitter.on("setMinAmount", (value) => {
      this.filters.amount.min = value;
      this.fetch();
    });
    emitter.on("setCt1", ({ catalog, subcatalog, category }) => {
      this.filters.catalog_id = catalog?.id;
      this.filters.subcatalog_id = subcatalog?.id;
      this.filters.category_id = category?.id;
      this.fetch();
    });
    emitter.on("setMaxAmount", (value) => {
      this.filters.amount.max = value;
      this.fetch();
    });
    emitter.on("setCharacteristics", (value) => {
      this.filters.characteristics = value;
      this.fetch();
    });
    this.fetch();
  },
  methods: {
    async fetch(pageIgnore = false) {
      if (!pageIgnore) {
        this.filters.page = 1;
      }
      const products = await ProductApi.fetchProducts(this.filters);
      this.meta = products.meta;
      this.products = products.data;
    },
    setSearch(name) {
      this.filters.slug = name;
      this.fetch();
    },
    setCatalog(id) {
      this.filters.catalog_id = id;
      this.filters.category_id = null;
      this.filters.subcatalog_id = null;
      this.fetch();
    },
    setCategory(id) {
      this.filters.category_id = id;
      this.fetch();
    },
    setSubcatalog(id) {
      this.filters.subcatalog_id = id;
      this.filters.category_id = null;
      this.fetch();
    },
    setPage(page) {
      this.filters.page = page;
      this.fetch(true);
    },
    unsetFilters() {
      this.filters.subcatalog_id = null;
      this.filters.category_id = null;
      this.filters.catalog_id = null;
      this.fetch();
    },
  },
};
</script>

<style>
.gridProducts {
  @apply grid xl:grid-cols-4 xl:gap-4 lg:grid-cols-3 lg:gap-3 md:grid-cols-2 md:gap-2;
}
</style>
