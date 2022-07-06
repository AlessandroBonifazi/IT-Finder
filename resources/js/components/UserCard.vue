<template>
    <div class="itf-user-card">
        <div class="itf-user-card-header">
            <div class="itf-user-card-header-avatar">
                <img :src="handleImgPath(user.img_path)" />
                <p v-if="user.rating" class="rating">
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
                    <div class="tech-stack-list-item-icon">
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
            right: 0px;
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
