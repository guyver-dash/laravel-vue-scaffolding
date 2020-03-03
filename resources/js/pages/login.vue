<template>
  <b-container class="bv-example-row" fluid>
    <b-row align-h="center">
      <b-col cols="4" style="padding-top: 200px;">
        <b-form-input v-model="email" placeholder="Enter your email" class="mb-sm-2" required></b-form-input>
        <b-form-input
          type="password"
          v-model="password"
          placeholder="Password"
          class="mb-sm-2"
          required
        ></b-form-input>
        <b-button variant="primary" @click="submit">Submit</b-button>
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  methods: {
    ...mapActions("users", ["setToken", "setUser"]),
    submit() {
      axios
        .post("login", {
          email: this.email,
          password: this.password
        })
        .then(res => {
          var token = res.data.success.token;
          this.setToken(token);
          this.setUser(res.data.user);
          this.$router.push("/user/dashboard");
        });
    }
  }
};
</script>
