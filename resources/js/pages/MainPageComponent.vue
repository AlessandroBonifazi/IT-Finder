<template>
    <!-- <div>
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
    </div> -->
    <main>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1>Your Next IT Specialist is Here</h1>
                    <p>Search and find best IT Specialist from all around the world for your one million project idea or business</p>
                    <button class="btn">Discover More</button>
                </div>
            </div>
        </div>
    </main>
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

<style lang="scss" scoped>
@import "./../../sass/app";
</style>
