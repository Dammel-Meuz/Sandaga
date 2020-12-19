<template>
  <div class="container pt-5">
    <h1>Modifier Produit</h1>
    <form
      class="needs-validation"
      style="margin-top: 1rem"

      novalidate
    >
      <div class="form-row">
        <div class="col-md-8 mb-3">
          <label for="validationTooltip01">Name</label>
          <input

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

            class="form-control"
            name=""
            id="descr"
            cols="5"
            rows="3"
            v-model="productEdit"
          ></textarea>
        </div>
        <div class="col-md-4 mb-3"></div>
        <div class="col-md-3 mb-3">
          <label for="description">Picture</label>
          <input
            type="file"
            name="image"
            class="form-control-file"
            id="image"

          />
        </div>

        <div class="col-md-5 mb-3">
          <label for="validationTooltip04">Catégorie</label>
          <select

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

            type="text"
            class="form-control"
            id="validationTooltip05"
            required
          />
        </div>
        <div class="col-md-4 mb-3">
          <label for="validationTooltip0">Prix</label>
          <input

            type="text"
            class="form-control"
            id="validationTooltip0"
            required
          />
        </div>
      </div>
      <button class="btn btn-success">Ajout</button>
      <img

        width="100"
        height="100"

      />
      <!-- <img id="previewImg" alt="product img" style="max-width:130px;margin-top:20px"> -->
    </form>
    <div></div>
  </div>
</template>

<script>
import Axios from "axios";

export default {
    props:['productEdit']
};
</script>
