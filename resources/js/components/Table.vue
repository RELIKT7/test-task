<template>
  <el-table :data="model" v-loading="loading" style="width: 100%; margin-top: 5em;" border stripe>
    <el-table-column v-for="column in columns" :key="column" :prop="column" :label="column" />
  </el-table>
</template>


<script lang="ts" setup>
  const model = defineModel()

  const props = defineProps({
    loading: Boolean,
  });

  const columns: string[] = ["Name", "Price", "Bedrooms", "Bathrooms", "Storeys", "Garages"];
</script>
