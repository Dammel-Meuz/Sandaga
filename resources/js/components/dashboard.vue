<template>
  <div class="container pt-5">
    <h1></h1>
    <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: #e3f2fd;"
    >
      <router-link to="#" class="navbar-brand">Dashboard</router-link>

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
          <!-- <li class="nav-item">
            <router-link to="/AjouCatégorie" class="nav-link"
              >Ajout Catégorie</router-link
            >
          </li> -->

          <li class="nav-item">
            <router-link to="/ListProduct" class="nav-link"
              >list Produit</router-link
            >
          </li>
          <!-- <li class="nav-item">
            <router-link to="/ListCatégorie" class="nav-link"
              >list Catégorie</router-link
            >
          </li> -->
          <!-- <li class="nav-item">
            <router-link to="/ListUser" class="nav-link"
              >list Users</router-link
            >
          </li> -->
        </ul>
      </div>
    </nav>
    <div class="container" style="margin-top: 3rem;">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 pt-30">
    <h3>les produits que vous publiez seront visible qu'aprés validation par l 'administrateur du site<br><b>Merci d'avoir choisi Sandaga.com !!!</b></h3>
    </div>
    <div class="col-md-2"></div>
    </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
//import FileInput from "./Shared/FileInput";
import FileInput from "./Shared/FileInput.vue";
export default {
  components: {
    FileInput,
  },
  data() {
    return {
      form: {
        name: null,
        image: null,
        description: null,
        categories_id: null,
        characteristic: null,
        quantity: null,
      },
    };
  },

  methods: {
    addprodact() {
      var data = new FormData();
      data.append("name", this.form.name);
      data.append("description", this.form.description);
      data.append("categories_id", this.form.categories_id);
      data.append("characteristic", this.form.characteristic);
      data.append("quantity", this.form.quantity);
      data.append("image", this.form.image);
      console.log(data.data);

      axios
        .post("http://127.0.0.1:8000/api/creat", data)
        .then((response) => console.log(response.data));
    },
  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
