<template>
  <div class="container">
    <h1>Dashboard</h1>

    <form class="needs-validation" @submit.prevent="addprodact" novalidate>
      <div class="form-row">
        <div class="col-md-8 mb-3">
          <label for="validationTooltip01">Name prodact</label>
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
          <file-input label='image'></file-input>
        </div>

        <div class="col-md-3 mb-3">
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
        <div class="col-md-3 mb-3">
          <label for="validationTooltip05">Quantity</label>
          <input
            v-model="form.quantity"
            type="text"
            class="form-control"
            id="validationTooltip05"
            required
          />
        </div>
      </div>
      <button class="btn btn-success">Ajout</button>
    </form>
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
        url_img: null,
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
      data.append("name",this.form.name);
      data.append("description",this.form.description);
      data.append("categories_id",this.form.categories_id);
      data.append("characteristic",this.form.characteristic);
      data.append("quantity",this.form.quantity);
      data.append("url_img",this.form.url_img);
      console.log(data);

      axios.post("http://127.0.0.1:8000/api/creat", data)
        .then (response =>console.log(response.data));


    },

  },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
