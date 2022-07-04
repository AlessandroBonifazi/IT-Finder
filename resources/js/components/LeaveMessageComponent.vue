<template>
    <div class="itf-card mt-2">
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
        };
    },
    methods: {
        sendMessage() {
            console.log(this.params);
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
</style>
