<template>
    <div class="active-message d-flex flex-column m-3">
        
        <!--INFO ACTIVE MESSAGE-->
        <h1 class="m-0 dark-grey raleway">Jane Cooper</h1>
        <p class="m-0 clear-grey raleway">tanya.hill@example.com </p>
        <p class="time m-0 raleway mt-2">2 minutes ago</p>

        <!--MESSAGE-->
        <div class="message text-center mt-5">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>

        <!--REPLY BUTTON-->
        <button class="btn reply coral krona mx-2">Reply by Email</button>
    </div>
</template>

<script>
export default {
    name: 'ActiveMessage'
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
.time{
    font-size: 12px;
    border-bottom: 1px solid $green-50;
}
.reply{
    background-color: $btn-secondary-bg;
    color: white;
    border: none;
    border-radius: 8px;
    width: 30%;
}
.reply:hover{
    background-color: $btn-secondary-bg-hoover;
}
.reply:active{
    background-color: $btn-secondary-bg-active;
}
    
</style>