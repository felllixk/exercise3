<template>
  <!-- Абсолютно не читаемо xD -->
  <div class="w-5/6 relative font-semibold">
    <div class="text-white ml-2">
      <span v-if="!catalogSelect">Все</span>
      <span v-else>{{ catalogSelect.name }}</span>
      <span v-if="subcatalogSelect"> / {{ subcatalogSelect.name }}</span>
      <span v-if="categorySelect"> / {{ categorySelect.name }}</span>
    </div>
    <button
      class="p-2 bg-green-800 hover:bg-green-600 rounded text-white text-base font-semibold w-full"
      @click="toggleShow"
    >
      Категории
    </button>
    <ul
      v-show="show"
      class="absolute p-3 bg-gray-200 w-full text-blue-900 text-sm h-52 overflow-scroll"
    >
      <li>
        <button @click="unsetFilters">
          Все
        </button>
      </li>
      <li
        v-for="(catalog, index) in catalogs"
        :key="index"
      >
        <button
          @click="
            setCt1(catalog);
            toggleShowProperty(catalog);
          "
        >
          {{ catalog.name }}
        </button>
        <ul
          v-if="catalog.show"
          class="ml-3"
        >
          <li
            v-for="(subcatalog, subcatalogIndex) in catalog.subcatalogs"
            :key="subcatalogIndex"
          >
            <button
              @click="
                setCt1(catalog, subcatalog);
                toggleShowProperty(subcatalog);
              "
            >
              {{ subcatalog.name }}
            </button>
            <ul
              v-if="subcatalog.show"
              class="ml-3"
            >
              <li
                v-for="(category, categoryIndex) in subcatalog.categories"
                :key="categoryIndex"
              >
                <button
                  @click="
                    setCt1(catalog, subcatalog, category);
                    toggleShowProperty(category);
                  "
                >
                  {{ category.name }}
                </button>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</template>
<script>
import { CatalogApi } from "@/api/Catalog";
import emitter from "@/emitter";

export default {
  emits: ["setCatalog", "setSubcatalog", "setCategory", "unsetFilters"],
  data: () => {
    return {
      show: false,
      catalogs: [],
      catalogSelect: null,
      subcatalogSelect: null,
      categorySelect: null,
    };
  },
  mounted() {
    this.fetchCatalog();
  },
  methods: {
    async fetchCatalog() {
      const catalogs = await CatalogApi.fetchCatalog();
      this.catalogs = catalogs.data;
      console.log(catalogs);
    },
    toggleShow() {
      this.show = !this.show;
    },
    toggleShowProperty(object) {
      object.show = !object.show;
    },
    setCt1(catalog = null, subcatalog = null, category = null) {
      this.catalogSelect = catalog;
      this.subcatalogSelect = subcatalog;
      this.categorySelect = category;
      emitter.emit("setCt1", { catalog, subcatalog, category });
    },
    setCatalog(catalog) {
      this.catalogSelect = catalog;
      this.subcatalogSelect = null;
      this.categorySelect = null;

      emitter.emit("setCatalog", catalog.id);
    },
    setSubcatalog(catalog) {
      this.catalogSelect = catalog;
      this.subcatalogSelect = catalog.subcatalog;
      this.categorySelect = null;
      emitter.emit("setSubcatalog", subcatalog.id);
    },
    setCategory(catalog) {
      this.catalogSelect = catalog;
      this.subcatalogSelect = catalog.subcatalog;
      this.categorySelect = catalog.subcatalog.category;
      emitter.emit("setCategory", category.id);
      console.log(category);
    },
    collapseFilters() {
      if (this.subcatalogSelect) {
        this.subcatalogSelect.show = false;
      }
      if (this.categorySelect) {
        this.catalogSelect.show = false;
      }
    },
    unsetFilters() {
      this.collapseFilters();
      this.categorySelect = null;
      this.subcatalogSelect = null;
      this.catalogSelect = null;
      emitter.emit("unsetFilters");
    },
  },
};
</script>
