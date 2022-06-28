<template>
    <div class="container d-flex flex-column align-self-center px-5 py-4">
        <!--USER HEADER-->
        <div class="row user-info d-flex">
            
            <div class="col-2 user-img p-0 d-flex align-items-center justify-content-end">
                <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                <!-- <img :src="{{dev.img}}" alt=""> -->
                <!-- <div class="rating col-6">{{dev.rating}}</div> -->

                <!-- !! Put some invented data for the moment -->
                <img
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    alt=""
                    class="rounded-circle"
                />
                <p class="rating py-1 px-2 rounded-pill">4.5</p>
            </div>

            <div class="col-10 user-info p-4">
                <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                <!-- <h1>{{dev.name}}</h1>
                <span>{{dev.position}}</span>
                <h3>{{dev.experience}}</h3>
                <p>{{dev.cv}}</p> -->

                <!-- !! Put some invented data for the moment -->
                <h1 class="krona dark-grey">Lucio Melis</h1>
                <span class="raleway coral-50 position">Full Stack Web Developer</span>
                <p class="raleway fw-bold mb-2 mt-2"><span class="years">1+</span> year experience</p>
                <p class="raleway fs-1 clear-grey">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Quis eligendi ullam libero tempore deleniti eos atque ab
                    obcaecati fugiat, nesciunt cum non sapiente debitis iusto
                    rem quo? Nisi, blanditiis eveniet!
                </p>
            </div>
        </div>

        <!--USER TECH-->
        <div class="row mt-2 mb-2">
            <div class="col-12 d-flex flex-column p-0">
                <h3 class="krona green-80 dark-grey">Tech Stack</h3>
                <div class="techs"></div>
            </div>
        </div>

        <!--USER CONTACTS-->
        <div class="row">
            <div class="col-12 p-0">
                <h3 class="krona green-80 dark-grey">Contacts</h3>
                <div class="contacts mb-2">
                    <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                    <!-- <a :href="{{dev.email}}"></a>
                    <a :href="{{dev.linkedin}}"></a>
                    <a :href="{{dev.github}}"></a>
                    <a :href="{{dev.telegram}}"></a> -->
                    <a class="raleway dark-grey mx-2" href="/">lucio.melis@gmail.com</a>
                    <a class="raleway dark-grey mx-2" href="/">linkedin/lucione</a>
                    <a class="raleway dark-grey mx-2" href="/">github/lucione</a>
                    <a class="raleway dark-grey mx-2" href="/">tm.lucione</a>
                </div>
            </div>
        </div>

        <!--USER BUTTONS-->
        <div class="row mt-3">
            <div class="col-12 p-0 d-flex">
                <button class="btn edit krona">EDIT PROFILE</button>
                <button class="btn boost coral krona mx-2">BOOST PROFILE</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "UserCardComponent",
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

.container{
    background-color: $white;
    box-shadow: $box-shadow-primary;
}
.user-img{
    height: 180px;
}
img{
    width: 100%;
  height:100%;
  object-fit: cover;
}
.coral-50{
    color: $coral-50;
}
.krona{
    font-family: $ff-heading;
}
.raleway{
    font-family: $ff-body;
}
.position{
    font-size: 14px;
}
.years{
    font-weight: bold;
}
.rating{
    position: absolute;
    color: white;
    background-color: $coral-50;
    margin-bottom: 100px;
}
.dark-grey{
    color: $fc-grey-dark;
}
.clear-grey{
    color: $fc-grey-clear;
}

.boost, .edit{
    background-color: $btn-secondary-bg;
    color: white;
    border: none;
    border-radius: 8px;
}
.boost:hover, .edit:hover{
    background-color: $btn-secondary-bg-hoover;
    color: white;
}
.boost:active, .edit:active{
    background-color: $btn-secondary-bg-active;
}
</style>
