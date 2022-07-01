<template>
    <div>
        <button id="btnScrollToTop" @click="scrollToTop">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>
</template>

<script>
export default {
    name: "ScrollerComponent",
    methods: {
        scrollToTop() {
            let currentScroll = document.documentElement.scrollTop,
                int = setInterval(frame, 6);

            function frame() {
                if (10 > currentScroll) clearInterval(int);
                else {
                    currentScroll = currentScroll - 12;
                    document.documentElement.scrollTop = currentScroll;
                }
            }
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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    color: $green-55;
    border: none;
    cursor: pointer;
}

#btnScrollToTop:active {
    background-color: $btn-primary-bg-active;
}
#btnScrollToTop:hover {
    background-color: $btn-primary-bg-hoover;
}
</style>
