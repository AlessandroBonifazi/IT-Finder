<template>

    <div class="client-container d-flex p-3">

        <div class="client d-flex flex-column mx-1">
            <h4 class="m-0">Jane Cooper</h4>
            <p class="m-0">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>
        </div>

        <div class="time">
            <p>2 min ago</p>
        </div>
        
    </div>

</template>

<script>
export default {
    name: 'MessageItem'
}
</script>
<style lang="scss"scoped>
@import "./../../sass/app";

.time p{
    font-size: 12px;
}
    
</style>