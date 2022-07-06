<template>
    <div class="background">
        <div class="itf-card position-relative mt-4">
            <div
                class="itf-card-header d-flex justify-content-between align-items-center"
            >
                <h4 class="itf-card-title">Leave a Review</h4>
                <div>
                    <button
                        @click="closeModal"
                        class="itf-btn itf-btn-tertiary itf-btn-icon"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="16"
                            height="16"
                            fill="currentColor"
                            class="bi bi-x-lg"
                            viewBox="0 0 16 16"
                        >
                            <path
                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="itf-card-body">
                <form class="mt-2">
                    <div class="itf-form-box">
                        <label for="name" class="itf-form-label">Name</label>
                        <input
                            type="text"
                            class="itf-form-control"
                            id="name"
                            name="name"
                            placeholder="name"
                            v-model="params.name"
                        />
                    </div>

                    <div class="itf-form-box">
                        <label for="rating" class="itf-form-label">Vote</label>
                        <select
                            class="form-select select-style"
                            aria-label="Default select example"
                            v-model="params.rating"
                        >
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <div class="itf-form-box">
                        <label for="review" class="itf-form-label"
                            >Review</label
                        >
                        <textarea
                            type="text"
                            class="itf-form-control"
                            id="review"
                            placeholder="review"
                            v-model="params.review"
                        >
                        </textarea>
                    </div>
                </form>
                <div class="d-flex justify-content-end">
                    <button
                        @click="
                            () => {
                                postReview();
                            }
                        "
                        class="itf-btn itf-btn-primary itf-btn-small"
                    >
                        Publish Review
                    </button>
                </div>
            </div>
            <div
                v-if="isNotificationOn"
                class="itf-notification itf-notification-success"
            >
                <p class="m-0">Recensione inviata</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LeaveReviewPopup",
    data() {
        return {
            params: {
                name: "",
                rating: "",
                review: "",
            },
            isNotificationOn: false,
            notification: "",
        };
    },
    props: {
        user_id: {
            type: Number,
            required: true,
        },
    },
    methods: {
        timerNotification() {
            if (this.isNotificationOn) {
                setTimeout(this.shutDownNotification, 3000);
            }
        },
        shutDownNotification() {
            this.isNotificationOn = false;
            console.log("Shut down");
        },
        closeModal() {
            this.$emit("closeModal");
        },
        postReview() {
            // console.log("params", this.params);
            window.axios
                .post(`http://127.0.0.1:8000/api/review/save`, {
                    id: this.user_id,
                    name: this.params.name,
                    review: this.params.review,
                    rating: parseInt(this.params.rating),
                })

                .then((response) => {
                    console.log(response);
                    this.reviewPosted();
                    this.closeModal();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        reviewPosted() {
            this.$emit("reviewPosted");
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

//BODY

div h4 {
    color: white;
    font-size: 16px;
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
}
label {
    font-size: 14px;
}

.btn {
    background-color: $btn-primary-bg;
    color: white;
    width: 80px;
    border-radius: 6px;
}
.btn:hover {
    background-color: $btn-primary-bg-hoover;
}
.btn:active {
    background-color: $btn-primary-bg-active;
}

.itf-notification {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    border-radius: $border-radius-small;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 50px;
}
.itf-notification-success {
    background-color: $green-40;
    p {
        color: $white;
    }
}
.background {
    position: fixed;
    background-color: rgba(0, 0, 0, 0.4);
    top: 0;
    right: 0;
    width: 100vw;
    height: 100vh;
    z-index: 99;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
