<template>
      <div class="row messages-container p-0 rounded">

        <!--CONTAINER-LEFT-->
        <div class="container-left d-flex flex-column col-5 p-0">

            <div class="clients m-0 p-2 px-4">
                <h2>Clients</h2>
            </div>

            <!--SEARCH BAR-->
            <div class="search d-flex justify-content-center">
                <input type="text" placeholder="Search..." class="mx-4 my-3">
            </div>

            <!--MESSAGES LIST-->
            <MessagesListComponent/>
        </div>

        <!--CONTAINER-RIGHT-->
        <div class="container-right col-7 p-0">
            <ActiveMessage/>
        </div>
      </div>
</template>


<script>
import MessagesListComponent from "../components/MessagesListComponent.vue"
import ActiveMessage from "../components/ActiveMessage.vue"

export default {
    name: "MessagesTable",
    components:{
        MessagesListComponent,
        ActiveMessage
    }
}
</script>

<style lang="scss"scoped>
@import "./../../sass/app";

//UTILITIES
.dark-grey{
    color: $fc-grey-dark;
}
.clear-grey{
    color: $fc-grey-clear;
}
.krona{
    font-family: $ff-heading;
}
.raleway{
    font-family: $ff-body;
}

//BODY
.container-left{
    border-right: 1px solid $green-70;
}
.clients{
    color: white;
    background-color: $green-70;
    width: 100%;
}
.search{
    background-color: $green-50;
}
.search input{
    width: 90%;
}
.messages-container{
    box-shadow: $box-shadow-primary;
    background-color: $white;
}
.reply{
    background-color: $btn-secondary-bg;
    color: white;
    border: none;
    border-radius: 8px;
}
.reply:hover{
    background-color: $btn-secondary-bg-hoover;
    color: white;
}
.reply:active{
    background-color: $btn-secondary-bg-active;
}
.messages-list{
    border-right: 1px solid $green-60;
}
    
</style>