<template>
  <b-form @submit="onSubmit">
    <b-form-select v-model="locEmployee.company_id" :options="companies" class="mb-sm-2">
      <template v-slot:first>
        <b-form-select-option :value="null" disabled>-- Please select company --</b-form-select-option>
      </template>
    </b-form-select>
    <b-input
      v-model="locEmployee.firstname"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Firstname"
      required
    ></b-input>
    <b-input
      v-model="locEmployee.lastname"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Lastname"
      required
    ></b-input>
    <b-input
      type="email"
      v-model="locEmployee.email"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Email"
      required
    ></b-input>
    <b-input
      v-model="locEmployee.phone"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Phone"
      required
    ></b-input>
    <slot></slot>
  </b-form>
</template>
<script>
export default {
  props: ["employee"],
  data() {
    return {
      companies: [],
      locEmployee: this.employee
    };
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault();
    },
    add() {
      axios.post("employees", this.locEmployee).then(res => {
        this.locEmployee = {
          company_id: null,
          firstname: "",
          lastname: "",
          email: "",
          phone: ""
        };
        this.$emit("success", true);
      });
    },
    update() {
      axios
        .put(`employees/${this.$route.params.id}`, this.locEmployee)
        .then(res => {
          this.$emit("success", true);
        });
    },
    deletee() {
      axios
        .delete(`employees/${this.$route.params.id}`, this.locEmployee)
        .then(res => {
          this.$emit("success", true);
        })
        .catch(err => {
          this.$emit("error", true);
        });
    },
    getCompanies() {
      axios.get("employees_companies").then(res => {
        this.companies = res.data.companies;
      });
    },
    getRoles() {
      axios.get("employees_roles").then(res => {
        this.roles = res.data.roles;
      });
    }
  },
  mounted() {
    this.getCompanies();
    this.getRoles();
    this.locEmployee = this.employee;
  }
};
</script>