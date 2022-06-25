<template>
    <div class="container d-flex flex-column">
        <!--USER INFO-->
        <div class="row user-info d-flex">
            <div class="col-6 user-img d-flex">
                <img :src="{{dev.img}}" alt="">
                <div class="rating col-6">{{dev.rating}}</div>
            </div>
            <div class="col-6 user-info">
                <h1 class="krona">{{dev.name}}</h1>
                <span class="raleway">{{dev.position}}</span>
                <h3 class="raleway">{{dev.experience}}</h3>
                <p class="raleway">{{dev.cv}}</p>
            </div>
        </div>

        <!--USER TECH-->
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <h2 class="krona green-80">Tech Stack</h2>
                <div class="techs"></div>
                
                
            </div>
        </div>

         <!--USER CONTACTS-->
        <div class="row">
            <div class="col-12">
                <h2 class="krona green-80">Contacts</h2>
                <div class="contacts">
                    <a :href="{{dev.email}}" class="raleway"></a>
                    <a :href="{{dev.linkedin}}" class="raleway"></a>
                    <a :href="{{dev.github}}" class="raleway"></a>
                    <a :href="{{dev.telegram}}" class="raleway"></a>
                </div>
                
            </div>
        </div>

        <!--USER BUTTONS-->
        <div class="row">
            <div class="col-12 d-flex">
                <button class="btn btn-primary edit">EDIT PROFILE</button>
                <button class="btn btn-primary boost coral"> BOOST PROFILE</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'UserCardComponent'
}
</script>

<style lang="scss" scoped>
@import '../sass/_variables.scss/';

.krona{
    font-family: $ff-heading;
}
.raleway{
    font-family: $ff-body;
}
.coral{
    background-color: $btn-secondary-bg;
}
.green-80{
    color: $fc-accent-green;
}
</style>