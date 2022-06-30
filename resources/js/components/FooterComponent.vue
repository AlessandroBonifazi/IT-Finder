<template>
    <div class="col-12 bg-green-55">
        <div class="footer-middle">
            <div class="container">
                <div class="row p-5 justify-content-between">
                    <div class="col-md-3 col-sm-6">
                        <!--Column1-->
                        <div class="footer-pad">
                            <h4>Contatti</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <i class="fa fa-linkedin"></i>
                                    <a
                                        href="https://www.linkedin.com/in/tymofyeyev/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Mykhaylo Tymofyeyev</a
                                    >
                                </li>
                                <li>
                                    <i class="fa fa-linkedin"></i>
                                    <a
                                        href="https://www.linkedin.com/in/erik-schievenin-8971256b/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Erik Schievenin</a
                                    >
                                </li>
                                <li>
                                    <i class="fa fa-linkedin"></i>
                                    <a
                                        href="https://www.linkedin.com/in/alessandro-bonifazi-0693b6217/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Alessandro Bonifazi</a
                                    >
                                </li>
                                <li>
                                    <i class="fa fa-linkedin"></i>
                                    <a
                                        href="https://www.linkedin.com/in/robin-costanzo-0502a11b9/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Robin Costanzo</a
                                    >
                                </li>
                                <li>
                                    <i class="fa fa-linkedin"></i>
                                    <a
                                        href="https://www.linkedin.com/in/gioia-ascari-978199196/"
                                        class="icoLinkedin"
                                        title="Linkedin"
                                        target="_blank"
                                        >Gioia Ascari</a
                                    >
                                </li>
                                <li>
                                    <i class="fa fa-linkedin"></i>
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
                            <h4>Heading 2</h4>
                            <ul class="list-unstyled">
                                <li><a href="#">Website Tutorial</a></li>
                                <li><a href="#">Accessibility</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Webmaster</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <h4>Follow Us</h4>
                        <ul class="social-network social-circle">
                            <li>
                                <a href="#" class="icoFacebook" title="Facebook"
                                    ><i class="fa fa-facebook"></i
                                ></a>
                            </li>
                            <li>
                                <a href="#" class="icoLinkedin" title="Linkedin"
                                    ><i class="fa fa-linkedin"></i
                                ></a>
                            </li>
                        </ul>
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
