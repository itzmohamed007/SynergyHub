<template>
  <div class="home">
    <h1 class="mb-3 fw-bold">Ideas Of Today</h1>
    <h6>Find All Inspirational Ideas, Topics And Experiences Here...</h6>
    <div class="main-image-container container w-100">
      <a href="post"
        ><img
          src="@/assets/images/Addiction.png"
          alt=""
          class="main-image mt-5"
      /></a>
      <div class="image-text mx-5 mb-4">
        <p>Mohamed Bourra | 18/02/2023</p>
        <p class="fw-bold fs-3">Addiction</p>
        <p class="text-light">I want to make this text appear on the image</p>
        <div class="categories d-flex gap-2">
          <button class="btn btn-outline-light rounded-5 px-3 py-0">art</button>
          <button class="btn btn-outline-light rounded-5 px-3 py-0">
            problem
          </button>
          <button class="btn btn-outline-light rounded-5 px-3 py-0">
            sport
          </button>
        </div>
      </div>
    </div>
    <!--  -->
    <div class="container other-topics mt-5 gap-5">
      <div class="row justify-content-between">
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <img src="@/assets/images/Art.png" alt="" class="img-fluid w-100" />
          <div class="mt-3 text-start">
            <p class="post-info fw-bold mb-2">Omar Bourra | 17/02/2023</p>
            <p class="post-description fw-bold mb-2">Art In Our Days</p>
            <p class="post-content">
              the art is a art that should be artistique and artistique.
            </p>
            <div class="categories d-flex gap-2">
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                art
              </button>
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                problem
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <img
            src="@/assets/images/Astronologie.png"
            alt=""
            class="img-fluid w-100"
          />
          <div class="mt-3 text-start">
            <p class="post-info fw-bold mb-2">Ahmed Bourra | 15/02/2023</p>
            <p class="post-description fw-bold mb-2">
              Astronologie In Our Days
            </p>
            <p class="post-content">
              the Astronologie is a Astronologie that should be Astronologie.
            </p>
            <div class="categories d-flex gap-2">
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                studies
              </button>
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                astronologie
              </button>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
          <img
            src="@/assets/images/Development.png"
            alt=""
            class="img-fluid w-100"
          />
          <div class="mt-3 text-start">
            <p class="post-info fw-bold mb-2">Hamza Bakkouri | 17/02/2023</p>
            <p class="post-description fw-bold mb-2">Motivation In Our Days</p>
            <p class="post-content">
              the motivation is a motivation that should be motivational and
              motivational.
            </p>
            <div class="categories d-flex gap-2">
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                motivation
              </button>
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                problem
              </button>
              <button class="btn btn-outline-dark rounded-5 px-3 py-0">
                work
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
};
</script>

<style scoped>
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
.image-text {
  text-align: start;
  position: absolute;
  color: white;
  z-index: 1;
  bottom: 0;
  left: 0;
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