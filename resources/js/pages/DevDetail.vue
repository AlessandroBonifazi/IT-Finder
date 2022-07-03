<template>
    <div>
        <HeaderComponent />
        <DevDetailComponent />
    </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import DevDetailComponent from "../components/DevDetailComponent.vue";

export default {
    name: "DevDetail",
    components: {
        DevDetailComponent,
        HeaderComponent,
    },
};
</script>
<style lang=""></style>
