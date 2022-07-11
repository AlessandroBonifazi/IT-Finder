<template>
    <div class="itf-card position-relative mt-4">
        <div class="itf-card-header">
            <h4 class="itf-card-title">Leave a Message</h4>
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
                        ref="name"
                        v-model="params.name"
                    />
                </div>

                <div class="itf-form-box">
                    <label for="email" class="itf-form-label">Email</label>
                    <input
                        type="email"
                        class="itf-form-control"
                        id="email"
                        name="email"
                        placeholder="email"
                        ref="email"
                        v-model="params.email"
                    />
                </div>

                <div class="itf-form-box">
                    <label for="message" class="itf-form-label">Message</label>
                    <textarea
                        type="text"
                        class="itf-form-control"
                        id="message"
                        placeholder="message"
                        ref="message"
                        v-model="params.message"
                    >
                    </textarea>
                </div>
            </form>
            <div class="d-flex justify-content-end">
                <button
                    @click="sendMessage"
                    class="itf-btn itf-btn-primary itf-btn-small"
                >
                    Send
                </button>
            </div>
        </div>
        <div
            v-if="isNotificationOn"
            class="itf-notification itf-notification-success"
        >
            <p class="m-0">messaggio inviato</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "LeaveMessageComponent",
    data() {
        return {
            params: {
                name: "",
                email: "",
                message: "",
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
        sendMessage() {
            window.axios
                .post(
                    `http://127.0.0.1:8000/api/message/send/${this.user_id}`,
                    this.params
                )
                .then((response) => {
                    console.log(response);
                    if (response.data.sent) {
                        this.notification = response.data.message;
                        this.isNotificationOn = true;
                        this.timerNotification();
                        this.params.name = " ";
                        this.params.email = " ";
                        this.params.message = " ";
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        timerNotification() {
            if (this.isNotificationOn) {
                setTimeout(this.shutDownNotification, 3000);
            }
        },
        shutDownNotification() {
            this.isNotificationOn = false;
            console.log("Shut down");
        },
        emptyText() {
            console.log(this.$refs.email);
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
.bg-white {
    background-color: $bg-primary;
}
.bg-green-40 {
    background-color: $green-40;
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
.leave-message-container {
    box-shadow: $box-shadow-primary;
    border-radius: 8px;
}
div h4 {
    color: white;
    font-size: 16px;
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
}
label {
    font-size: 14px;
}
.form-control {
    border-radius: 8px;
}
.message {
    min-height: 100px;
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
</style>
