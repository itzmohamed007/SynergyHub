<template>
  <div class="home">
    <div class="main-image-container container w-100">
      <img src="@/assets/images/Addiction.png" alt="" class="main-image mt-5" />
      <div class="image-info mx-5 mb-4">
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
      <div class="image-statistiques mx-5 mb-4">
        <p class="text-light">Comments: 33</p>
        <p class="text-light">Likes: 102</p>
      </div>
    </div>
    <div class="text container mt-5 text-start">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error
        perferendis facere similique odit veritatis in consequatur nobis rerum
        ducimus mollitia eos quaerat molestiae distinctio deleniti suscipit
        commodi nihil, incidunt est delectus reiciendis numquam ratione vitae
        facilis! Quis libero aut, inventore possimus enim beatae maxime culpa!
        Suscipit rem voluptas illo pariatur sit dignissimos reprehenderit, odit
        neque temporibus minima ullam voluptate hic repellendus ad voluptatibus
        asperiores dolor ab. Alias et atque recusandae necessitatibus assumenda,
        eius, magnam ratione, officiis molestias blanditiis magni quaerat vel
        omnis odio impedit quae nisi asperiores vero accusantium dignissimos
        iusto possimus fugit earum expedita. Ea corrupti nisi pariatur natus nam
        sunt quam modi veniam facilis tempore alias distinctio est aspernatur,
        dolore nobis cum iusto blanditiis similique! Consectetur asperiores,
        aliquam modi inventore voluptates molestiae, expedita aliquid velit sunt
        veniam, praesentium deleniti dolorum fugit esse dicta! Necessitatibus
        similique deserunt, ex minus, porro doloremque voluptas at expedita, ut
        nisi magnam amet id ipsa nihil. Non, praesentium necessitatibus ipsam
        eligendi reprehenderit soluta quos, harum nesciunt ullam sunt, quia
        officia. Dolorum recusandae voluptas reprehenderit sunt, suscipit odit
        ducimus voluptatum sapiente voluptatem ipsum ratione cupiditate numquam
        culpa molestiae tempore at dolorem et ex iusto commodi eius fugiat nemo
        doloremque? Cum officia et maxime eaque beatae!
      </p>
      <div class="d-flex justify-content-center gap-5 my-5">
        <button class="btn btn-outline-dark rounded-5 px-5 py-2">Comment</button>
        <button class="btn btn-outline-dark rounded-5 px-5 py-2">Like</button>

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
.home {
  padding: 2rem 0;
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
</style>