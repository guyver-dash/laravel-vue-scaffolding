<template>
    <div>
        <input type="texbox" v-model="email" /> <br />
        <input type="password" v-model="password" />
        <button @click="submit">Submit</button>
        <button @click="showLogin">Show Login</button>
    </div>
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
        ...mapActions("users", ["setToken"]),
        submit() {
            axios
                .post("login", {
                    email: this.email,
                    password: this.password
                })
                .then(res => {
                    var token = res.data.success.token;
                    this.setToken(token);
                });
        },
        showLogin() {
            axios.get("users");
        }
    }
};
</script>
