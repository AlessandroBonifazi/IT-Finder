<template>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Position</th>
                <th scope="col">Job Experience</th>
                <th scope="col">Location</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Github</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ user.id }}</th>
                <td>{{ user.name }}</td>
                <td>{{ user.surname }}</td>
                <td>{{ user.position }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    name: "UserDashboard",
    data() {
        return {
            user: {},
            userId: this.$route.params.id,
        };
    },
    mounted() {
        this.getId().then(() => {
            this.getUser();
        });
        console.log(this.userId);
        // this.getUser();
    },

    methods: {
        getUser() {
            window.axios
                .get("http://127.0.0.1:8000/api/user/", { id: this.userId })
                .then((response) => {
                    this.user = response.data;
                    console.log(this.user);
                });
        },
        getId() {
            this.userId = this.$route.params.id;
        },
    },
};
</script>

<style lang="scss" scoped></style>
