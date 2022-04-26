<template>
  <div class="container">
    <Modal title="Añadir banners" button_modal_text="Añadir" close_button_text="Cerrar">
      <template v-slot:body>
        <h3 class="text-primary">
          Arrastra y suelta imagenes para añadir al Slider principal
        </h3>
        <DropZone
          :maxFiles="1"
          :uploadOnDrop="false"
          :multipleUpload="false"
          :parallelUpload="1"
          :acceptedFiles="['jpg', 'jpeg', 'png', 'gif']"
          @addedFile="onFileAdd"
          @removedFile="onFileRemove"
          ref="dropzone"
        />
      </template>
    </Modal>

    <div class="row">
      <div class="col-md-4" v-for="(image, index) in images" :key="index">
        <div class="card">
          <div class="card-header card-header-danger">
            <h4 class="card-title">Full header coloured</h4>
            <p class="category">Category subtitle</p>
          </div>
          <div class="card-body">
            <img class="img-fluid" :src="'/' + image.path" :alt="image.alt" />
          </div>
          <div class="card-footer">
            <div class="container">
              <div class="row">
                <button type="button" class="btn btn-info">Editar</button>
                <button type="button" class="btn btn-danger">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div></div>
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";
import { computed, onMounted, ref } from "vue";
export default {
  setup() {
    const store = useStore();

    const onFileAdd = async (file) => {
      await store
        .dispatch("sections/uploadImagesToBanner", {
          name: file.file.name,
          section_id: 1,
          image: file.file,
          prefix: "slider",
        })
        .then(() => {
          window.location.reload();
          return true;
        });
    };
    const onFileRemove = async (file) => {
      console.log(file);
    };
    const fetchImages = async () => {
      await store
        .dispatch("sections/fetchSection1", {
          params: {
            section: 1,
          },
        })
        .then(() => {});
    };
    onMounted(() => {
      fetchImages();
    });
    return {
      onFileAdd,
      onFileRemove,
      paramName: "image",
      images: computed(() => {
        return store.state.sections.section1.images;
      }),
    };
  },
};
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
