<template>
  <nav class="d-flex gap-2">
    <router-link to="/" class="">Home</router-link>
    <router-link to="/inscription" class="">Inscription</router-link>
  </nav>
  <router-view/>
</template>


<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap');
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  font-family: 'Poppins', sans-serif;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  justify-content: end;
  padding: 30px;
  margin-right: 3rem;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
  text-decoration: none;
  padding: 10px;
  border-radius: 4px;
}

nav a:hover {
  color:rgb(167, 167, 167);
  transition: .5s;
}
nav a.router-link-exact-active {
  color: #ffffff;
  background-color: rgb(0, 0, 0);
}
@media (max-width: 768px) {
  nav {
    justify-content: space-between;
    padding: 20px;
    margin-right: 0;
  }
}
</style>
