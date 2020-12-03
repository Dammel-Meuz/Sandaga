<template>
  <div class="container">
    <h1>list des produits</h1>

    <div class="container pt-5">
    <div class="row">
      <div class="card col-md-3 mx-4" style="width: 15rem; height: 20rem" v-for="prodact in prodacts" :key="prodact.id">
        <img :src="'img/img22.jpg'" class="card-img-top" alt="" />
        <div class="card-body">
          <small class="card-title pt-1">{{ prodact.name }}</small>
          <h5 class="card-text">
            {{ prodact.description }}
          </h5>
          <a href="#" class="btn btn-primary mx-6 my-1">plus d'info</a>
        </div>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
        return{
            prodacts:[]
        }
    },
    created(){
        axios.get('http://127.0.0.1:8000/api/index')
             .then(response=>this.prodacts=response.data);
             console.log(this.prodacts);
    },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
