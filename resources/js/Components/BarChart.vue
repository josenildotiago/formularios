<template>
  <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

<script>
import axios from "axios";
// import config from "../config";
// axios.create({
//   baseURL: config.baseUrl,
// });
import { Bar } from "vue-chartjs";
import {
  Chart as ChartJS,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

export default {
  name: "BarChart",
  components: { Bar },
  data() {
    return {
      chartData: {
        labels: [],
        datasets: [{ data: [] }],
      },
      chartOptions: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              suggestedMin: 0,
            },
          },
        },
        legend: {
          display: false,
        },
      },
      dataLabel: "Unidade",
    };
  },
  mounted() {
    axios
      .get("http://localhost:8000/api/dados", {
        headers: {
          "Content-Type": "application/json",
        },
      })
      .then((response) => {
        this.dataLabel = response.data;

        let data = response.data;
        let units = data.map((i) => i.unidade);
        let counts = data.map((i) => i.count);

        this.chartData = {
          labels: units,
          datasets: [{ data: counts }],
        };
      })
      .catch((error) => {
        console.log(error);
      });
  },
  methods: {
    renderChart(data, options) {
      this.renderChart(data, options);
    },
  },
};
</script>
