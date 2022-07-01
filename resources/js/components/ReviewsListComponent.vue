<template>
    <div class="reviews-container row mt-3 justify-content-center">
        <div class="col-12 d-flex flex-column">
            <ReviewItemComponent/>
            <ReviewItemComponent/>
            <ReviewItemComponent/>
        </div>
        <button class="load krona dark-grey mt-2">Load More</button>
    </div>
</template>

<script>
import ReviewItemComponent from "./ReviewItemComponent.vue"

export default {
    name: 'ReviewsComponent',
    components:{
        ReviewItemComponent
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

.bg-green-40{
    background-color: $green-40;
}
.bg-green-55 {
    background-color: $green-55;
}
.bg-green-60{
    background-color: $green-60;
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
.load{
    font-size: 12px;
    border: none;
    background-color: $bg-secondary;
}
</style>