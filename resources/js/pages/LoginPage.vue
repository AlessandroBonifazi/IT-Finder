<template>
    <div class="container-fluid position-relative">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <HeaderComponent class="position-absolute" />
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-end vh-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="itf-card">
                            <div class="itf-card-header">
                                <h3 class="itf-card-title">Login</h3>
                            </div>
                            <div class="itf-card-body">
                                <div class="mb-3 d-flex flex-column">
                                    <div class="itf-form-box">
                                        <label
                                            for="email"
                                            class="itf-form-label"
                                            >email*</label
                                        >
                                        <input
                                            type="text"
                                            :class="
                                                !emailValidation
                                                    ? 'itf-form-control itf-is-invalid'
                                                    : 'itf-form-control'
                                            "
                                            id="email"
                                            placeholder="email"
                                            v-model="email"
                                            required
                                            @keyup="
                                                () => {
                                                    email.length > 0
                                                        ? (emailValidation = true)
                                                        : (emailValidation = false);
                                                }
                                            "
                                        />
                                        <div
                                            class="itf-invalid-feedback"
                                            v-if="!emailValidation"
                                        >
                                            {{ emailValidationMessage }}
                                        </div>
                                    </div>

                                    <div class="itf-form-box">
                                        <label
                                            for="password"
                                            class="itf-form-label"
                                            >password*</label
                                        >
                                        <input
                                            type="password"
                                            :class="
                                                !passwordValidation
                                                    ? 'itf-form-control itf-is-invalid'
                                                    : 'itf-form-control'
                                            "
                                            id="password"
                                            placeholder="password"
                                            v-model="password"
                                            required
                                            @keyup="
                                                () => {
                                                    password.length > 0
                                                        ? (passwordValidation = true)
                                                        : (passwordValidation = false);
                                                }
                                            "
                                        />
                                        <div
                                            class="itf-invalid-feedback"
                                            v-if="!passwordValidation"
                                        >
                                            {{ passwordValidationMessage }}
                                        </div>
                                    </div>

                                    <button
                                        class="itf-btn itf-btn-primary"
                                        @click="
                                            () => {
                                                login();
                                            }
                                        "
                                    >
                                        LOGIN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-img-container">
            <img
                src="https://images.unsplash.com/photo-1580894908361-967195033215?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                alt=""
            />
            <div class="linear"></div>
        </div>
    </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
export default {
    name: "LoginPage",
    data() {
        return {
            email: "",
            password: "",
            emailValidation: true,
            passwordValidation: true,
            passwordValidationMessage: "Password is required",
            emailValidationMessage: "Email is required",
        };
    },
    components: {
        HeaderComponent,
    },
    methods: {
        login() {
            window.axios
                .post(`http://127.0.0.1:8000/login`, {
                    password: this.password,
                    email: this.email,
                })
                .then((response) => {
                    if (response.status == 200 || response.status == 204) {
                        window.location.replace(
                            "http://127.0.0.1:8000/user/dashboard"
                        );
                    }
                    console.log(response);
                })
                .catch((error) => {
                    console.log(error.response.data);

                    if (error.response.data.errors.password) {
                        this.passwordValidationMessage =
                            error.response.data.errors.password[0];
                        this.passwordValidation = false;
                    } else {
                        this.passwordValidation = true;
                    }

                    if (error.response.data.errors.email) {
                        this.emailValidationMessage =
                            error.response.data.errors.email[0];
                        this.emailValidation = false;
                    } else {
                        this.emailValidation = true;
                    }
                });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";
@import "./../../sass/_custom-card.scss";

.login-img-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;

    img {
        width: 60%;
        height: 100%;
        object-fit: cover;
    }
    .linear {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            270deg,
            #f2f4f3 44.91%,
            rgba(249, 246, 255, 0) 70.1%
        );
    }
}
</style>
