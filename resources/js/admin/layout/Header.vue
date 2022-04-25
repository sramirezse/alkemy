<template>
  <!-- Navbar -->
  <nav
    class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top"
  >
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#">Dashboard</a>
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        aria-controls="navigation-index"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <button class="btn btn-danger">Salir</button>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
</template>
<script>
import { useStore } from "vuex";
import { useRouter } from "vue-router";

export default {
  setup() {
    const store = useStore();
    const router = useRouter();

    const auth = store.state.auth;
    const logout = async () => {
      await store.dispatch("auth/logout").then(() => {
        window.location.reload();
      });
    };
    return {
      auth,
      logout,
    };
  },
};
</script>
