<template>
  <div class="home">
    <Form v-if="formVisible" @close="formVisible = false" />
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
      <p class="post-text">
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
        <button
          class="btn btn-outline-dark rounded-5 px-5 py-2"
          @click="showForm()"
        >
          Comment
        </button>
      </div>
      <div class="comments">
        <p class="user"><strong>Abdelali khalif</strong></p>
        <p class="comment">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis
          saepe velit debitis animi eligendi et at eveniet ut id. Totam adipisci
          aperiam illum sequi corrupti libero blanditiis. Pariatur, aut minima!
        </p>
        <div class="d-flex align-items-center justify-content-center">
          <button class="like btn btn-outline-danger rounded-5 px-5 py-1">Like</button>
        </div>
        <hr class="divider hr w-50">
        <p class="user"><strong>Ayoub Ahibban</strong></p>
        <p class="comment">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis
          saepe velit debitis animi eligendi et at eveniet ut id. Totam adipisci
          aperiam illum sequi corrupti libero blanditiis. Pariatur, aut minima!
        </p>
        <div class="d-flex align-items-center justify-content-center">
          <button class="like btn btn-outline-danger rounded-5 px-5 py-1">Like</button>
        </div>
        <hr class="divider hr w-50">
        <p class="user"><strong>Mahdi Hassani Saysi</strong></p>
        <p class="comment">
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis
          saepe velit debitis animi eligendi et at eveniet ut id. Totam adipisci
          aperiam illum sequi corrupti libero blanditiis. Pariatur, aut minima!
        </p>
        <div class="d-flex align-items-center justify-content-center">
          <button class="like btn btn-outline-danger rounded-5 px-5 py-1">Like</button>
        </div>
        <hr class="divider hr w-50">
      </div>
    </div>
  </div>
</template>

<script>
import Form from "../components/Comment.vue";
export default {
  name: "Home",
  data() {
    return {
      formVisible: false,
    };
  },
  components: {
    Form,
  },
  methods: {
    showForm() {
      this.formVisible = true;
    },
  },
};
</script>

<style scoped>
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
  border-top: 0; /*this line of code remove the initiale decoration of a hr in bootstrap*/
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
}
</style>