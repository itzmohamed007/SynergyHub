<template>
  <div
    class="inscription d-flex flex-column justify-content-center align-items-center"
  >
    <h1 class="title">Authentification</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form
        class="d-flex flex-column align-items-center p-4"
        autocomplete="off"
        @submit.prevent="register()"
      >
        <div class="form-floating w-100 mb-4">
          <input
            class="form-control rounded-1"
            type="email"
            placeholder="email"
            v-model="email"
          />
          <label for="">email</label>
        </div>
        <div class="form-floating w-100 mb-4">
          <input
            class="form-control rounded-1"
            type="password"
            placeholder="password"
            v-model="password"
          />
          <label for="">password</label>
        </div>
        <div class="form-floating w-100 mt-4">
          <input
            class="submit form-control rounded-1 text-white p-0"
            type="submit"
          />
          <p class="text-start mt-2">
            <strong><a href="/">Back to home page</a></strong>
          </p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import router from "@/router";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    async register() {
      console.log("register method called");
      let response = await axios.post("http://127.0.0.1:8000/api/login", {
        email: this.email,
        password: this.password
      });
      localStorage.setItem('token', response.data.token);
      router.push("/");
    },
  }
};
</script>


<style scoped>
.hero {
  padding: 2rem 5rem;
  background-color: lavender;
  width: 50%;
}
.submit {
  background-color: rgb(211, 198, 255);
  border: none;
  transition: 0.5s ease-in-out;
}
.submit:hover {
  background-color: rgb(159, 130, 255);
}
a {
  text-decoration: none;
  color: inherit;
}
a:hover {
  color: inherit;
}
@media (max-width: 768px) {
  .title {
    margin-top: 4rem;
  }
  .hero {
    padding: 6rem 2rem;
    width: 90%;
  }
}
</style>