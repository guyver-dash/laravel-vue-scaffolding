<template>
<div>
    <h5>Edit Company</h5>
    <b-alert variant="success" :show="alertShow" dismissible>Company updated successfully.</b-alert>
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
    <b-button variant="primary" type="submit">Update</b-button>
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
        axios.put(`companies/${this.$route.params.id}`, {
                name: this.name,
                address: this.address,
                website: this.website
            }).then(res => {
                this.alertShow = true
            })
      },
      getCompany(){
          axios.get(`companies/${this.$route.params.id}/edit`).then(res => {
              var c = res.data.company
              this.name = c.name
              this.address = c.address
              this.website = c.website
          })
      }
    },
    mounted(){
        this.getCompany()
    }

}
</script>