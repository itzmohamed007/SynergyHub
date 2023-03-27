<script setup>
  import { Icon } from '@iconify/vue'
</script>

<template>
  <div class="home">
    <div class="main-image-container container w-100">
      <img :src="idea.image ? require(`@/assets/added_images/${idea.image}`) : null" class="main-image mt-5" />
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
      <div class="d-flex justify-content-center gap-5 my-5">
      </div>
      <div class="comments">
        <div class="form-floating w-100 mb-5">
          <textarea class="form-control rounded-1" placeholder="Content" v-model="message"></textarea>
          <label>Comment</label>
          <button class="btn py-1 px-4 bg-dark text-white mt-3" @click="comment()">Send</button>
        </div>
        <div v-for="comment in comments" :key="comment.id">
          <p class="user"><strong>{{ comment.user.name }}</strong></p>
          <p class="comment">{{ comment.message}}</p>
          <div class="d-flex align-items-center justify-content-start mt-0">
            <div class="mb-4">
              <button class="btn p-0" @click="like(comment.id)">
                <Icon icon="mdi:cards-heart" color="red" width="40" height="40" v-if="comment.likes.user_id == auth_id"/>
                <Icon icon="mdi:cards-heart-outline" color="red" width="50" height="50" v-else/>
                </button>
              <span class="mx-2 fw-light">likes: {{ comment.likes.length }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Icon } from '@iconify/vue'
import axios from 'axios'
export default {
  data() {
    return {
      auth_id: localStorage.getItem('id'),
      idea: [],
      id_idea: '',
      message: '',
      comments: {}
    };
  },
  methods: {
    async like(id) {
      let token = localStorage.getItem('token')
      let headers = { 'Authorization': `Bearer ${token}` }
      await axios.post('http://127.0.0.1:8000/api/comments/' + id + '/like', null, { headers })
      this.post()
    },
    async post() {
      this.id_idea = this.$route.params.id
      const response = await axios.get('http://127.0.0.1:8000/api/ideas/' + this.id_idea)
      this.idea = response.data
      this.comments = []
      this.comments = this.idea.comments ? this.idea.comments : []
      console.log(this.comments[0].likes)
    },
    async comment() {
      let token = localStorage.getItem('token')
      let headers = { 'Authorization': `Bearer ${token}` }
      let id = this.$route.params.id
      await axios.post('http://127.0.0.1:8000/api/comments/' + id, {
        'message': this.message
      }, { headers })
      this.message = ''
      this.post()
    }
  },
  mounted() {
    this.post()
  }
};
</script>

<style scoped>
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
  margin: 1.5rem 0;
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
textarea.form-control {
  height: 100px;
  resize: none;
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
}
</style>