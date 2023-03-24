<template>
  <div class="inscription d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Update</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form class="d-flex flex-column align-items-center p-4" autocomplete="off" enctype="multipart/form-data"
        @submit.prevent="update()">
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

        <div class="w-100 mt-4 mb-3">
          <p class="text-dark mb-0">Old Categories</p>
          <div v-for="categorie in oldCategories" :key="categorie" class="oldCategories">
            <span>{{ categorie.name }}</span>
          </div>
        </div>

        <div class="form-floating w-100 mt-4">
          <input class="form-control rounded-1" type="text" placeholder="categorie" v-model="tempCategorie" 
          @keyup="pushCategorie"/>
          <label>New Categories</label>
          <div v-for="categorie in newCategories" :key="categorie" class="newCategories">
            <span @click="deleteCategorie(categorie)">{{ categorie }}</span>
          </div>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ categories_error }}</p>
        </div>
        <div class="form-floating w-100 mt-4">
          <button class="submit btn rounded-1 text-white w-100">Update</button>
          <p class="text-start mt-2">Back to <strong><a href="/">home page</a></strong></p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data() {
    return {
      idea_id: this.$route.params.id,

      title: '',
      description: '',
      content: '',
      image: '',

      newCategories: [],
      oldCategories: [],

      tempCategorie: '',

      title_error: '',
      description_error: '',
      content_error: '',
      image_error: '',
      categories_error: ''
    }
  },
  async mounted() {
    const token = localStorage.getItem('token')
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    const response = await axios.get('http://127.0.0.1:8000/api/ideas/update/' + this.idea_id)

    this.title = response.data.title
    this.description = response.data.description
    this.content = response.data.content
    this.oldCategories = response.data.categories
  },
  methods: {
    pushCategorie(e) {
      if(e.key === " " && this.tempCategorie !== " ") {
        if(!this.newCategories.includes(this.tempCategorie)) {
          this.newCategories.push(this.tempCategorie)
        }
        this.tempCategorie = ''
      }
    },
    deleteCategorie(categorie) {
      this.newCategories = this.newCategories.filter(function(item) {
        return categorie != item
      })
    },
    onFileChange(e) {
      this.image = e.target.files[0]
    },
    async update() {
      let token = localStorage.getItem('token')
      let headers = { 'Authorization': `Bearer ${token}` }
      let newData = {
        'title': this.title,
        'description': this.description,
        'content': this.content,
        'image': this.image,
        'categories': this.newCategories
      }
      try {
        const response = await axios.put('http://127.0.0.1:8000/api/ideas/' + this.idea_id, newData, { headers })
        console.log(response)
      } catch (error) {
        console.log(error)
      }
    },
  }
}
</script>

<style scoped>
.oldCategories {
  display: inline-block;
  margin: 20px 10px 0 0;
  padding: 6px 12px;
  background: #fff;
  border-radius: 20px;
  font-size: 15px;
  font-weight: normal;
  color: rgb(91, 91, 92);;
  cursor: default;
}
.newCategories {
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
  padding: 10px;
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