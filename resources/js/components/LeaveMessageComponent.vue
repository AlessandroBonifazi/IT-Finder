<template>
    <div class="d-flex flex-column bg-white leave-message-container mt-4">

        <div>
            <h4 class="krona bg-green-50 py-3 px-2 m-0">Leave a Message</h4>
        </div>

        <form class="p-3 mt-2">
            <div class="mb-3">
                <label for="name" class="form-label krona dark-grey">Name</label>
                <input type="text" class="form-control" id="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label krona dark-grey">Email</label>
                <input type="email" class="form-control" id="email">
            </div>

            <div class="mb-3">
                <label for="message" class="form-label krona dark-grey">Message</label>
                <input type="text" class="form-control message" id="message">
            </div>
        </form>
        <div class="send d-flex justify-content-end px-3">
            <button class="btn py-1 mb-2">Send</button>
        </div>
        

    </div>
        

</template>

<script>

export default {
    name: 'LeaveMessageComponent'
}
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
.green-40{
    color: $green-40;
}
.green-55 {
    color: $green-55;
}
.bg-white{
    background-color: $bg-primary;
}
.bg-green-40{
    background-color: $green-40;
}
.bg-green-55 {
    background-color: $green-55;
}
.bg-green-60{
    background-color: $green-60;
}
.yellow-50{
    color: $fc-accent-yellow;
}
.yellow-60 {
    color: $yellow-60;
}
.bg-green-50{
    background-color: $green-50;
}
.clear-grey{
    color: $fc-grey-clear;
}
.dark-grey{
    color: $fc-grey-dark;
}

//BODY
.leave-message-container{
    box-shadow: $box-shadow-primary;
    border-radius: 8px;
}
div h4{
    color: white;
    font-size: 16px;
    border-top-right-radius: 8px;
    border-top-left-radius: 8px;
}
label{
    font-size: 14px;
}
.message{
    min-height: 100px;
}
.btn{
    background-color: $btn-primary-bg;
    color: white;
    width: 80px;
    border-radius: 6px;
}
.btn:hover{
    background-color: $btn-primary-bg-hoover;
}
.btn:active{
    background-color: $btn-primary-bg-active;
}
</style>