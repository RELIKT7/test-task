<template>
  <form-vue @submit="submit" />
  <table-vue v-model="data" :loading="loading" />
</template>

<script lang="ts" setup>
  import {ElNotification} from "element-plus"
  import FormVue from "./Form.vue";
  import TableVue from "./Table.vue";

  import {ref, reactive} from "vue"
  import appendFormData from "../tools/append-form-data"
  import axiosApartment from "../tools/axios-apartment"
  import Apartment from "../models/Apartment";

  const data = reactive<Array<Apartment>>([]);
  const loading = ref<boolean>(false);

  const submit = async (form) => {
    const params = {};
    ["name", "bedrooms", "bathrooms", "storeys", "garages"]
      .forEach(prop => appendFormData.append(params, form, prop));
    appendFormData.appendRange(params, form, "price", ["pricemin", "pricemax"]);

    loading.value = true;
    data.length = 0;
    data.push(...await axiosApartment.get(params));
    loading.value = false;

    if (!data.length)
      ElNotification({
        title: "Warning",
        message: "No data to display",
        position: "bottom-right",
        type: "warning",
      });
  }
</script>
