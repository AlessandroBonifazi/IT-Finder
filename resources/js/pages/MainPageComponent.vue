<template>
    <main>
        <div class="container">
            <!-- banner -->
            <div class="row my-5">
                <div class="col-6">
                    <h1>Your Next IT Specialist is Here</h1>
                    <p>Search and find best IT Specialist from all around the world for your one million project idea or business</p>
                    <button class="btn">Discover More</button>
                </div>
            </div>
            <!-- specialist role -->
            <div class="container bg-green my-5">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>What kind of specialist do you need?</h2>
                    </div>
                </div>

                <div class="row flex-wrap justify-content-center">
                    <div class="col-3 text-center my-2"><a href="#">Front-End</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Back-End</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Mobile</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Analyst</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Web Developer</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Web Developer</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Web Developer</a></div>
                    <div class="col-3 text-center my-2"><a href="#">Web Developer</a></div>
                </div>
            </div>
            <!-- promo specialist -->
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>Our best specialist</h2>
                    </div>

                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <button class="btn">Discover More</button>
                    </div>
                </div>
                <!-- specialist banner -->
                <div class="row bg-green my-5">
                    <div class="col-5">
                        <h1>Find the talent needed to get your business growing.</h1>
                        <button class="btn">Get Started</button>
                    </div>
                </div>
                <!-- find next job section -->
                <div class="row my-5">
                    <div class="col-5">
                        <img src="" alt="">
                        <img src="" alt="">
                    </div>
                    <div class="col-5 offset-2 d-flex flex-column">
                        <div class="next-job">
                            <h3>Title</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab magni sapiente neque recusandae reiciendis, perspiciatis magnam ducimus maxime voluptatibus natus!</p>
                        </div>
                        <div class="next-job">
                            <h3>Title</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab magni sapiente neque recusandae reiciendis, perspiciatis magnam ducimus maxime voluptatibus natus!</p>
                        </div>
                        <div class="next-job">
                            <h3>Title</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab magni sapiente neque recusandae reiciendis, perspiciatis magnam ducimus maxime voluptatibus natus!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer -->
            <div class="container my-5">
                <div class="row">
                    footer
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

.bg-green{
    background-color: $green-60;
}
</style>
