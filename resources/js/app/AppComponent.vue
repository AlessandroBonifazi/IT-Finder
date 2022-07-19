<template>
    <div class="app-container">
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: "AppComponent",
};
</script>
<style lang="scss" scoped>
.app-container {
    overflow: hidden;
    width: 100%;
}
</style>
