<template>
  <div class="home">
    <h1 class="mb-3 fw-bold">SynergyHub</h1>
    <div class="main-image-container container w-100">
      <img src="@/assets/images/Idea.png" alt="" class="main-image mt-5" />
      <div class="image-text">
        <p class="fw-bold fs-3">Looking For Inspiration ?</p>
        <p class="text-light">Find All Inspirational Ideas, Topics And Experiences Here...</p>
      </div>
    </div>
    <div class="container other-topics mt-5 gap-5">
      <div class="form-floating w-100 mb-4 d-flex flex-column align-items-center">
        <input class="form-control rounded-1 w-50 text-black" type="search" placeholder="target" v-model="target" v-bind="search"/>
        <p class="text-white bg-danger w-50 rounded-1 mt-3">{{ search_error }}</p>
        <button class="btn bg-dark text-white mt-2 text-center" @click="search()">Search</button>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <div v-for="idea in ideas" :key="idea.id" class="col mb-5">
          <div class="idea">
            <a :href="`post/${idea.id}`">
              <img :src="require(`@/assets/added_images/${idea.image}`)" class="img-fluid w-100"/>
            </a>
            <div class="mt-3 text-start">
              <p class="post-info fw-bold mb-0">{{ new Date(idea.created_at).toLocaleDateString() }}</p>
              <p class="post-description fw-bold mb-2 mt-0">{{ idea.title }}</p>
              <p class="post-content">{{ idea.description }}</p>
              <div class="catgories d-flex gap-2">
                <div v-for="categorie in idea.categories" :key="categorie.id">
                  <button class="categorie btn btn-outline-dark rounded-5 px-3 py-0">
                    {{ categorie.name }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "Home",
  data() {
    return {
      ideas: [],
      isLogged: localStorage.getItem("token"),
      target: '',
      search_error: ''
    };
  },
  methods: {
    async fetch() {
      let response = await axios.get("http://127.0.0.1:8000/api/ideas");
      return response.data;
    },
    async search() {
      console.log(this.target)
      if(this.target == '') {
        this.search_error = 'This Field Connot Be Empty'
      } else {
        let response = await axios.get('http://127.0.0.1:8000/api/ideas/search/' + this.target)
        console.log(response)
        if(response.data.length != 0) {
          this.ideas = response.data
          this.search_error = ''
        } else {
          this.search_error = 'No Posts Found'
        }
      }
    }
  },
  async mounted() {
    this.ideas = await this.fetch();
  },
};
</script>

<style scoped>
.categorie {
  cursor: default;
}
.catgories {
  flex-wrap: wrap;
}
.other-topics img {
  cursor: pointer;
}
.main-image-container {
  position: relative;
  width: 500px;
  height: 600px;
  overflow: hidden;
}
.main-image {
  width: 100%;
  height: 100%;
}
.image-text {
  text-align: center;
  position: absolute;
  color: white;
  z-index: 1;
  top: 65%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.other-topics img {
  width: 300px;
  max-width: 100%;
  height: 250px;
}
.post-info {
  font-size: 0.8rem;
}
.post-description {
  font-size: 1.3rem;
}
@media (max-width: 768px) {
  .main-image-container {
    width: 500px;
    height: 350px;
  }
}
</style>