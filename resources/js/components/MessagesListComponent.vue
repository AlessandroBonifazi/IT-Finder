<template>

    <div class="clients-container d-flex p-3">

        <div class="client d-flex flex-column mx-1 p-0 col-9">
            <h4 class="m-0">Jane Cooper</h4>
            <p class="m-0 clear-grey">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint.</p>
        </div>

        <div class="time col-3 p-0 px-1">
            <p class="clear-grey">2 min ago</p>
        </div>
        
    </div>
    
</template>

<script>

export default {
    name: 'MessageListComponent',
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

.time p{
    font-size: 12px;
    text-align: end;
}

//BODY
.clients-container:hover{
    background-color: $green-05;
}
    
</style>