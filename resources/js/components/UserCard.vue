<template>
    <div class="itf-user-card">
        <div class="itf-user-card-header">
            <div class="itf-user-card-header-avatar">
                <img :src="handleImgPath(user.img_path)" />
                <p v-if="user.rating" class="rating">
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
                    {{ handleRating(user.rating) }}
                </p>
            </div>
            <div class="itf-user-card-header-content">
                <h2 class="itf-name">
                    {{ user.name }} {{ user.surname }}
                    <!-- {{ user.reviews[0].valutation }} -->
                </h2>
                <h3 class="itf-position" v-if="user.specializations[0]">
                    <!-- {{ user.specializations[0].specialization }} -->
                    {{ handleSpecializations(user.specializations) }}
                </h3>
                <p class="experience">
                    +{{ user.job_experience }} anni di esperienza
                </p>
            </div>
        </div>
        <div class="itf-user-card-body">
            <div class="tech-stack-list" v-if="user.technologies">
                <div
                    class="tech-stack-list-item"
                    v-for="tech in user.technologies.slice(0, 5)"
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
            <div class="description">
                <p>
                    {{ user.cv }}
                </p>
            </div>
        </div>
        <div class="button-section">
            <button
                @click="viewProfile"
                class="itf-btn itf-btn-primary-outline itf-btn-full-width itf-btn-small"
            >
                View Profile
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserCard",
    props: {
        user: {
            type: Object,
            required: true,
        },
    },
    methods: {
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
        viewProfile() {
            this.$router.push({
                name: "dev-detail",
                params: {
                    id: this.user.id,
                },
            });
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
.itf-user-card {
    position: relative;
    background: $white;
    border-radius: $border-radius-small;
    box-shadow: $box-shadow-primary;
    padding: 20px;
    flex-basis: auto;
    width: 300px;
    overflow: hidden;
    // max-width: 400px;
    flex: 1 1 300px;
    align-self: stretch;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: stretch;
}
.itf-user-card-header {
    &-avatar {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        margin-bottom: 20px;
        position: relative;

        & img {
            border-radius: 50%;
            width: 100%;
            overflow: hidden;
            height: 100%;
            object-fit: cover;
        }
        .rating {
            position: absolute;
            color: $fc-grey-dark;
            background-color: $yellow-50;
            font-family: $ff-body;
            font-weight: 600;
            font-size: 12px;
            right: -20px;
            top: 0px;
            padding: 3px 10px 5px 10px;
            border-radius: 140px;
        }
    }
    &-content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;

        .itf-name {
            font-size: 1.2rem;
            font-weight: bold;
            font-family: $ff-heading;
            color: $fc-grey-dark;
            text-align: center;
        }
        .itf-position {
            font-size: 0.8rem;
            font-weight: 500;
            font-family: $ff-body;
            color: $fc-accent-green;
            text-align: center;
        }
        .experience {
            font-size: 0.8rem;
            font-weight: 400;
            font-family: $ff-body;
        }
    }
}
.itf-user-card-body {
    .tech-stack-list {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;

        &-item {
            width: 40%;
            display: flex;
            justify-content: flex-start;
            align-items: center;

            &-icon {
                width: 40px;
                height: 40px;
                overflow: hidden;
                margin: 0 auto;

                & img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }
        }
    }
    .description {
        margin-top: 20px;
        font-size: 0.8rem;
        font-weight: 400;
        font-family: $ff-body;
        text-align: justify;
    }
}
</style>
