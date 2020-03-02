<template>
<div>
    <h5>New Employee</h5>
    <b-alert variant="success" :show="alertShow" dismissible>Employee created successfully.</b-alert>
  <b-form @submit="onSubmit">
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
    <b-button variant="primary" type="submit">Save</b-button>
  </b-form>
</div>
</template>

<script>
export default {
    data(){
        return {
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
        axios.post('employees', {
                company_id: this.company_id,
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                phone: this.phone
            }).then(res => {
                this.alertShow = true
            })
      },
      getCompanies(){
        axios.get('employees_companies').then(res => {
          this.companies = res.data.companies
        })
      }
    },
    mounted(){
      this.getCompanies()
    }

}
</script>