<template>
    <div class="container d-flex flex-column">
        <!--USER HEADER-->
        <div class="row user-info d-flex">
            <div class="col-6 user-img">
                <img :src="{{dev.img}}" alt="">
                <div class="rating col-6">{{dev.rating}}</div>
            </div>
            <div class="col-6 user-info">
                <h1>{{dev.name}}</h1>
                <span>{{dev.position}}</span>
                <h3>{{dev.experience}}</h3>
                <p>{{dev.cv}}</p>
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
                    <a :href="{{dev.email}}"></a>
                    <a :href="{{dev.linkedin}}"></a>
                    <a :href="{{dev.github}}"></a>
                    <a :href="{{dev.telegram}}"></a>
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
    name: 'UserCardComponent'
}
</script>
<style lang="scss" scoped>
@import '../sass/_variables.scss/'
</style>