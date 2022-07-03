<template>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="row justify-content-between">
                    <!-- LOGO -->
                    <div class="col-3">
                        <a href="/" class="logo-link">
                            <h1><span class="accent">IT</span>Finder</h1>
                        </a>
                    </div>
                    <!-- END LOGO -->

                    <!-- USER CONTROLS -->
                    <div
                        class="col d-flex align-items-center justify-content-end"
                    >
                        <div class="row">
                            <!-- BUTTON -->
                            <div class="col d-md-none">
                                <button
                                    class="itf-btn itf-btn-primary-outline itf-btn-icon"
                                    @click="toggleMenu"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        fill="currentColor"
                                        class="bi bi-list"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
                                        />
                                    </svg>
                                </button>
                            </div>
                            <!-- / BUTTON -->

                            <div class="col d-none d-md-block">
                                <button
                                    class="itf-btn itf-btn-tertiary itf-btn-small"
                                    @click="searchRedirect"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-search"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                                        />
                                    </svg>
                                    Search
                                </button>
                                <button
                                    class="itf-btn itf-btn-tertiary itf-btn-small"
                                    @click="register"
                                >
                                    Register
                                </button>
                                <button
                                    class="itf-btn itf-btn-primary itf-btn-small"
                                    @click="login"
                                >
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- END USER CONTROLS -->
                </div>
            </div>
        </div>

        <div class="row">
            <div
                class="col itf-dropdown-menu"
                :class="isMenuOpen ? ' open' : ' close'"
            >
                <button
                    class="itf-btn itf-btn-primary-outline itf-btn-icon close-btn"
                    @click="toggleMenu"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-x-lg"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"
                        />
                    </svg>
                </button>
                <div class="itf-dd-menu-item">
                    <a href="/">Home</a>
                </div>
                <div class="itf-dd-menu-item">
                    <a href="/search">Search for IT masters</a>
                </div>
                <div class="itf-dd-menu-item">
                    <a href="/register-front">Join our specialists</a>
                </div>
                <div class="itf-dd-menu-item">
                    <a href="/login">Enter your profile</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            user: {},
            isMenuOpen: false,
        };
    },
    methods: {
        logout() {
            window.axios.post("/logout").then(() => {
                // this.$router.push("/");
            });
        },
        login() {
            this.$router.push("/login");
        },
        register() {
            this.$router.push("/register-front");
            // window.location.reload();
        },
        searchRedirect() {
            this.$router.push("/search");
        },
        toggleMenu() {
            console.log("toggle");

            this.isMenuOpen = !this.isMenuOpen;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

.logo-link {
    text-decoration: none;
    color: $fc-accent-green;
    font-family: $ff-heading;

    &:hover {
        color: $fc-accent-green;
        text-decoration: none;
    }
    h1 {
        font-size: 1.5rem;
        margin: 10px 0;
    }
    .accent {
        color: $fc-accent-yellow;
    }

    @include media-breakpoint-up(sm) {
        h1 {
            font-size: 1.5rem;
        }
    }
    @include media-breakpoint-up(md) {
        h1 {
            font-size: 2.5rem;
        }
    }
}
.itf-dropdown-menu {
    position: absolute;
    // top: -100vh;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: $bg-secondary;
    z-index: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
    transition: all 0.3s ease-in-out;

    &.open {
        top: 0;
        // animation: enterMenu 0.3s ease-in-out alternate;
    }
    &.close {
        top: -100vh;
        // animation: leaveMenu 0.3s ease-in-out alternate;
    }

    .close-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
    }

    .itf-dd-menu-item {
        margin: 10px 0;
        a {
            text-decoration: none;
            color: $fc-accent-green;
            font-family: $ff-heading;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.18s ease-in-out;
            &:hover {
                color: $fc-accent-yellow;
                text-decoration: none;
            }
        }
    }
}
@keyframes enterMenu {
    0% {
        top: -100vh;
    }
    100% {
        top: 0;
    }
}
@keyframes leaveMenu {
    0% {
        top: 0;
    }
    100% {
        top: -100vh;
    }
}
</style>
