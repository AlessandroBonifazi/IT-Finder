<template>
    <div class="row review-item d-flex py-2">
                <!--INFO-->
                <div class="info col-10 d-flex flex-column">
                    <div class="d-flex">
                        <h5 class="raleway m-0 dark-grey">{{user.reviews.user_name}}</h5>
                        <div class="yellow-60 mx-3">stelle</div>
                    </div>
                    
                    <p class="raleway m-0 clear-grey">{{reviews.content}}
                    </p>
                </div>

                <!--TIME-->
                <div class="time col-2 p-0 text-center">
                    <p class="raleway m-0">3 minutes ago</p>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>
            </div>
</template>
<script>
export default {
    name: 'ReviewItemComponent',
    props: {
        user: Object
    }
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
.info p{
    font-size: 14px;
}
.time p{
    font-size: 12px;
    text-align: center;
}
.review-item{
    border-bottom: 1px solid $yellow-50;
}
</style>