<template>
    <div>
        <p>
            <router-link to="/login/user">Login</router-link>
            <router-link to="/user/dashboard">Dashboard</router-link>
        </p>
        <router-view></router-view>

        <p>Footer</p>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    methods: {
        ...mapActions("users", ["setToken"])
    }
};
</script>
