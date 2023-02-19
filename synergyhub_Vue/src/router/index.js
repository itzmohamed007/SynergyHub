import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home.vue";
import Inscription from "../views/Inscription.vue";
import Authentification from "../views/Authentification.vue";
import Post from "../views/Post.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/inscription",
    name: "inscription",
    component: Inscription,
  },
  {
    path: "/post",
    name: "post",
    component: Post,
  },
  {
    path: "/authentification",
    name: "authentification",
    component: Authentification,
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
