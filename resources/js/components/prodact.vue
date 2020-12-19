<template>
  <div class="pt-3 ">

    <div class="row">
      <div class=" ">
        <h1></h1>

        <div class="container mb-5 mt-5">
          <div class="row">

            <div
              class="card promoting-card col-md-3 mx-2 my-2 w-5 h-50"

              v-for="prodact in prodacts.data"
              :key="prodact.id"
            >
              <!-- Avatar -->
              <img
                :src="'img/img47.png'"
                class="rounded-circle mr-3"
                height="50px"
                width="50px"
                alt="avatar"
              />

              <!-- Content -->
              <div>
                <!-- Title -->
                <h6 class="font-weight-bold font-weight-bold mb-1 small">
                  Dammel-Tech shop
                </h6>
                <h6 class="font-weight-bold mb-1 small" style="font-size: 10px;">{{ prodact.name }}</h6>

              </div>

              <!-- Card image -->
                <a href="#">
              <img
                class="card-img-top rounded "
                 height="190px"
                width="50px"
                v-bind:src="'/images/'+prodact.image"
                alt="Card image cap"
              />
            </a>
            <div class="" style="background-color: #e3f2fd;">
             <h6 class="font-weight-bold mb-1 small" style="font-size: 20px; text-align:center;">prix :{{ prodact.prix }} fr</h6>

            <!-- <font-awesome-icon :icon="['fab', 'font-awesome']" />

            <a href="#"><font-awesome-icon icon="address-card" /></a> -->

          </div>

            </div>


          </div>

        </div>

        <pagination :data="prodacts" @pagination-change-page="getResults" class="ml-5" style="text-align:center;">
        <span slot="prev-nav">&lt; Previous</span>
	    <span slot="next-nav">Next &gt;</span>
        </pagination>

        <!-- <pagination :data="prodacts">
          <span slot="prev-nav">&lt; Previous</span>
          <span slot="next-nav">Next &gt;</span>
        </pagination> -->
      </div>
      <!-- <div class="col-md-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, aspernatur?</div> -->
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      prodacts: {},
      //spin:true,
    };
  },
  created() {
    axios
      .get("http://127.0.0.1:8000/api/index")
      .then((response) => (this.prodacts = response.data));
    console.log(this.prodacts);
  },
  methods: {
		// Our method to GET results from a Laravel endpoint
		getResults(page = 1) {
			axios.get('http://127.0.0.1:8000/api/index?page=' + page)
				.then(response => {
					this.prodacts = response.data;
				});
		}
	},
  // methods: {
  // 	// Our method to GET results from a Laravel endpoint
  // 	getResults(page = 1) {
  // 		axios.get('http:\/\/127.0.0.1:8000\/api\/index?page=' + page)
  // 			.then(response => {
  // 				this.prodacts = response.data;
  // 			});
  // 	}
  // },
  mounted() {
    console.log("Component mounted.");
  },
};
</script>
<style scoped>
.collapse-content .fa.fa-heart:hover {
  color: #f44336 !important;
}
.collapse-content .fa.fa-share-alt:hover {
  color: #0d47a1 !important;
}
</style>>
