import { createRouter, createWebHistory } from "vue-router";
import Home from "../views/Home";
import Inscription from "../views/Inscription"
import Authentification from "../views/Authentification"
import Post from "../views/Post"
import Add from "../views/AddPost"
import Logout from "../views/Logout"
import Profile from '../views/Profile'

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
    path: "/post/:id",
    name: "post",
    component: Post,
  },
  {
    path: "/authentification",
    name: "authentification",
    component: Authentification,
  },
  {
    path: "/create",
    name: "create",
    component: Add,
  },
  {
    path: "/logout",
    name: "logout",
    component: Logout
  },
  {
    path: "/profile",
    name: "profile",
    component: Profile,
  }
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;