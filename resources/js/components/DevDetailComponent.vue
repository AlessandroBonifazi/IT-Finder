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
            <div class="row justify-content-center">
                <div class="col-11 col-sm-12 col-lg-8 p-0">
                    <!--IMG AND PROFILE-->
                    <div
                        class="row justify-content-center justify-content-sm-start info-block"
                    >
                        <div class="col-5 col-sm-4 col-lg-3 dev-img-rating">
                            <img
                                class="dev-img"
                                :src="handleImgPath(user.img_path)"
                                alt=""
                            />
                            <p class="rating">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-star"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"
                                    />
                                </svg>
                                {{ handleRating(user.valutation) }}
                            </p>
                        </div>

                        <div class="col-12 col-sm-8 col-lg-8">
                            <h1 class="dev-name">
                                {{ user.name }} {{ user.surname }}
                            </h1>
                            <p class="dev-spec">
                                {{
                                    handleSpecializations(user.specializations)
                                }}
                            </p>
                        </div>
                    </div>

                    <!--ABOUT ME-->
                    <div class="about-me col-12 col-md-8 my-4 p-0">
                        <h5 class="krona green-55 my-2">About Me</h5>
                        <p>
                            {{ user.cv }}
                        </p>
                    </div>

                    <!--TECHNOLOGIES STACK-->
                    <div class="technlogies-stack col-12 col-md-8 my-4 p-0">
                        <h5 class="krona green-55 my-2">
                            My Technologies Stack
                        </h5>
                        <div class="tech-stack-list" v-if="user.technologies">
                            <div
                                class="tech-stack-list-item"
                                v-for="tech in user.technologies"
                                :key="tech.name + '-' + user.name"
                            >
                                <div
                                    class="tech-stack-list-item-icon"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    :title="tech.name"
                                >
                                    <img :src="tech.logo" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--PEOPLE'S REVIEWS-->
                    <div
                        class="reviews d-flex flex-column col-12 col-md-10 p-0 my-4"
                    >
                        <div class="d-flex justify-content-between">
                            <h5 class="krona green-55 my-2">
                                {{ user.review_number }} Review{{
                                    user.review_number > 1 ? "s" : ""
                                }}
                            </h5>
                            <button
                                class="itf-btn itf-btn-tertiary itf-btn-small"
                                @click="toggleModal"
                            >
                                Leave a new Review
                            </button>
                        </div>

                        <ReviewsListComponent :reviews="user.reviews" />
                    </div>
                </div>

                <div
                    class="col-11 col-lg-4 p-0 my-1 message-section d-flex flex-column"
                >
                    <LeaveMessageComponent :user_id="user.id" />

                    <!--CONTACT-->
                    <div class="contact-section my-4 p-0">
                        <h5 class="krona green-55 mt-2">How to contact me</h5>

                        <div class="contact d-flex">
                            <a
                                :href="'mailto:' + user.contacts.contact_email"
                                class="raleway clear-grey"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-envelope-fill"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"
                                    />
                                </svg>
                                {{ user.contacts.contact_email }}</a
                            >
                        </div>

                        <div class="contact">
                            <a
                                :href="user.contacts.linkedin"
                                class="raleway clear-grey"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-linkedin"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
                                    />
                                </svg>
                                Linkedin</a
                            >
                        </div>

                        <div class="contact d-flex">
                            <a
                                :href="user.contacts.github"
                                class="raleway clear-grey"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-github"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
                                    />
                                </svg>
                                Github
                            </a>
                        </div>

                        <div class="contact d-flex">
                            <a
                                :href="user.contacts.site"
                                class="raleway clear-grey"
                            >
                                <i class="fa fa-desktop"></i>
                                Site
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <LeaveReviewPopup
            :user_id="user.id"
            v-if="isReviewModalVisible"
            @closeModal="toggleModal"
            @reviewPosted="updateData"
        />
    </div>
</template>

<script>
import ReviewsListComponent from "./ReviewsListComponent.vue";
import LeaveMessageComponent from "./LeaveMessageComponent.vue";
import LeaveReviewPopup from "./LeaveReviewPopup.vue";

export default {
    name: "DevDetailComponent",
    data() {
        return {
            userId: this.$route.params.id,
            user: {},
            isReviewModalVisible: false,
        };
    },
    components: {
        ReviewsListComponent,
        LeaveMessageComponent,
        LeaveReviewPopup,
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
        updateData() {
            this.getUser();
        },
        handleImgPath(imgPath) {
            if (imgPath.includes("http") && !imgPath.includes("licdn.com")) {
                imgPath = imgPath.split("/");
                imgPath[imgPath.length - 1] = "300";
                imgPath[imgPath.length - 2] = "300";
                imgPath = imgPath.join("/");
                return imgPath;
            } else if (imgPath.includes("img_path")) {
                return "/storage/" + imgPath;
            } else if (imgPath.includes("licdn.com")) {
                return imgPath;
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
        toggleModal() {
            this.isReviewModalVisible = !this.isReviewModalVisible;
        },
        handleRating(rating) {
            if (rating == null) return "/";
            return rating.toFixed(1);
            // return Math.round(rating);
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
.tech-stack-list {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    flex-wrap: wrap;
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
.info-block {
    display: flex;
    justify-content: space-between;
    align-items: center;
    // margin-top: -40px;
}
.dev-img-rating {
    z-index: 1;
    position: relative;
    top: -20px;

    @include media-breakpoint-up(md) {
        top: -50px;
    }
}
.dev-img {
    width: 100%;
    aspect-ratio: 1;
    // height: 100%;
    border-radius: 50%;
    object-fit: cover;
}
.dev-name {
    font-size: 1.3rem;
    font-weight: bold;
    color: $fc-grey-dark;
    font-family: $ff-heading;
    margin-top: 24px;

    @include media-breakpoint-up(md) {
        font-size: 1.7rem;
    }
    @include media-breakpoint-up(lg) {
        font-size: 2rem;
    }
}
.dev-spec {
    font-size: 0.9rem;
    color: $fc-grey-dark;
    margin-top: -10px;
    line-height: 1.1;
    @include media-breakpoint-up(md) {
        font-size: 1.2rem;
    }
}
.rating {
    position: absolute;
    color: $fc-grey-dark;
    background-color: $yellow-50;
    font-family: $ff-body;
    font-weight: 600;
    font-size: 18px;
    right: 0px;
    top: 18px;
    padding: 3px 10px 5px 10px;
    border-radius: 140px;
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
.contact {
    a {
        color: $fc-grey-clear;
        font-family: $ff-body;
        font-weight: 500;
        font-size: 16px;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
        margin: 5px 0;

        &:hover {
            color: $fc-accent-yellow;
        }
    }
}
</style>
