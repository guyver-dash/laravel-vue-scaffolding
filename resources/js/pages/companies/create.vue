<template>
<div>
    <h5>New Company</h5>
    <b-alert variant="success" :show="alertShow" dismissible>Company created successfully.</b-alert>
  <b-form @submit="onSubmit">
    <label class="sr-only" for="inline-form-input-name">Name</label>
    <b-input
      v-model="name"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Company Name"
      required
    ></b-input>
     <b-input
      v-model="address"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Address"
      required
    ></b-input>
    <b-input
      v-model="website"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Website"
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
            alertShow: false,
            name: '',
            address: '',
            website: ''
        }
    },
    methods: {
        onSubmit(evt) {
        evt.preventDefault()
        axios.post('companies', {
                name: this.name,
                address: this.address,
                website: this.website
            }).then(res => {
                this.alertShow = true
            })
      }
    }

}
</script>