<template>
    <div class="m-0 p-0" @wheel="getScrollPosition">
        <div class="hero">
            <HeaderComponent />
            <div class="hero-img-bg d-none d-md-block">
                <div class="hero-color-bg"></div>
            </div>
            <div class="hero-img-bg-full d-md-none">
                <div class="hero-color-bg-full"></div>
            </div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div
                        class="col-12 col-md-7 hero-content text-center text-md-left"
                    >
                        <h1 class="hero-title itf-main-title">
                            Your Next
                            <span class="hero-title__accent itf-main-title">
                                IT </span
                            >Specialist is Here
                        </h1>
                        <p class="hero-subtitle itf-subtitle">
                            Search and find best IT Specialist from all around
                            the world for your one million project idea or
                            business
                        </p>
                        <button
                            class="itf-btn itf-btn-primary"
                            @click="redirectSearch"
                        >
                            Discover More
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- specialist role -->
        <div class="wave-top">
            <img src="img\Vector.svg" alt="" />
        </div>
        <div class="container-fluid green-bg">
            <div class="row">
                <div class="container container-md">
                    <div class="row">
                        <div class="col-12 col-md-12 text-center mb-4">
                            <h2 class="itf-section-title-yellow itf-main-title">
                                What kind of specialist do you need?
                            </h2>
                        </div>
                    </div>
                    <div class="row flex-wrap justify-content-center">
                        <div
                            v-for="spec in specializations"
                            :key="spec"
                            class="col col-md search-tile"
                            @click="
                                () => {
                                    redirectSearchAdvanced(spec);
                                }
                            "
                        >
                            <h3>{{ spec }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wave-bottom">
            <img src="img\Vector-1.svg" alt="" />
        </div>

        <!-- promo specialist -->
        <div class="container container-md best-spec-container">
            <div class="row">
                <div class="col-12 col-md-12 text-center">
                    <h2 class="krona green-55">Our best specialist</h2>
                </div>
            </div>

            <div class="row users-wrapper justify-content-center flex-wrap">
                <div
                    class="col-11 col-md-6 col-lg-4 mb-4 d-flex"
                    :key="user.id"
                    v-for="user in users"
                >
                    <UserCard :user="user" />
                </div>
            </div>

            <div class="col-12 col-md-12 d-flex justify-content-center">
                <button class="itf-btn itf-btn-primary" @click="redirectSearch">
                    Discover More
                </button>
            </div>
        </div>
        <!-- specialist banner -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-12 specialist-banner">
                    <div class="col-12 col-md-6 specialist-banner-content">
                        <h3>
                            Find the talent needed to get your business
                            <span class="accent">growing</span>.
                        </h3>
                        <button
                            class="itf-btn itf-btn-tertiary"
                            @click="redirectSearch"
                        >
                            Get Started
                        </button>
                    </div>
                    <div class="col-6 d-none d-md-block specialist-banner-img">
                        <img src="img\woman-banner.png" alt="" />
                    </div>
                </div>
            </div>
        </div>

        <!-- find next job section -->
        <div class="container">
            <div class="row my-5 py-5 justify-content-center">
                <div class="col-11 col-lg-6 p-0">
                    <h2 class="krona green-55 mb-5">Find your next job</h2>
                    <img class="frame-28" src="img\Frame 28.png" alt="" />
                    <img
                        class="position-absolute frame-29"
                        src="img\Frame 29.png"
                        alt=""
                    />
                </div>
                <div class="col-11 col-lg-5 d-flex flex-column">
                    <div class="next-job">
                        <h3 class="krona green-55">Title</h3>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Ab magni sapiente neque recusandae reiciendis,
                            perspiciatis magnam ducimus maxime voluptatibus
                            natus!
                        </p>
                    </div>
                    <div class="next-job">
                        <h3 class="krona green-55">Title</h3>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Ab magni sapiente neque recusandae reiciendis,
                            perspiciatis magnam ducimus maxime voluptatibus
                            natus!
                        </p>
                    </div>
                    <div class="next-job">
                        <h3 class="krona green-55">Title</h3>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Ab magni sapiente neque recusandae reiciendis,
                            perspiciatis magnam ducimus maxime voluptatibus
                            natus!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <a href="#" @click="logout">logout</a> -->
        <FooterComponent />
        <ScrollerComponent :scrollPosition="scrollPosition" />
    </div>
</template>

<script>
import HeaderComponent from "./../components/HeaderComponent.vue";
import UserCard from "./../components/UserCard.vue";
import FooterComponent from "./../components/FooterComponent.vue";
import ScrollerComponent from "./../components/ScrollerComponent.vue";
export default {
    name: "MainPage",
    data() {
        return {
            users: {},
            specializations: [
                "DevOps Developer",
                "Web Design",
                "Front-End Developer",
                "Back-End Developer",
                "Mobile Developer",
                "Software Developer",
                "Game Developer",
            ],
            scrollPosition: 0,
        };
    },
    mounted() {
        this.getUsers();
        // this.getSpecializations();
    },

    methods: {
        redirectSearch() {
            this.$router.push("/search");
        },
        redirectSearchAdvanced(name) {
            name = name.replace(/\s/g, "%20");
            this.$router.push(`/search/${name}`);
        },
        logout() {
            window.axios.post("/logout").then(() => {
                // this.$router.push("/");
                console.log("logout");
            });
        },
        getUsers() {
            window.axios
                .get("/api/best-users")
                .then((response) => {
                    this.users = response.data;
                    console.log(this.users);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSpecializations() {
            window.axios
                .get("/api/specializations")
                .then((response) => {
                    this.specializations = response.data;
                    console.log(this.specializations);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getScrollPosition() {
            this.scrollPosition = window.scrollY;
            // console.log(this.scrollPosition);
        },
    },
    components: {
        HeaderComponent,
        FooterComponent,
        ScrollerComponent,
        UserCard,
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

.hero {
    height: 100vh;
    width: 100%;
    position: relative;

    @include media-breakpoint-up(md) {
        height: 80vh;
    }

    &-img-bg {
        background: url("../../../public/img/hero-img.jpg") no-repeat center
            center;
        background-size: cover;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 60%;
        height: 100%;
        z-index: -1;
        .hero-color-bg {
            background: linear-gradient(
                90deg,
                $bg-secondary 12.91%,
                rgba(249, 246, 255, 0) 40.1%
            );
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    }
    &-img-bg-full {
        background: url("../../../public/img/hero-img.jpg") no-repeat center
            center;
        background-size: cover;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: -1;

        .hero-color-bg-full {
            background: #f2f4f3da;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    }
    .hero-title {
        font-family: $ff-heading;
        font-weight: bold;
        color: $green-70;
        .hero-title__accent {
            color: $fc-accent-yellow;
        }
    }
    .hero-subtitle {
        font-family: $ff-body;
        font-weight: normal;
        color: $fc-grey-dark;
        margin: 30px 0 40px 0;
    }
}
.wave-top {
    overflow: hidden;
    margin: -2px 0;
    margin-top: -130px;
    z-index: -1;
    img {
        width: 110%;
    }
}
.wave-bottom {
    overflow: hidden;
    margin: -2px 0;
    z-index: -1;
    img {
        width: 110%;
    }
}
.green-bg {
    background: $green-70;
    min-height: 40vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.itf-section-title-yellow {
    color: $fc-accent-yellow;
    font-family: $ff-heading;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 30px;
}
.search-tile {
    background: $green-60;
    min-width: 250px;
    max-width: 300px;
    height: 50px;
    margin: 5px;
    border-radius: 10px;
    box-shadow: 0px 8px 15px 2px rgba(27, 54, 50, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease-in-out;
    &:hover {
        cursor: pointer;
        background: $green-70;
        transform: scale(0.98);
        box-shadow: 0px 4px 10px -2px rgba(27, 54, 50, 0.7);
    }
    h3 {
        font-family: $ff-heading;
        font-size: 0.8rem;
        font-weight: 500;
        color: $green-40;
        margin: 0;
    }
}
.best-spec-container {
    padding: 100px 0;
}
.users-wrapper {
    // display: flex;
    // flex-wrap: wrap;
    // justify-content: center;
    margin-top: 50px;
    margin-bottom: 50px;
    // gap: 20px;
}
.specialist-banner {
    margin-top: 100px;
    height: 400px;
    width: 100%;
    background: linear-gradient(262.45deg, #3d7068 -1.43%, #14453d 102.55%);
    overflow: hidden;
    position: relative;
    border-radius: $border-radius;
    display: flex;
    padding: 0 36px;

    .specialist-banner-content {
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
        align-items: flex-start;
        height: 100%;
        padding: 0px;
        width: 100%;

        h3 {
            font-family: $ff-heading;
            font-size: 1.5rem;
            font-weight: bold;
            color: $white;
            margin: 0;

            .accent {
                color: $fc-accent-yellow;
            }
        }
        @include media-breakpoint-up(sm) {
            h3 {
                font-size: 2rem;
            }
        }
    }
    .specialist-banner-img {
        margin-bottom: -2%;
        // overflow: hidden;
        img {
            position: absolute;
            bottom: -2%;
            right: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }
}

//UTILITIES
.krona {
    font-family: $ff-heading;
}
.raleway {
    font-family: $ff-body;
}
.green-40 {
    color: $green-40;
}
.green-55 {
    color: $green-55;
}
.bg-green-55 {
    background-color: $green-55;
}
.bg-green-60 {
    background-color: $green-60;
}
.yellow-50 {
    color: $fc-accent-yellow;
}
.yellow-60 {
    color: $yellow-60;
}
.bg-green-50 {
    background-color: $green-50;
}

//BODY
.specialist a:hover {
    color: white;
}
.discover {
    background-color: $btn-primary-bg;
    font-size: 20px;
    box-shadow: $box-shadow-secondary;
}
.discover:hover {
    background-color: $btn-primary-bg-hoover;
}
.discover:active {
    background-color: $btn-primary-bg-active;
    color: white;
}
.get-started {
    background-color: $btn-tertiary-bg;
    font-size: 20px;
}
.discover,
.get-started {
    color: white;
    border: none;
    border-radius: 8px;
}
.find-talent {
    border-radius: 8px;
}
.find-talent-title {
    color: white;
    font-size: 30px;
}
.talent-img img {
    height: 392px;
    justify-content: center;
}
.jumbotron {
    width: 100px;
    height: 100px;
}
.frame-28 {
    height: 60%;
}
.frame-29 {
    height: 28%;
    right: 37px;
    top: 324px;
}
</style>
