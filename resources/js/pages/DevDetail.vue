<template>
    <div>
        <HeaderComponent />
        <DevDetailComponent />
        <FooterComponent />
    </div>
</template>

<script>
import HeaderComponent from "../components/HeaderComponent.vue";
import DevDetailComponent from "../components/DevDetailComponent.vue";
import FooterComponent from "../components/FooterComponent.vue";

export default {
    name: "DevDetail",
    components: {
        DevDetailComponent,
        HeaderComponent,
        FooterComponent,
    },
};
</script>
<style lang=""></style>
