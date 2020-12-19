<template>
  <div class="container pt-5">
    <h1></h1>
     <nav
      class="navbar navbar-expand-lg navbar-light"
      style="background-color: #e3f2fd;"
    >
      <router-link to="#" class="navbar-brand">Product</router-link>

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

    <form class="needs-validation" style="margin-top: 1rem;" @submit.prevent="addprodact" novalidate>
      <div class="form-row">
        <div class="col-md-8 mb-3">
          <label for="validationTooltip01">Name</label>
          <input
            v-model="form.name"
            type="text"
            class="form-control"
            id="validationTooltip01"
            required
          />
        </div>
        <div class="col-md-4 mb-3"></div>
        <div class="col-md-8 mb-3">
          <label for="validationTooltip02">Caractéristique</label>
          <input
            v-model="form.characteristic"
            type="text"
            class="form-control"
            id="validationTooltip02"
            required
          />
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-8 mb-3">
          <label for="descr">Descriptions</label>
          <textarea
            v-model="form.description"
            class="form-control"
            name=""
            id="descr"
            cols="5"
            rows="3"
          ></textarea>
        </div>
        <div class="col-md-4 mb-3"></div>
        <div class="col-md-3 mb-3">
        <label for="description">Picture</label>
            <input type="file" name="image" class="form-control-file" id="image" @change="onFileChange">
          <!-- <file-input label='image'></file-input> -->
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationTooltip04">Catégorie</label>
          <select
            v-model="form.categories_id"
            class="custom-select"
            id="validationTooltip04"
            required
          >
            <option selected disabled value="">Choose...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </div>
        <div class="col-md-4 mb-3"></div>
        <div class="col-md-4 mb-3">
          <label for="validationTooltip05">Quantity</label>
          <input
            v-model="form.quantity"
            type="text"
            class="form-control"
            id="validationTooltip05"
            required
          />
        </div>
         <div class="col-md-4 mb-3">
          <label for="validationTooltip0">Prix</label>
          <input
            v-model="form.prix"
            type="text"
            class="form-control"
            id="validationTooltip0"
            required
          />
        </div>
      </div>
      <button class="btn btn-success">Ajout</button>
      <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview"/>
      <!-- <img id="previewImg" alt="product img" style="max-width:130px;margin-top:20px"> -->
    </form>
    <div>

    </div>
  </div>
</template>

<script>
import Axios from "axios";
//import FileInput from "./Shared/FileInput";
import FileInput from './Shared/FileInput.vue';
export default {
  components: {
    FileInput
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
        prix:null,
      },
        imagePreview: null,
        showPreview: false,
    };
  },

  methods: {
    addprodact() {
      var data = new FormData();
      data.append("name",this.form.name);
      data.append("description",this.form.description);
      data.append("categories_id",this.form.categories_id);
      data.append("characteristic",this.form.characteristic);
      data.append("quantity",this.form.quantity);
      data.append("prix",this.form.prix);
      data.append("image",this.form.image);
      console.log(data);

      axios.post("http://127.0.0.1:8000/api/creat", data)
        .then (response =>console.log(response.data));

    //            .then((res) => {
    //             console.log(res);
    //         })
    //         .catch((error) => {
    //             console.log(error);
    // });


    },
    onFileChange(event){
    this.form.image = event.target.files[0];
     let reader  = new FileReader();
     reader.addEventListener("load", function () {
        this.showPreview = true;
        this.imagePreview = reader.result;
    }.bind(this), false);

    /*
    Check to see if the file is not empty.
    */
    if( this.form.image ){
        /*
            Ensure the file is an image file.
        */
        if ( /\.(jpe?g|png|gif)$/i.test( this.form.image.name ) ) {

            console.log("here");
            /*
            Fire the readAsDataURL method which will read the file in and
            upon completion fire a 'load' event which we will listen to and
            display the image in the preview.
            */
            reader.readAsDataURL( this.form.image );
        }
    }
}

  },
  mounted() {
    console.log("Component mounted.");
  },

};
    // function previewFile(input){
    //     var file=$("input[type=file]").get(0).file[0];
    //     if(file){
    //         var reader = new FileReader()
    //         reader.onload = function(){
    //             $('#previewImg').att("src",reader.result);
    //         }
    //         reader.readAsDataURL(file);
    //     }
    // }
</script>
