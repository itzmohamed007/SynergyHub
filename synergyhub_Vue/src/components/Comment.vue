Copy code
<template>
  <div class="form-background">
    <div class="comment d-flex flex-column justify-content-center align-items-center">
      <h1 class="title">Comment</h1>
      <div class="hero container rounded-3 mt-5 mb-5 mx-5">
        <form class="d-flex flex-column align-items-center" autocomplete="off">
          <div class="form-floating w-100 mb-4">
            <textarea class="form-control rounded-1" placeholder="comment"></textarea>
            <label>Comment</label>
          </div>
          <div class="form-floating w-100 mt-4">
            <input class="submit form-control rounded-1 text-white p-0" type="submit" value="Send">
            <button class="cancel btn w-100 mt-2 text-white px-4" @click="hideForm">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template> 

<style scoped>
.cancel {
  background-color: rgb(255, 176, 176);
  border: none;
  transition: 0.5s ease-in-out;
}
.cancel:hover {
  background-color: rgb(255, 54, 54);
}
.form-background {
  z-index: 10;
  position: fixed;
  padding: 3rem 0;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(105, 105, 215, 0.155);
  backdrop-filter: blur(8px);
}
.hero {
  width: 50%;
  padding: 2rem 5rem;
  background-color: lavender;
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
textarea.form-control {
  height: 200px;
  resize: none;
}
@media (max-width: 768px) {
  .hero {
    width: 90%;
    padding: 4rem 2rem;
  }
  .title {
    margin-top: 3rem;
  }
}
</style>

<script>
export default {
  name: "Form",
  methods: {
    hideForm() {
      this.$emit('close');
    },
  },
};
</script>
