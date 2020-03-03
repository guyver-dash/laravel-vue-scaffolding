<template>
    <b-form @submit="onSubmit">
    <b-input
      v-model="company.name"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Company Name"
      required
    ></b-input>
     <b-input
      v-model="company.address"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Address"
      required
    ></b-input>
    <b-input
      v-model="company.website"
      id="inline-form-input-name"
      class="mb-sm-2"
      placeholder="Website"
      required
    ></b-input>
    <slot></slot>
  </b-form>
</template>
<script>
export default {
    props: ['company'],
    data(){
      return {
        locCompany: this.company
      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault()
        axios.post('companies', this.locCompany).then(res => {
                this.alertShow = true
            })
      }
    },
    mounted(){
      this.locCompany = this.company
    }
}
</script>