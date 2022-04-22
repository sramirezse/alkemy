<template>
  <div v-if="isLoggin === 'true' && route.name != 'not-found'" class="wrapper">
    <Sidebar></Sidebar>
    <div class="main-panel">
      <Header></Header>
      <div class="content">
        <router-view></router-view>
      </div>
      <Footer></Footer>
    </div>
  </div>
  <div v-else class="page-main">
    <router-view></router-view>
  </div>
</template>

<script>
import { computed } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";
import { onMounted, onUpdated, onUnmounted } from "vue";
import Sidebar from "./Sidebar.vue";
import Header from "./Header.vue";
import Footer from "./Footer.vue";
export default {
  components: {
    Sidebar,
    Header,
    Footer,
  },
  setup() {
    const route = useRoute();
    const store = useStore();
    const getUser = async () => {
        if (store.getters["auth/isLoggedIn"] ==="true")
            await store.dispatch("auth/fetchUser");
            console.log('store lo hice bitch');
    };
    onMounted(() => {
        getUser();
    });
    return {
        index: computed(() => route.meta.index),
        title: computed(() => route.name),
        isLoggin: computed(() => store.getters["auth/isLoggedIn"]),
        route: route
    };
  },
};
</script>

<style></style>
