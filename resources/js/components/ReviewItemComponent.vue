<template>
    <div class="row review-item d-flex py-2">
        <!--INFO-->
        <div class="info col-10 d-flex flex-column">
            <div class="d-flex">
                <h5 class="raleway m-0 dark-grey">{{ review.user_name }}</h5>
                <div class="star-container">
                    <div
                        class="star-fill"
                        v-for="star in review.valutation"
                        :key="star + 'star-full' + review.id"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-star-fill"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"
                            />
                        </svg>
                    </div>
                    <div
                        class="star-empty"
                        v-for="star in 5 - review.valutation"
                        :key="star + 'star-empty' + review.id"
                    >
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
                    </div>
                </div>
            </div>

            <p class="raleway m-0 clear-grey">{{ review.content }}</p>
        </div>

        <!--TIME-->
        <div class="time col-2 p-0 text-center">
            <p class="raleway m-0">{{ review.diff_time }}</p>
            <i class="fa-solid fa-chevron-down"></i>
        </div>
    </div>
</template>

<script>
import StarsComponent from "./StarsComponent.vue";

export default {
    name: "ReviewItemComponent",
    components: { StarsComponent },
    props: {
        review: {
            type: Object,
            required: true,
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
.yellow-50 {
    color: $fc-accent-yellow;
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
.info {
    padding-right: 0px;
}
.info p {
    font-size: 14px;
}
.time p {
    font-size: 12px;
    text-align: center;
}
.review-item {
    border-bottom: 1px solid $yellow-50;
}

.star-container {
    display: flex;
    align-items: center;
    justify-content: center;
    color: $yellow-50;
    margin-left: 10px;
}
</style>
