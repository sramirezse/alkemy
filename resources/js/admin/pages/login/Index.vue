<template>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div
          class="login100-pic js-tilt box-shadow: 10px 10px #A552C4 !important;"
          data-tilt
        >
          <img src="../../../../images/admin/logo.png" alt="logo" />
        </div>
        <div class="login100-form validate-form">
          <span class="login100-form-title"> Inicia sesión</span>
          <div
            class="wrap-input100 validate-input"
            data-validate="Valid email is required: ex@abc.xyz"
          >
            <input
              class="input100"
              type="text"
              v-model="form.email"
              placeholder="Email"
            />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>
          <div
            class="wrap-input100 validate-input"
            data-validate="Password is required"
          >
            <input
              class="input100"
              type="password"
              v-model="form.password"
              placeholder="Contraseña"
            />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          <div class="container-login100-form-btn">
            <button @click="login" class="login100-form-btn">Login</button>
          </div>
          <!-- <div class="text-center pt-1">
            <a class="txt2" href="#"> ¿Usuario / Contraseña </a>
            <span class="txt1"> perdida? </span>
          </div>
          <div class="text-center pt-3">
            <a class="txt2" href="#">
              Crear una cuenta
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { useStore } from "vuex";

export default {
  setup() {
    const store = useStore();
    const form = {
      email: "",
      password: "",
      mobile: "",
      check: false,
    };
    const login = async () => {
      const res = await store.dispatch("auth/login", form);
      if (res.data.success == true) {
        window.location.href = "/admin/dashboard";
      }alert("Usuario o contraseña incorrectos");
    
    };
    return {
      form,
      login,
    };
  },
};
</script>

<style>
@import url("../../../../css/admin.css");
</style>