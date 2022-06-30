<template>
    <div class="row jumbotron m-0">
        <div class="col-12 d-flex">
            <img class="rounded-circle dev-img" src="img\unsplash_iEEBWgY_6lA.png" alt="">
        </div>
    </div>
</template>

<script>

export default {
    name: 'DevDetailComponent'
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
.yellow-60 {
    color: $yellow-60;
}
.bg-green-50{
    background-color: $green-50;
}

//BODY
.jumbotron{
    width: 100%;
    background-image: url("/img/Wonder.png");
}
.dev-img{
    width: 12%;
    object-fit: cover;
    position: absolute;
    top: -14px;
    left: 119px;
}
</style>