<template>
    <div>
        <h1>Main</h1>
        <router-link to="/register">register</router-link>
        <button
            @click="
                () => {
                    logout();
                }
            "
        >
            Logout
        </button>
    </div>
</template>

<script>
export default {
    name: "MainPage",
    data() {
        return {
            user: {},
        };
    },
    methods: {
        logout() {
            window.axios.post("/logout").then(() => {
                // this.$router.push("/");
            });
        },
    },
};
</script>

<style></style>
