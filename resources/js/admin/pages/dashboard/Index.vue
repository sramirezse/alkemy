<template>
  <div class="container">
    <Modal
      title="Añadir banners"
      button_modal_text="Añadir"
      close_button_text="Cerrar"
    >
      <template v-slot:body>
        <div v-if="form.edit == false">
          <div class="form-group">
            <label> Alt de la imagen</label>

            <input class="form-control" type="text" v-model="form.alt" />
          </div>
          <h3 class="text-primary">Arrastra y suelta tu imagen</h3>
          <div class="container">
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
          </div>
          <!-- <button type="submit"  class="btn btn-primary">Enviar</button> -->
        </div>
        <div v-if="form.edit == true">
          <div class="form-group">
            <label> Alt de la imagen</label>

            <input class="form-control" type="text" v-model="form.alt" />
          </div>
          <div class="container">
            <img class="img-fluid" :src="'/' + form.path" alt="form.alt" />
          </div>
        </div>
      </template>
      <template v-slot:buttons v-if="form.edit">
        <div>
          <button
            type="button"
            class="btn btn-primary"
            @click="updateBanner"
            :disabled="form.edit == false"
          >
            Guardar
          </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            {{ close_button_text }}
          </button>
        </div>
      </template>
    </Modal>

    <div class="row">
      <div class="col-md-4" v-for="(image, index) in images" :key="index">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ image.alt }}</h4>
            <!-- <p class="category">Category subtitle</p> -->
          </div>
          <div class="card-body">
            <img class="img-fluid" :src="'/' + image.path" :alt="image.alt" />
          </div>
          <div class="card-footer">
            <div class="container">
              <div class="row">
                <button
                  type="button"
                  @click="editAlt(image, index)"
                  data-toggle="modal"
                  class="btn btn-info"
                  data-target="#modal-default"
                >
                  Editar
                </button>
                <button
                  type="button"
                  @click="deleteBanner(index)"
                  class="btn btn-danger"
                  v-if="user.role == 'admin'"
                >
                  Eliminar
                </button>
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
import { ref, reactive, toRefs } from "vue";
import { useStore } from "vuex";
import { computed, onMounted } from "vue";
export default {
  props: {},
  setup() {
    const store = useStore();
    let form = reactive({
      alt: "",
      checkbox: false,
      edit: false,
      path: "",
      index: null,
    });
    const onFileAdd = async (file) => {
      await store
        .dispatch("sections/uploadImagesToBanner", {
          name: file.file.name,
          section_id: 1,
          image: file.file,
          prefix: "slider",
          alt: form.alt,
          checkbox: form.checkbox,
        })
        .then(() => {
          window.location.reload();
          return true;
        });
    };
    const updateBanner = async () => {
      await store.dispatch("sections/updateBanner", {
        path: form.path,
        section: 1,
        alt: form.alt,
        checkbox: form.checkbox,
        index: form.index,
      });
      fetchImages();
    };
    const editAlt = (image, index) => {
      form.edit = true;
      form.index = index;
      form.alt = image.alt;
      form.path = image.path;
    };
    const onFileRemove = async (file) => {
      console.log(file);
    };
    const deleteBanner = async (index) => {
      confirm("¿Estas seguro de eliminar este banner?");
      await store.dispatch("sections/deleteBanner", {
        index: index,
        section: 1,
      });
      fetchImages();
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
      updateBanner,
      deleteBanner,
      editAlt,
      onFileAdd,
      onFileRemove,
      images: computed(() => {
        return store.state.sections.section1.images;
      }),
      user : computed(() => {
        return store.state.auth.user;
      }),
      form,
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
