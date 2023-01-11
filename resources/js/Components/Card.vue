<template>
  <div class="flex flex-wrap">
    <div class="w-full sm:w-1/2 bg-slate-500 rounded-lg p-3 flex flex-col">
      <div class="text-white text-lg font-medium">{{ numberCard }}</div>
      <div class="text-white text-sm">Total de pessoas responderam</div>
      <div class="icon my-3">
        <i class="ion ion-bag text-white"></i>
      </div>
    </div>
    <div class="w-full sm:w-1/2 bg-gray-600 rounded-lg p-3 flex flex-col">
      <div class="text-white text-lg font-medium">{{ numberUnit }}</div>
      <div class="text-white text-sm">Total unidades responderam</div>
      <div class="icon my-3">
        <i class="ion ion-bag text-white"></i>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Card",
  data() {
    return {
      color: "bg-green-500",
      numberCard: 0,
      numberUnit: 0,
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/count", {
        headers: {
          "Content-Type": "application/json",
        },
      })
      .then((response) => {
        this.numberCard = response.data;
      })
      .catch((error) => {
        console.log(error);
      });

    axios
      .get("http://localhost:8000/api/countPerUnit", {
        headers: {
          "Content-Type": "application/json",
        },
      })
      .then((response2) => {
        this.numberUnit = response2.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
