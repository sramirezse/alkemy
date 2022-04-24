<template>
  <div
    class="sidebar"
    data-color="purple"
    data-background-color="white"
    data-image="../assets/img/sidebar-1.jpg"
  >
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        Vacunas
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li
          class="nav-item"
          :class="actualRoute.path == route.path ? 'active' : ''"
          v-for="(route, index) in routes"
          :key="index"
        >
          <router-link :to="route.path" class="nav-link">
            <i class="material-icons">{{route.meta.icon}}</i>
            <p>{{ route.name }}</p>
            <!-- <p>{{actualRoute}}</p> -->
          </router-link>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import { useRoute, useRouter } from "vue-router";
import { computed } from "vue";
import { useStore } from "vuex";
export default {
  props: {},
  setup() {
    const store = useStore();
   
    const router = useRouter();
    const routes = router.options.routes.filter(
      (route) => route.meta
    );
    console.log(routes);
    return {
      store,
      // actualRoute,
      actualRoute: computed(() => {
        const route = useRoute();
        return route;
      }),
      routes,
    };
  },
};
</script>

<style scoped>
a {
  text-decoration: none;
}
.active a p{
  color: #fff;
}
.slide .active {
  border: 1px solid #ffffff;
  border-radius: 20px;
}
</style>
