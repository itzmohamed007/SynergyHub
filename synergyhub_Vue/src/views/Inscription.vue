<template>
  <div class="inscription d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Create Account</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form class="d-flex flex-column align-items-center p-4" autocomplete="off">
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="text" placeholder="lmjkdfmlkjdsmlfk"/>
          <label for="">name</label>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="email" placeholder="email"/>
          <label for="">email</label>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="password" placeholder="password"/>
          <label for="">password</label>
        </div>
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="password" placeholder="verify"/>
          <label for="">verify password</label>
        </div>
        <div class="form-floating w-100 mt-3">
          <input class="submit form-control rounded-1 text-white p-0" type="submit"/>
          <p class="mt-3 text-start">already have an account ? <strong><a href="authentification">log in here</a></strong></p>
        </div>
      </form>
    </div>
  </div>
</template>

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