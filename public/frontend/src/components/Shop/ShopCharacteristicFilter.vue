<template>
  <div class="flex flex-col relative w-5/6">
    <div
      v-for="(item, index) in forFilter"
      :key="index"
      class="my-2 flex flex-col bg-yellow-600 p-2"
    >
      <button @click="unsetForFilter">
        {{ item.name }}
      </button>
      <input v-model="item.value">
    </div>
    <button
      v-show="!show && characteristics.length != 0"
      class="p-3 text-white font-semibold bg-green-800 hover:bg-green-600 rounded-md"
      @click="show = true"
    >
      Добавить характеристику
    </button>
    <ul
      v-show="show"
      class="absolute bg-yellow-600 w-full rounded h-24 overflow-y-scroll"
    >
      <li class="text-right">
        <button @click="show = false">
          X
        </button>
      </li>
      <li
        v-for="(item, index) in characteristics"
        :key="index"
      >
        <button @click="appendForFilter(item.name)">
          {{ item.name }}
        </button>
      </li>
    </ul>
  </div>
</template>
<script>
import { CharacteristicsApi } from "@/api/Characterstics";
import emitter from "@/emitter";

export default {
  data: () => {
    return {
      characteristics: [],
      forFilter: [],
      show: false,
    };
  },
  watch: {
    forFilter: {
      handler(value) {
        emitter.emit("setCharacteristics", value);
      },
      deep: true,
    },
  },
  async mounted() {
    this.characteristics = await this.fetchCharacteristics();
    console.log(this.characteristics);
  },
  methods: {
    async fetchCharacteristics() {
      return await CharacteristicsApi.fetchCharacteristics();
    },
    appendForFilter(name) {
      this.show = false;
      this.forFilter.push({
        name: name,
        value: null,
      });
      console.log(this.forFilter);
    },
    unsetForFilter(index) {
      this.forFilter.splice(index, 1);
    },
  },
};
</script>
