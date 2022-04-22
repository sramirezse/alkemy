<template>
    <div class="wrapper-stepper m-5">
        <div class="stepper-row-items">
            <div class="stepper-item" v-for="item in steps.length" :key="item">
                <button
                    :class="
                        item == step ? 'stepper-active' : 'stepper-item-counter'
                    "
                    @click="step = item"
                    :disabled="step == item"
                >
                    {{ item }}
                </button>
            </div>
        </div>

        <div
            style="margin-bottom: 20px"
            class="progress-content-container pb-2"
        >
            <div class="pt-2 progress-content">
                <div class="progress"></div>
                <div class="color" :style="'width:' + stepperProgress"></div>
            </div>
        </div>
        <div>
            <slot :name="'step' + step"></slot>
        </div>
        <div class="controls">
            <!-- <button class="btn btn-secondary" @click="step--" :disabled="step == 1">
        Anterior
      </button>
      <button
        class="btn btn-primary"
        @click="step++"
        v-show="step != steps.length"
      >
        Siguiente
      </button>
      <button
        class="btn btn-success"
        @click="save()"
        v-if="step == steps.length"
      >
        Guardar
      </button> -->
            <div
                class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end"
            >
                <div class="btn-group me-2 sw-btn-group" role="group">
                    <button
                        class="btn btn-danger sw-btn-prev"
                        :class="step == 1 ? 'disabled' : ''"
                        type="button"
                        @click="step--"
                    >
                        Aterior
                    </button>
                    <button
                        class="btn btn-primary sw-btn-next"
                        type="button"
                        @click="save()"
                        v-if="step == steps.length"
                    >
                        Guardar
                    </button>
                    <button
                        @click="step++"
                        class="btn btn-success sw-btn-next"
                        type="button"
                        v-show="step != steps.length"
                    >
                        Siguiente
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            step: 1,
        };
    },
    props: {
        steps: Array,
        title: String,
        content: String,
    },
    emits: ["formWizardSave"],
    computed: {
        stepperProgress() {
            let total = this.steps.length;

            console.log(100 / total + "%");
            return (90 / total) * (this.step - 1) + "%";
        },
    },
    methods: {
        save() {
            this.$emit("formWizardSave");
        },
    },
};
</script>

<style>
.controls {
    display: flex;
    justify-content: space-between;
}
.stepper-row-items {
    display: flex;
    justify-content: space-around;
}

.stepper-item-counter {
    border-radius: 100%;
    width: 60px;
    height: 60px;
    background-color: #05c3fb;
    z-index: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    border: none;
}
.stepper-active {
    border-radius: 100%;
    width: 60px;
    height: 60px;
    background-color: #f34b64;

    z-index: 2;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
}
.stepper-item-title {
    font-weight: 600;
    font-size: 15px;
}

.progress {
    position: absolute;
    height: 10px;
    border-radius: 15px;
    z-index: 1;
}
.color {
    position: absolute;
    height: 10px;
    border: 5px solid #685bf9;
    border-radius: 15px;

    margin-bottom: 20px;
    z-index: 2;
    animation: progres 4s infinite linear;
}
</style>
