<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Bar } from "vue-chartjs";
import Card from "../Components/Card.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Line } from "vue-chartjs";
import { ref } from "vue";
import BarChart from "../Components/BarChart.vue";
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <Card v-bind:titleCard="'Teste'" v-bind:color="'bg-green-900'" />
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <BarChart />
          <!-- <Bar id="my-chart-id" :options="chartOptions" :data="chartData" /> -->
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
