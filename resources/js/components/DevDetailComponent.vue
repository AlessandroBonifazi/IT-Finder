<template>
<div>
    <div class="row jumbotron m-0"></div>
    <div class="col-12">
        <div class="row d-flex container">
            <div class=" col-10">

                <!--IMG AND PROFILE-->
                <div class="d-flex flex-column">
                    <div class="d-flex dev-img-rating position-absolute">
                        <img class="rounded-circle dev-img " src="img\unsplash_iEEBWgY_6lA.png" alt="">
                        <p class="rating px-2 rounded-pill yellow-60 m-0">4.5</p>

                    </div>

                    <div class="info align-self-center mt-5 mx-3">
                        <h1 class="krona dark-grey">Lucio Melis</h1>
                        <p class="raleway coral-50">Full Stack Web Developer
                            <span class="mx-2">|</span>
                            Web Designer
                        </p>
                    </div>
                </div>

                <!--ABOUT ME-->
                <div class="about-me col-8">
                    <h5 class="krona green-55">About Me</h5>
                    <p>Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi. 

                    </p>
                </div>
                
                <!--TECHNOLOGIES STACK-->
                <div class="technlogies-stack col-5">
                    <h5 class="krona green-55">My Technologies Stack</h5>
                </div>

                <!--PEOPLE'S REVIEWS-->
                <div class="reviews d-flex col-7 justify-content-between">
                    <h5 class="krona green-55">People’s Reviews</h5>
                    <button class="btn">Leave new Reviews</button>
                </div>
        
            </div>

            <div class="col-2">a</div>
    
        </div>
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
.clear-grey{
    color: $fc-grey-clear;
}
.dark-grey{
    color: $fc-grey-dark;
}
//BODY
.dev-detail-container{
    margin-right: 0px;
}
.jumbotron{
    width: 100%;
    background-image: url("/img/Wonder.png");
    border-radius: 0%;
}
.dev-img-rating{
    top: -65px;
}
.dev-img{
    width: 200px;
    object-fit: cover;
}
.rating{
    position: absolute;
    color: black;
    background-color: $yellow-50;
    font-size: 18px;
    left: 152px;
    top: 20px;
}
.btn{
    background-color: $btn-tertiary-bg;
    color: white;
    border-radius: 8px;
}
.btn:hover{
    background-color: $btn-tertiary-bg-hoover;
}
.btn:active{
    background-color: $btn-tertiary-bg-active;
}

</style>