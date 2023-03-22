<template>
  <div class="inscription d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Post</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form class="d-flex flex-column align-items-center p-4" autocomplete="off" enctype="multipart/form-data"
        @submit.prevent="addPost()">
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="text" placeholder="title" v-model="title"/>
          <label for="">Title</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ title_error }}</p>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="text" placeholder="description" v-model="description"/>
          <label for="">Description</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ description_error }}</p>
          </div>
        <div class="form-floating w-100 mb-4">
          <textarea class="form-control rounded-1" placeholder="Content" v-model="content"></textarea>
          <label>Content</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ content_error }}</p>
        </div>
        <div class="form-floating w-100 mt-4 file-input">
          <input class="form-control rounded-1 p-0" type="file" ref="fileInput" @change="onFileChange"/>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ image_error }}</p>
        </div>
        <div class="form-floating w-100 mt-4">
          <input class="form-control rounded-1" type="text" placeholder="categorie" v-model="tempCategorie" 
          @keyup="pushCategorie"/>
          <label>categories</label>
          <div v-for="categorie in categories" :key="categorie" class="categories">
            <span @click="deleteCategorie(categorie)">{{ categorie }}</span>
          </div>
            <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ categories_error }}</p>
        </div>
        <div class="form-floating w-100 mt-4">
          <input class="submit form-control rounded-1 text-white p-0" type="submit"/>
          <p class="text-start mt-2">Back to <strong><a href="/">home page</a></strong></p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import router from '@/router'
import axios from 'axios'
export default {
  data() {
    return {
      title: '',
      description: '',
      content: '',
      image: '',
      tempCategorie: "",
      categories: [],
      // errors
      title_error: '',
      description_error: '',
      content_error: '',
      image_error: '',
      categories_error: ''
    };
  },
  methods: {
    pushCategorie(e) {
      if(e.key === " " && this.tempCategorie !== " ") {
        if(!this.categories.includes(this.tempCategorie)) {
          this.categories.push(this.tempCategorie)
        }
        this.tempCategorie = ''
      } 
    },
    deleteCategorie(skill) {
      this.categories = this.categories.filter(function(item) {
        return skill != item
      })
    },
    onFileChange(e) {
      this.image = e.target.files[0]
    },
    async addPost() {
      let token = localStorage.getItem('token')
      let headers = { 'Authorization': `Bearer ${token}` }
      let formData = new FormData()

      formData.append('title', this.title)
      formData.append('description', this.description)
      formData.append('content', this.content)
      formData.append('image', this.image)

      for (let i = 0; i < this.categories.length; i++) {
        formData.append('categories[]', this.categories[i])
      }

      try {
        let response = await axios.post('http://127.0.0.1:8000/api/ideas', formData, { headers })
        router.push('/')
      } catch(e) {
        if(e.response.status == 422) {
          if(e.response.data.errors.hasOwnProperty('title')) {
            this.title_error = e.response.data.errors.title[0]
          } else {
            this.title_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('description')) {
            this.description_error = e.response.data.errors.description[0]
          } else {
            this.description_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('content')) {
            this.content_error = e.response.data.errors.content[0]
          } else {
            this.content_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('image')) {
            this.image_error = e.response.data.errors.image[0]
          } else {
            this.image_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('categories')) {
            this.categories_error = e.response.data.errors.categories[0]
          } else {
            this.categories_error = ''
          }
          console.log(e)
        }
      }
    }
  },
};
</script>


<style scoped>
.categories {
  display: inline-block;
  margin: 20px 10px 0 0;
  padding: 6px 12px;
  background: #fff;
  border-radius: 20px;
  font-size: 15px;
  font-weight: normal;
  color: rgb(211, 198, 255);;
  cursor: pointer;
}
.file-input input::file-selector-button {
  padding: 1.5rem 1rem;
  background-color: rgb(203, 203, 255);
  color: rgb(255, 255, 255);
  transition: 0.5s ease-in-out;
}
textarea.form-control {
  height: 200px;
  resize: none;
}
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