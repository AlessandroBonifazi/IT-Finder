<template>
    <div class="container-fluid footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                            <h2 class="footer-logo">ITFinder</h2>
                            <p class="footer-description">
                                Welcome to the best place where search for
                                Software Developers, Digital Artists, Designers
                                and others It Specialists all around the world.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                    <h4 class="nav-title">Credits</h4>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/tymofyeyev/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Mykhaylo Tymofyeyev</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/erik-schievenin-8971256b/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Erik Schievenin</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/alessandro-bonifazi-0693b6217/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Alessandro Bonifazi</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/robin-costanzo-0502a11b9/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Robin Costanzo</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/gioia-ascari-978199196/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Gioia Ascari</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                href="https://www.linkedin.com/in/antonio-iorio-8954bb242/"
                                                class="icoLinkedin"
                                                title="Linkedin"
                                                target="_blank"
                                            >
                                                <i
                                                    class="fa-brands fa-linkedin-in"
                                                ></i>
                                                Antonio Iorio</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h4 class="nav-title">Navigation</h4>
                                    <ul class="list-unstyled">
                                        <li>
                                            <a
                                                href="/register-front"
                                                @click="register"
                                            >
                                                Register
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/login" @click="login">
                                                Login
                                            </a>
                                        </li>

                                        <li>
                                            <a
                                                href="/search"
                                                @click="searchRedirect"
                                            >
                                                Search your specialist
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 copy">
                    <p class="text-center copyright">
                        &copy; Made with &hearts;
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "FooterComponent",
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
            this.$router.push("/register");
            // window.location.reload();
        },
        searchRedirect() {
            this.$router.push("/search");
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

.footer {
    background-color: #1d1d1d;
    padding: 30px 0;
}
.footer-logo {
    font-size: 2.5rem;
    color: $white;
    font-weight: bold;
    font-family: $ff-heading;
}
.footer-description {
    color: $fc-grey-clear;
    font-size: 1.2rem;
    font-family: $ff-body;
}
.nav-title {
    color: $white;
    font-size: 1.2rem;
    font-family: $ff-heading;
}

a {
    color: $fc-grey-clear;
    transition: all 0.2s ease-in-out;

    i {
        background-color: $fc-grey-dark;
        padding: 8px 9px;
        border-radius: 50%;
        color: $yellow-50;
        margin-bottom: 3px;
        margin-right: 3px;
        font-size: 0.8rem;
        transition: all 0.2s ease-in-out;
    }
    &:hover {
        color: $fc-accent-yellow;
        text-decoration: none;

        i {
            background-color: $fc-accent-yellow;
            color: $fc-grey-dark;
        }
    }
}
.copyright {
    color: $yellow-60;
}
</style>
