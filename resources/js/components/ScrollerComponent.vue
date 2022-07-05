<template>
    <div>
        <button
            v-if="scrollPosition > 600"
            id="btnScrollToTop"
            @click="scrollToTop"
        >
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "ScrollerComponent",
    props: {
        scrollPosition: {
            type: Number,
            default: "",
        },
    },
    methods: {
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";
#btnScrollToTop {
    position: fixed;
    right: 10px;
    bottom: 10px;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: $btn-primary-bg;
    box-shadow: $box-shadow-primary;
    color: $white;
    border: none;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
    opacity: 40%;
}

#btnScrollToTop:active {
    background-color: $btn-primary-bg-active;
}
#btnScrollToTop:hover {
    background-color: $btn-primary-bg-hoover;
    opacity: 100%;
}
</style>
