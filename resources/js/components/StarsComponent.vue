<template>
    <div class="container d-flex justify-content-start p-0">
        <div class="d-flex justify-content-center stars px-3">
            <input
                name="stars"
                type="radio"
                id="stars1"
                value="1"
                v-model="valutation"
                @click="returnValutation"
            />
            <label for="stars1"></label>

            <input
                name="stars"
                type="radio"
                id="stars2"
                value="2"
                v-model="valutation"
                @click="returnValutation"
            />
            <label for="stars2"></label>

            <input
                name="stars"
                type="radio"
                id="stars3"
                value="3"
                v-model="valutation"
                @click="returnValutation"
            />
            <label for="stars3"></label>

            <input
                name="stars"
                type="radio"
                id="stars4"
                value="4"
                v-model="valutation"
                @click="returnValutation"
                checked
            />
            <label for="stars4"></label>

            <input
                name="stars"
                type="radio"
                id="stars5"
                value="5"
                v-model="valutation"
                @click="returnValutation"
                
            />
            <label for="stars5"></label>
        </div>
    </div>
</template>

<script>
export default {
    name: "StarsComponent",
    data() {
        return {
            valutation: 5,
        };
    },
    methods: {
        returnValutation() {
            this.$emit("clickValutation", this.valutation);
        },
    },
};
</script>

<style>
.stars {
    font-size: 12px;
}
.stars input[name="stars"] {
    display: none;
}
.stars input[name="stars"] + label:after {
    content: none;
}
.stars input[name="stars"] + label {
    font-family: "FontAwesome";
}
.stars input[name="stars"] + label:before {
    background-color: transparent;
    border: none;
    color: #ffc107;
    content: "\f005";
    font-size: 1.3em;
    transition: none;
}
.stars input[name="stars"]:checked ~ label:before {
    background-color: transparent;
    border: none;
    color: #607d8b;
}
.stars input[name="stars"]:checked + label:before {
    color: #ffc107;
}
.stars input[name="stars"] + label:hover ~ input + label:before {
    opacity: 0.3;
}
</style>
