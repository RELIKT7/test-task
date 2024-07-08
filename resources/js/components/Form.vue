<template>
  <el-form
    :model="form" label-width="auto" class="radius"
    :style="{
      border: 'solid 1px gray',
      borderRadius: '20px',
      maxWidth: '600px',
      margin: 'auto',
      padding: '20px',
     }"
  >
    <el-form-item label="Name">
      <el-input v-model="form.name" :maxlength="15" show-word-limit clearable />
    </el-form-item>
    <el-form-item v-for="input in inputs" :key="input" :label="input">
      <el-input-number v-model="form[input.toLowerCase()]" :min="0" :max="10" />
    </el-form-item>
    <el-form-item label="Price">
      <el-slider v-model="form.price" range :max="1000000" />
      <el-input-number
        v-model="form.price[0]"
        :step="10000"
        :max="form.price[1]"
        size="small"
      />
      <el-input-number
        v-model="form.price[1]"
        :step="10000"
        :min="form.price[0]"
        size="small"
      />
    </el-form-item>
    <el-form-item>
      <el-button @click.prevent="submit">Get</el-button>
    </el-form-item>
  </el-form>
</template>

<script lang="ts" setup>
  import {reactive, defineEmits} from "vue"

  const emit = defineEmits(["submit"]);

  const inputs: string[] = ["Bedrooms", "Bathrooms", "Storeys", "Garages"];

  const form = reactive({
    name: "" as string,
    bedrooms: 0 as number,
    bathrooms: 0 as number,
    storeys: 0 as number,
    garages: 0 as number,
    price: [0, 0] as number[],
  })

  const submit =
    () => {
      emit("submit", form)
    }

  submit();
</script>
