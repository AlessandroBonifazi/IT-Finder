<template>
    <div class="container">
        <div class="row justify-content-end align-items-center vh-100">
            <div class="col-md-6">
                <div class="itf-card">
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">Register</h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="name" class="itf-form-label"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="name"
                                    placeholder="name"
                                    v-model="name"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="email" class="itf-form-label"
                                    >email</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="email"
                                    placeholder="email"
                                    v-model="email"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="password" class="itf-form-label"
                                    >password</label
                                >
                                <input
                                    type="password"
                                    class="itf-form-control"
                                    id="password"
                                    placeholder="password"
                                    v-model="password"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label
                                    for="password-confirmation"
                                    class="itf-form-label"
                                    >confirm password</label
                                >
                                <input
                                    type="password"
                                    class="itf-form-control"
                                    id="password_confirmation"
                                    placeholder="password"
                                    v-model="password_confirmation"
                                />
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        register();
                                    }
                                "
                            >
                                NEXT
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RegisterPage",
    data() {
        return {
            name: "",
            password: "",
            password_confirmation: "",
            email: "",
        };
    },
    methods: {
        register() {
            window.axios
                .post(`http://127.0.0.1:8000/register`, {
                    name: this.name,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    email: this.email,
                })
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";
</style>
