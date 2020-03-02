<template>
<div>
    <h5>Edit Employee</h5>
    <b-alert :variant="variant" :show="warning === true" dismissible>{{ warningContent }}</b-alert>
    <b-alert variant="success" :show="warning === false" dismissible>Employee deleted successfuly.</b-alert>
  <b-form @submit="onSubmit" v-if="warning === true">
    <b-form-select v-model="company_id" :options="companies" class="mb-sm-2">
      <template v-slot:first>
        <b-form-select-option :value="null" disabled>-- Please select company --</b-form-select-option>
      </template>
    </b-form-select>
    <b-input
      v-model="firstname"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Firstname"
      required
    ></b-input>
    <b-input
      v-model="lastname"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Lastname"
      required
    ></b-input>
     <b-input
      type="email"
      v-model="email"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Email"
      required
    ></b-input>
    <b-input
      v-model="phone"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Phone"
      required
    ></b-input>
    <b-button variant="danger" type="submit">Confirm Delete</b-button>
  </b-form>
</div>
</template>

<script>
export default {
    data(){
        return {
          warning: true,
           variant: 'danger',
            warningContent: 'Are you sure you want to delete?',
            companies: [],
            alertShow: false,
            company_id: null,
            firstname: '',
            lastname: '',
            email: '',
            phone: ''
        }
    },
    methods: {
        onSubmit(evt) {
        evt.preventDefault()
        axios.delete(`employees/${this.$route.params.id}`).then(res => {
                this.warning = false
            })
      },
      getCompanies(){
        axios.get('employees_companies').then(res => {
          this.companies = res.data.companies
        })
      },
      getEmployee(){
        axios.get(`employees/${this.$route.params.id}/edit`).then(res => {
          var e = res.data.employee
          this.company_id = e.company_id
          this.firstname = e.firstname
          this.lastname = e.lastname
          this.email = e.email
          this.phone = e.phone
        })
      }
    },
    mounted(){
      this.getCompanies()
      this.getEmployee()
    }

}
</script>