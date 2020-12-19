<template>
  <div class="container pt-5">
    <h1></h1>
     <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: #e3f2fd"
    >
      <router-link to="#" class="navbar-brand">Les Utilisateurs</router-link>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link to="/AjouProduct" class="nav-link"
              >Ajout Produit</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/AjouCatégorie" class="nav-link"
              >Ajout Catégorie</router-link
            >
          </li>

          <li class="nav-item">
            <router-link to="/ListProduct" class="nav-link"
              >list Produit</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/ListCatégorie" class="nav-link"
              >list Catégorie</router-link
            >
          </li>
          <li class="nav-item">
            <router-link to="/ListUser" class="nav-link"
              >list Users</router-link
            >
          </li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
