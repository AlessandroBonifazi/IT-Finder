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
                                <label for="user_name" class="itf-form-label"
                                    >Username*</label
                                >
                                <input
                                    type="text"
                                    :class="
                                        !user_nameValidation
                                            ? 'itf-form-control itf-is-invalid'
                                            : 'itf-form-control'
                                    "
                                    id="user_name"
                                    placeholder="user_name"
                                    v-model="user_name"
                                    required
                                    @keyup="
                                        () => {
                                            user_name.length > 0
                                                ? (user_nameValidation = true)
                                                : (user_nameValidation = false);
                                        }
                                    "
                                />
                                <div
                                    class="itf-invalid-feedback"
                                    v-if="!user_nameValidation"
                                >
                                    {{ user_nameValidationMessage }}
                                </div>
                            </div>
                            <div class="itf-form-box">
                                <label for="email" class="itf-form-label"
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
                                <label for="password" class="itf-form-label"
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
                            <div class="itf-form-box">
                                <label
                                    for="password-confirmation"
                                    class="itf-form-label"
                                    >confirm password*</label
                                >
                                <input
                                    type="password"
                                    :class="
                                        !password_confirmationValidation
                                            ? 'itf-form-control itf-is-invalid'
                                            : 'itf-form-control'
                                    "
                                    id="password_confirmation"
                                    placeholder="password"
                                    v-model="password_confirmation"
                                    required
                                    @keyup="
                                        () => {
                                            password_confirmation.length > 0
                                                ? (password_confirmationValidation = true)
                                                : (password_confirmationValidation = false);
                                        }
                                    "
                                />
                                <div
                                    class="itf-invalid-feedback"
                                    v-if="!password_confirmationValidation"
                                >
                                    {{ password_confirmationValidationMessage }}
                                </div>
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        register();
                                    }
                                "
                            >
                                REGISTER
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
            user_name: "",
            password: "",
            password_confirmation: "",
            email: "",
            user_nameValidation: true,
            passwordValidation: true,
            password_confirmationValidation: true,
            emailValidation: true,
            user_nameValidationMessage: "User name is required",
            passwordValidationMessage: "Password is required",
            password_confirmationValidationMessage:
                "Password confirmation is required",
            emailValidationMessage: "Email is required",
        };
    },
    methods: {
        register() {
            if (!this.validate()) {
                return;
            }
            window.axios
                .post(`http://127.0.0.1:8000/register`, {
                    user_name: this.user_name,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                    email: this.email,
                })
                .then((response) => {
                    // ! check if registration was successful and reload the page to redirect to complete signup page
                    console.log("register response", response);

                    if (response.status == 201) {
                        window.location.replace(
                            "http://127.0.0.1:8000/user/complete-registration"
                        );
                    } else if (response.data.includes("<!doctype html>")) {
                        window.location.replace(
                            "http://127.0.0.1:8000/user/dashboard"
                        );
                    }
                })
                .catch((error) => {
                    console.log(error.response.data);
                    if (error.response.data.errors.user_name) {
                        this.user_nameValidationMessage =
                            error.response.data.errors.user_name[0];
                        this.user_nameValidation = false;
                    } else {
                        this.user_nameValidation = true;
                    }
                    if (error.response.data.errors.password) {
                        this.passwordValidationMessage =
                            error.response.data.errors.password[0];
                        this.passwordValidation = false;
                    } else {
                        this.passwordValidation = true;
                    }
                    if (error.response.data.errors.password_confirmation) {
                        this.password_confirmationValidationMessage =
                            error.response.data.errors.password_confirmation[0];
                        this.password_confirmationValidation = false;
                    } else {
                        this.password_confirmationValidation = true;
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
        validate() {
            if (
                // general validation
                this.user_name === "" ||
                this.password === "" ||
                this.password_confirmation === "" ||
                this.email === ""
            ) {
                // user name validation ===========================
                this.user_name === ""
                    ? (this.user_nameValidation =
                          false &&
                          (this.user_nameValidationMessage =
                              "Username is required"))
                    : (this.user_nameValidation = true);

                // password validation ===========================
                this.password === ""
                    ? (this.passwordValidation =
                          false &&
                          (this.passwordValidationMessage =
                              "Password is required"))
                    : (this.passwordValidation = true);

                // password confirmation validation ===========================
                this.password_confirmation === ""
                    ? (this.password_confirmationValidation =
                          false &&
                          (this.password_confirmationValidationMessage =
                              "Password confirmation is required"))
                    : this.password !== this.password_confirmation
                    ? (this.password_confirmationValidationMessage =
                          "Passwords do not match") &&
                      (this.password_confirmationValidation = false)
                    : (this.password_confirmationValidation = false);

                // email validation ===========================
                this.email === ""
                    ? (this.emailValidation =
                          false &&
                          (this.emailValidationMessage = "Email is required"))
                    : (this.emailValidation = true);

                console.log("user validation:", this.user_nameValidation);
                console.log("password validation:", this.passwordValidation);
                console.log(
                    "password confirmation validation:",
                    this.password_confirmationValidation
                );
                console.log("email validation:", this.emailValidation);
                return false;
            } else {
                return true;
            }
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";
@import "./../../sass/_custom-card.scss";
</style>
