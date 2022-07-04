<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="itf-breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a
                                    href="#"
                                    @click.prevent="
                                        () => {
                                            $router.go(-1);
                                        }
                                    "
                                    >Search</a
                                >
                            </li>
                            <li
                                class="breadcrumb-item active"
                                aria-current="page"
                            >
                                {{ user.name }} {{ user.surname }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row jumbotron m-0"></div>
        <div class="container">
            <div class="row">
                <div class="col-8 p-0">
                    <!--IMG AND PROFILE-->
                    <div class="row info-block">
                        <div class="col-3 dev-img-rating">
                            <img
                                class="dev-img"
                                :src="handleImgPath(user.img_path)"
                                alt=""
                            />
                            <p class="rating">4.5</p>
                        </div>

                        <div class="col-9 info align-self-center mt-3">
                            <h1 class="krona dark-grey">
                                {{ user.name }} {{ user.surname }}
                            </h1>
                            <p class="raleway coral-50">
                                {{
                                    handleSpecializations(user.specializations)
                                }}
                            </p>
                        </div>
                    </div>

                    <!--ABOUT ME-->
                    <div class="about-me col-8 my-4 p-0">
                        <h5 class="krona green-55 my-2">About Me</h5>
                        <p>
                            {{ user.cv }}
                        </p>
                    </div>

                    <!--TECHNOLOGIES STACK-->
                    <div class="technlogies-stack col-5 my-4 p-0">
                        <h5 class="krona green-55 my-2">
                            My Technologies Stack
                        </h5>
                        <div class="tech-stack-list" v-if="user.technologies">
                            <div
                                class="tech-stack-list-item"
                                v-for="tech in user.technologies"
                                :key="tech.name + '-' + user.name"
                            >
                                <div class="tech-stack-list-item-icon">
                                    <img :src="tech.logo" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--PEOPLE'S REVIEWS-->
                    <div class="reviews d-flex flex-column col-10 p-0 my-4">
                        <div class="d-flex justify-content-between">
                            <h5 class="krona green-55 my-2">
                                People’s Reviews
                            </h5>
                            <button
                                class="itf-btn itf-btn-tertiary itf-btn-small"
                            >
                                Leave a new Review
                            </button>
                        </div>

                        <ReviewsComponent />
                    </div>
                </div>

                <div class="col-4 p-0 message-section d-flex flex-column">
                    <LeaveMessageComponent :user_id="user.id" />

                    <!--CONTACT-->
                    <div class="contact-section mt-5 p-0">
                        <h5 class="krona green-55 my-2">How to contact me</h5>

                        <div class="contact d-flex">
                            <p class="mx-2">logo</p>
                            <p class="raleway clear-grey">linkedin</p>
                        </div>

                        <div class="contact d-flex">
                            <p class="mx-2">logo</p>
                            <p class="raleway clear-grey">linkedin</p>
                        </div>

                        <div class="contact d-flex">
                            <p class="mx-2">logo</p>
                            <p class="raleway clear-grey">linkedin</p>
                        </div>

                        <div class="contact d-flex">
                            <p class="mx-2">logo</p>
                            <p class="raleway clear-grey">linkedin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ReviewsComponent from "./ReviewsListComponent.vue";
import LeaveMessageComponent from "./LeaveMessageComponent.vue";

export default {
    name: "DevDetailComponent",
    data() {
        return {
            userId: this.$route.params.id,
            user: {},
        };
    },
    components: {
        ReviewsComponent,
        LeaveMessageComponent,
    },
    mounted() {
        this.getUser();
    },
    methods: {
        getUser() {
            window.axios
                .get(`/api/user/${this.userId}`)
                .then((response) => {
                    console.log(response.data);
                    this.user = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleImgPath(imgPath) {
            if (imgPath.includes("http")) {
                imgPath = imgPath.split("/");
                imgPath[imgPath.length - 1] = "300";
                imgPath[imgPath.length - 2] = "300";
                imgPath = imgPath.join("/");
                return imgPath;
            } else if (imgPath.includes("img_path")) {
                return "/storage/" + imgPath;
            } else {
                return "https://via.placeholder.com/150";
            }
        },
        handleSpecializations(specialization) {
            let render = "";
            specialization.forEach((specialization) => {
                render += specialization.specialization + " | ";
            });
            render = render.slice(0, -2);
            return render;
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

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
.yellow-60 {
    color: $yellow-60;
}
.bg-green-50 {
    background-color: $green-50;
}
.clear-grey {
    color: $fc-grey-clear;
}
.dark-grey {
    color: $fc-grey-dark;
}
//BODY
.info-block {
    margin-top: -40px;
}
.dev-detail-container {
    margin-right: 0px;
}
.tech-stack-list {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    gap: 5px;

    &-item {
        display: flex;
        justify-content: flex-start;
        align-items: center;

        &-icon {
            width: 40px;
            height: 40px;
            overflow: hidden;

            & img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }
}
.itf-breadcrumb {
    list-style: none;
    margin: 0 10px;
    padding: 0;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}
.jumbotron {
    width: 100%;
    background: url("/img/Wonder.png") no-repeat center;
    background-size: cover;
    height: 250px;
    border-radius: 0%;
}
.dev-img-rating {
    z-index: 1;
    position: relative;
    top: -50px;
}
.dev-img {
    width: 100%;
    aspect-ratio: 1;
    // height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
.rating {
    position: absolute;
    color: $fc-grey-dark;
    background-color: $yellow-50;
    font-family: $ff-body;
    font-weight: 600;
    font-size: 18px;
    right: 18px;
    top: 18px;
    padding: 3px 10px 5px 10px;
    border-radius: 140px;
}
.btn {
    background-color: $btn-tertiary-bg;
    color: white;
    border-radius: 8px;
    box-shadow: $box-shadow-primary;
}
.btn:hover {
    background-color: $btn-tertiary-bg-hoover;
}
.btn:active {
    background-color: $btn-tertiary-bg-active;
}
.about-me p {
    font-size: 14px;
}
.message-section {
    border-radius: 8px;
}
.contact-section h5 {
    font-size: 14px;
}
</style>
