<template>
  <div>
    <p>
      Welcome to Dashboard
      <b-button pill variant="outline-danger" @click="logout">Logout</b-button>
    </p>
    <div style="float: left">
      <b-list-group>
        <b-list-group-item to="/dashboard/companies" v-if="user.company === null">All Companies</b-list-group-item>
        <b-list-group-item to="/dashboard/employees">All Employees</b-list-group-item>
      </b-list-group>
    </div>
    <div style="float: left; padding-left: 10px;">
      <router-view></router-view>
    </div>
    <div style="clear:both"></div>
    <p>Footer</p>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  computed: {
    ...mapState("users", ["user"])
  },
  methods: {
    ...mapActions("users", ["setToken"]),
    logout() {
      axios.post(`logout`).then(res => {
        this.setToken(null);
        this.$router.push({
          path: "/"
        });
      });
    }
  }
};
</script>
