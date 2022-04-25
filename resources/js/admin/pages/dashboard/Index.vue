<template>
  <div>
    <DropZone 
        :maxFiles="Number(10000000000)"
        url="http://localhost:5000/item"
        :uploadOnDrop="true"
        :multipleUpload="false"
        :parallelUpload="1"/>
  </div>
</template>

<script>
import { defineComponent } from 'vue';
import DropZone from "dropzone-vue";
import "dropzone-vue/dist/dropzone-vue.common.css";

export default defineComponent({
  components: {
    DropZone,
  },
  name: 'App',
  setup() {
    return {
    };
  },
});
</script>

<style scoped>
.dropzone {
    margin-top: 20px;
    margin-bottom: 20px;
    width: 100%;
    height: 300px;
    border: 2px dashed #0087f7;
    border-radius: 5px;
    background: white;
    text-align: center;
    color: #0087f7;
    display: flex;
    align-content: center;
}
.dropzone p {
    color: #0087f7;
    margin-top: 60px;

}
.dropzone.is-active {
    border-color: #0087f7;
}
.btn-dropzone {
    visibility: hidden;
}
</style>
