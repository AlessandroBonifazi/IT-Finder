<template>
    <div class="col-12 bg-green-55">
        <div class="footer-middle">
            <div class="container">
                <div class="row p-5 justify-content-between">
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Contacts</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/tymofyeyev/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Mykhaylo Tymofyeyev</a
                                    >
                                </li>
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/erik-schievenin-8971256b/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Erik Schievenin</a
                                    >
                                </li>
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/alessandro-bonifazi-0693b6217/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Alessandro Bonifazi</a
                                    >
                                </li>
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/robin-costanzo-0502a11b9/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Robin Costanzo</a
                                    >
                                </li>
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/gioia-ascari-978199196/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Gioia Ascari</a
                                    >
                                </li>
                                <li>
                                    <i class="fa-brands fa-linkedin-in"></i>
                                    <a
                                        href="https://www.linkedin.com/in/antonio-iorio-8954bb242/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Antonio Iorio</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Services</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#" @click="register"> Register </a>
                                </li>
                                <li>
                                    <a href="#" @click="login"> Login </a>
                                </li>

                                <li>
                                    <a href="#" @click="searchRedirect">
                                        Search your specialist
                                    </a>
                                </li>
                            </ul>
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

h4 {
    color: $yellow-60;
    font-family: $ff-heading;
}
a {
    color: $white;
}
i {
    background-color: $green-60;
    padding: 8px;
    border-radius: 50%;
    color: $yellow-60;
    margin-bottom: 3px;
    margin-right: 3px;
}
.copyright {
    color: $yellow-60;
}
</style>
