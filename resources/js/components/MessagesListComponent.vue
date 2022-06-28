<template>

    <div>
        <MessageItem/>
    </div>
    
</template>

<script>
import MessageItem from "./MessageItem.vue"

export default {
    name: 'MessageListComponent',
    components:{
        MessageItem
    }
}
</script>
<style lang="scss"scoped>
@import "./../../sass/app";
    
</style>