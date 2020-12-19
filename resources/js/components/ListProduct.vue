<template>
  <div class="container pt-5">
    <h1></h1>
     <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: #e3f2fd;"
    >
      <router-link to="#" class="navbar-brand">Les produits</router-link>

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

    <div class="container p-5" style="margin-top: 1rem;">
    <table class="table table-bordered table-striped">
  <thead>
    <tr style="background-color: #e3f2fd">
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="product in products" :key="product.id">
      <th scope="row">{{ product.id }}</th>
      <td>{{ product.name }}</td>
      <td>{{ product.description }}</td>
      <td>{{ product.quantity }}</td>
      <td>
      <router-link class="btn btn-outline-secondary" to="/EditProduit" @click="getProduct(product.id)"
              >Edit</router-link
            >

    <button type="button" class="btn btn-outline-danger" @click="deletProduct(product.id)">delet</button>


      </td>
    </tr>
  </tbody>
</table>
    </div>

  </div>
</template>

<script>
import axios from "axios";
import EditProduit from './EditProduit.vue';
export default {
   // <edit-produit v-bind:productEdit="productEdit"></edit-produit> component editer
  components: { EditProduit },
  data() {
    return {
      products: {},
      productEdit:'',
    };
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/indexlistproduit")
      .then((response) => (this.products = response.data));
            //console.log(this.products);
  },

  mounted() {
    console.log("Component mounted.");
  },
  methods:{
    //   getProduct(id){
    //       axios.get("http://127.0.0.1:8000/api/editproduit/" + id)
    //             .then(response => this.productEdit = response.data)
    //             console.log(this.productEdit)
    //             .catch(error =>console.log(error));

    //   },

      deletProduct(id){
          axios.delete("http://127.0.0.1:8000/api/produit/" +id)
          .then(response => this.productEdit = response.data)
                console.log(this.productEdit)
                .catch(error =>console.log(error));
      }



}
}
</script>
