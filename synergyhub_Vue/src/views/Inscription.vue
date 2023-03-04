<template>
  <div class="inscription d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Create Account</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form class="d-flex flex-column align-items-center p-4" autocomplete="off" @submit.prevent="inscription()">
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="text" placeholder="name" v-model="name"/>
          <label for="">name</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ name_error }}</p>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="email" placeholder="email" v-model="email"/>
          <label for="">email</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ email_error }}</p>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="password" placeholder="password" v-model="password"/>
          <label for="">password</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ password_error }}</p>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="password" placeholder="verify" v-model="password_confirmation"/>
          <label for="">verify password</label>
          <p class="text-white bg-danger w-100 rounded-1 mt-3">{{ password_confirmation_error }}</p>
        </div>
        <div class="form-floating w-100 mt-3">
          <input class="submit form-control rounded-1 text-white p-0" type="submit"/>
          <p class="mt-3 text-start">already have an account ? <strong><a href="authentification">log in here</a></strong></p>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import router from '@/router'

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      // errors
      name_error: '',
      email_error: '',
      password_error: '',
      password_confirmation_error: ''
    }
  },
  methods: {
    async inscription() {
      let formData = new FormData()

      formData.append('name', this.name)
      formData.append('email', this.email)
      formData.append('password', this.password)
      formData.append('password_confirmation', this.password_confirmation)
      
      try {
        let response = await axios.post('http://127.0.0.1:8000/api/register', formData)
        localStorage.setItem('token', response.data.token)
        router.push('/')
      } catch(e) {
        console.log(e)
        if(e.response.status == 422) {
          if(e.response.data.errors.hasOwnProperty('name')) {
            this.name_error = e.response.data.errors.name[0]
          } else {
            this.name_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('email')) {
            this.email_error = e.response.data.errors.email[0]
          } else {
            this.email_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('password')) {
            this.password_error = e.response.data.errors.password[0]
          } else {
            this.password_error = ''
          }
          if(e.response.data.errors.hasOwnProperty('password_confirmation')) {
            this.password_confirmation_error = e.response.data.errors.password_confirmation[0]
          } else {
            this.password_confirmation_error = ''
          }
        }
      }
    }
  }
}
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
  transition: .5s ease-in-out;
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
  .hero {
    padding: 2rem 2rem;
    width: 90%;
  }
  .title {
    margin-top: 2rem;
  }
}
</style>