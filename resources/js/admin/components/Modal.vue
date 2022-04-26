<template>
  <!-- Button trigger modal -->
  <button
    type="button"
    class="btn btn-primary"
    data-toggle="modal"
    :data-target="'#' + id"
  >
    {{ button_modal_text }}
  </button>

  <!-- Modal -->
  <div
    class="modal fade"
    :id="id"
    tabindex="-1"
    role="dialog"
    :aria-labelledby="id + 'Label'"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" :id="id + 'Title'">{{ title }}</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
            @click="closeAction"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <slot name="body"></slot>
        </div>
        <div class="modal-footer">
          <slot name="buttons"></slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, onMounted, ref, reactive } from "vue";

export default {
  props: {
    id: {
      type: String,
      default: "modal-default",
    },
    title: {
      type: String,
      default: "",
    },
    button_modal_text: {
      type: String,
      default: "",
    },
    close_button_text: {
      type: String,
      default: "",
    },
    save_button_text: {
      type: String,
      default: "",
    },
    closeAction: {
      type: Function,
    },
  },
  setup(props) {
  },
};
</script>

<style>
</style>