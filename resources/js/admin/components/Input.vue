<template>
  <div class="form-group" v-if="type == 'text'">
    <label for="">{{ label }}</label>
    <input
      class="form-control"
      :value="modelValue"
      
    />
  </div>
  <div class="form-check" v-if="type == 'boolean'">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
      {{ label }}
      <span class="form-check-sign">
        <span class="check"></span>
      </span>
    </label>
  </div>
</template>

<script>
export default {
  props: {
    label: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    modelValue: {
      type: [String, Number, Boolean],
      default: "",
    },
  },
};
</script>

<style>
</style>