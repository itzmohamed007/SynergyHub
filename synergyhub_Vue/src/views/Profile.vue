<template>
  <h1 class="fs-2">Welcome <span class="fw-bold">MOHAMED BOURRA</span></h1>
  <h3 class="fs-6">Here are all the ideas you had posted</h3>
  <div class="parent-container">
    <div v-for="idea in ideas" :key="idea.id">
        <div class="main-image-container container w-100">
          <img :src="idea.image ? require(`@/assets/added_images/${idea.image}`) : null"
            class="main-image mt-5"/>
          <div class="image-info mx-5 mb-4">
            <p class="fw-bold fs-3">{{ idea.title }}</p>
            <p class="text-light">{{ idea.description }}</p>
            <div class="catgories d-flex gap-2">
              <div v-for="categorie in idea.categories" :key="categorie.id">
                <button class="btn btn-outline-light rounded-5 px-3 py-0">{{ categorie.name }}</button>
              </div>
            </div>
          </div>
          <div class="image-statistiques mx-5 mb-4">
            <p class="text-light">Comments: {{ idea.comments ? idea.comments.length : 0 }}</p>
            <p class="text-light">Likes: {{ idea.likes ? idea.likes.length : 0 }}</p>
          </div>
        </div>
        <div class="text container mt-5 text-start">
          <h3>Content:</h3>
          <p class="post-text">{{ idea.content }}</p>
          <div class="mt-5" v-if="idea.comments !== null">
            <div class="comments" v-if="idea.comments.length > 0">
            <h3 class="mb-5">Comments:</h3>
              <div v-for="comment in idea.comments" :key="comment.id">
                <p class="user"><strong>{{ comment.user.name }}</strong></p>
                <p class="comment">{{ comment.message }}</p>
                <hr class="divider hr w-50" />
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
  data() {
    return {
      id_user: "",
      ideas: [],
      id_idea: "",
      formVisible: false,
    };
  },
  async mounted() {
    const token = localStorage.getItem('token')
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    const response = await axios.get("http://127.0.0.1:8000/api/user/ideas");
    this.ideas = response.data;
    console.log(response);
  },
};
</script>

<style scoped>
.parent-container {
  padding: 0 10rem;
}
body {
  scroll-behavior: smooth;
}
.like {
  padding: 0 2rem;
}
.user {
  text-decoration: underline;
}
.comments {
  border: 2px solid black;
  padding: 2rem 1rem;
  margin-bottom: 5rem;
}
.divider {
  border-top: 0;
  height: 0.2rem;
  margin: 1.5rem auto;
  background-color: lavender;
  opacity: 1;
}
img {
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
.image-info {
  text-align: start;
  position: absolute;
  color: white;
  z-index: 1;
  bottom: 0;
  left: 0;
}
.image-statistiques {
  text-align: end;
  position: absolute;
  color: white;
  z-index: 1;
  bottom: 0;
  right: 0;
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
textarea {
  width: 100%;
  height: 300px;
}
@media (max-width: 768px) {
  .post-text {
    text-align: center;
    padding: 5px;
  }
  .categories {
    flex-direction: column;
    width: 40%;
  }
  .parent-container {
    padding: 0;
  }
}
</style>