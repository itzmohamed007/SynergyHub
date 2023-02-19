<template>
  <nav class="d-flex justify-content-end mx-5 gap-2">
    <router-link to="/" class="">Home</router-link>
    <router-link to="/inscription" class="">Inscription</router-link>
    <router-link to="/authentification" class="">Authentification</router-link>
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
  padding: 30px;
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
</style>
