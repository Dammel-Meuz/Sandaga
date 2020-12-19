<template>
  <div class="container pt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">register</div>

          <div class="card-body">
            <form
              class="needs-validation"
              style="margin-top: 1rem"
              @submit.prevent="adduser"
              novalidate
            >
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                  Full Name</label
                >

                <div class="col-md-6">
                  <input
                  v-model="form.name"
                    id="name"
                    type="text"
                    class="form-control"
                    required
                    autocomplete="name"
                    autofocus
                  />

                </div>

              </div>
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">
                  phone</label
                >

                <div class="col-md-6">
                  <input
                  v-model="form.phone"
                    id="name"
                    type="text"
                    class="form-control"
                    required
                    autofocus
                  />

                </div>

              </div>
               <div class="form-group row">
                <label for="local" class="col-md-4 col-form-label text-md-right"
                  >Locality</label
                >

                <div class="col-md-6">
                  <select
                  v-model="form.local"
                    class="custom-select"
                    id="local"
                    required
                  >
                    <option selected disabled value="">local...</option>
                    <option value="Dakar">Dakar</option>
                    <option value="Diourbel">Diourbel</option>
                    <option value="Fatick">Fatick</option>
                    <option value="Kaffrine">Kaffrine</option>
                    <option value="Kaolack">Kaolack</option>
                    <option value="Kédougou">Kédougou</option>
                    <option value="Kolda">Kolda</option>
                    <option value="Louga">Louga</option>
                    <option value="Matam">Matam</option>
                    <option value="Saint-Louis">Saint-Louis</option>
                    <option value="Sédhiou">Sédhiou</option>
                    <option value="Tambacounda">Tambacounda</option>
                    <option value="Thiès">Thiès</option>
                    <option value="Ziguinchor">Ziguinchor</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="type" class="col-md-4 col-form-label text-md-right"
                  >type</label
                >

                <div class="col-md-6">
                  <select
                  v-model="form.ispro"
                    class="custom-select"
                    id="type"
                    required
                  >
                    <option selected disabled value="">type...</option>
                    <option value="0">pesonnel</option>
                    <option value="1">professionnel</option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right"
                  >E-Mail</label
                >

                <div class="col-md-6">
                  <input
                  v-model="form.email"
                    id="email"
                    type="email"
                    class="form-control"
                    name="email"
                    value=""
                    required
                    autocomplete="email"
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="password"
                  class="col-md-4 col-form-label text-md-right"
                  >Password</label
                >

                <div class="col-md-6">
                  <input
                  v-model="form.password"
                    id="password"
                    type="password"
                    class="form-control"
                    name="password"
                    required
                    autocomplete="new-password"
                  />
                </div>
              </div>


              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: null,
        password: null,
        phone: null,
        ispro: null,
        isadmin: 0,
        name: null,
        local:null,
      },
    };
  },
  methods: {
    adduser() {
      var data = new FormData();
      data.append("email", this.form.email),
      data.append("local", this.form.local),
        data.append("password", this.form.password),
        data.append("phone", parseInt(this.form.phone)),
        data.append("ispro", this.form.ispro),
        data.append("isadmin", "0"),
        data.append("name", this.form.name);


    axios.post("http://127.0.0.1:8000/api/addUser", data)
         .then (response =>console.log(response.data));


    },
  },
};
</script>
