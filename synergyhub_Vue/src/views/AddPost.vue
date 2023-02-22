<template>
  <div class="inscription d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Post</h1>
    <div class="hero container rounded-3 mt-5 mb-5 mx-5">
      <form class="d-flex flex-column align-items-center p-4" autocomplete="off">
        <div class="form-floating w-100 mb-4">
          <input class="form-control rounded-1" type="text" placeholder="title"/>
          <label for="">title</label>
        </div>
        <div class="form-floating w-100 mb-4">
            <textarea class="form-control rounded-1" placeholder="Description"></textarea>
            <label>Description</label>
          </div>
        <div class="form-floating w-100 mt-4 file-input">
          <input class="form-control rounded-1 p-0" type="file"/>
        </div>
        <div class="form-floating w-100 mt-4">
          <input class="form-control rounded-1" type="text" placeholder="categorie"/>
          <label>categorie</label>
        </div>
        <div class="form-floating w-100 mt-4">
          <input class="submit form-control rounded-1 text-white p-0" type="submit"/>
          <p class="text-start mt-2">Back to <strong><a href="/">home page</a></strong></p>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped>
.file-input input::file-selector-button {
  padding: 1.5rem 1rem;
  background-color: rgb(203, 203, 255);
  color: rgb(255, 255, 255);
  transition: .5s ease-in-out;
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
  .title {
    margin-top: 4rem;
  }
  .hero {
    padding: 6rem 2rem;
    width: 90%;
  }
}
</style>