<template>
    <div>
        <p>
            Welcome to Dashboard <b-button pill variant="outline-danger" @click="logout">Logout</b-button>
        </p>
        <div style="float: left">
            <b-list-group>
            <b-list-group-item  to="/dashboard/companies">All Companies</b-list-group-item>
            <b-list-group-item  to="/dashboard/employees">All Employees</b-list-group-item>
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
import { mapActions } from 'vuex'
export default {

    methods: {
         ...mapActions("users", ["setToken"]),
        logout(){
            axios.post(`logout`).then(res => {
                 this.setToken(null)
                 this.$router.push({
                     path: '/'
                 })
            })
        }
    }
};
</script>
