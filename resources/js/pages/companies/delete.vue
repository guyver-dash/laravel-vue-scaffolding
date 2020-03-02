<template>
<div>
    <h5>Delete Company</h5>
    <b-alert :variant="variant" :show="warning === true" dismissible>{{ warningContent }}</b-alert>
    <b-alert variant="success" :show="warning === false" dismissible>Company deleted successfuly.</b-alert>
  <b-form @submit="onSubmit" v-if="warning === true">
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
    <b-button variant="danger" type="submit">Confirm Delete</b-button>
  </b-form>
</div>
</template>

<script>
export default {
    data(){
        return {
            variant: 'danger',
            warningContent: 'Are you sure you want to delete?',
            warning: true,
            alertShow: false,
            name: '',
            address: '',
            website: ''
        }
    },
    methods: {
        onSubmit(evt) {
        evt.preventDefault()
        axios.delete(`companies/${this.$route.params.id}`, {
                name: this.name,
                address: this.address,
                website: this.website
            }).then(res => {
                this.warning = false
            }).catch(err => {
               this.variant = 'primary'
              this.warningContent = 'Integrity constraint...'
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