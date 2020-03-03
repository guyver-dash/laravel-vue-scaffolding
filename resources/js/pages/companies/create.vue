<template>
<div>
    <h5>New Company</h5>
    <b-alert variant="success" :show="alertShow" dismissible>Company created successfully.</b-alert>
  <!-- <b-form @submit="onSubmit">
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
  </b-form> -->
  <form-generic :company="company" ref="company">
    <b-button variant="primary" type="submit">Save</b-button>
  </form-generic>
</div>
</template>

<script>
import formGeneric from './form/generic'
import { mapState } from 'vuex'
export default {
    components: {
      formGeneric
    },
    data(){
        return {
            alertShow: false
        }
    },
    computed: {
      ...mapState('company', ['company'])
    }

}
</script>