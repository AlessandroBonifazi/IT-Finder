<template>
    <div class="container d-flex flex-column">
        <!--USER HEADER-->
        <div class="row user-info d-flex">
            <div class="col-6 user-img">
                <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                <!-- <img :src="{{dev.img}}" alt=""> -->
                <!-- <div class="rating col-6">{{dev.rating}}</div> -->

                <!-- !! Put some invented data for the moment -->
                <img
                    src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                    alt=""
                />
                <div class="rating col-6">4.5</div>
            </div>
            <div class="col-6 user-info">
                <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                <!-- <h1>{{dev.name}}</h1>
                <span>{{dev.position}}</span>
                <h3>{{dev.experience}}</h3>
                <p>{{dev.cv}}</p> -->

                <!-- !! Put some invented data for the moment -->
                <h1>Lucio Melis</h1>
                <span>Full Stack Web Developer</span>
                <h3>1+ year</h3>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Quis eligendi ullam libero tempore deleniti eos atque ab
                    obcaecati fugiat, nesciunt cum non sapiente debitis iusto
                    rem quo? Nisi, blanditiis eveniet!
                </p>
            </div>
        </div>

        <!--USER BODY-->
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <h2>Tech Stack</h2>
                <div class="techs"></div>
            </div>
        </div>

        <!--USER CONTACTS-->
        <div class="row">
            <div class="col-12">
                <h2>Contacts</h2>
                <div class="contacts">
                    <!-- ! This Links are making bugs alarm because of variables that don't exist at the moment   -->
                    <!-- <a :href="{{dev.email}}"></a>
                    <a :href="{{dev.linkedin}}"></a>
                    <a :href="{{dev.github}}"></a>
                    <a :href="{{dev.telegram}}"></a> -->
                    <a href="/">telegram</a>
                    <a href="/">telegram</a>
                    <a href="/">telegram</a>
                    <a href="/">telegram</a>
                </div>
            </div>
        </div>

        <!--USER BUTTONS-->
        <div class="row">
            <div class="col-12 d-flex">
                <button class="btn btn-primary edit"></button>
                <button class="btn btn-primary boost"></button>
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
// ! This is a wrong import link
// @import '../sass/_variables.scss/'

// ! You can import directly the app file where are imported all the variables and custom files
// @import "./../../sass/app";
</style>
