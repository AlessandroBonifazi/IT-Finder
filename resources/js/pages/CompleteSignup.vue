<template>
    <div class="container">
        <div class="row justify-content-end align-items-center vh-100">
            <div class="col-md-6">
                <!-- ================= FIRST FORM ================= -->
                <div
                    class="itf-card"
                    :class="displayedForm === 1 ? 'd-block' : 'd-none'"
                >
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Hello there, {{ userName }}
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="position" class="itf-form-label"
                                    >What is your name?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="name"
                                    placeholder="Jhon"
                                    v-model="name"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="surname" class="itf-form-label"
                                    >And your last name?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="surname"
                                    placeholder="Doe"
                                    v-model="surname"
                                />
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        nextForm();
                                    }
                                "
                            >
                                NEXT
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================= FIRST FORM END ================= -->
                <!-- ================= SECOND FORM ================= -->
                <div
                    class="itf-card"
                    :class="displayedForm === 2 ? 'd-block' : 'd-none'"
                >
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Tell us more about yourself
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="position" class="itf-form-label"
                                    >What is your job position?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="position"
                                    placeholder="Full Stack Developer"
                                    v-model="position"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label
                                    for="job_experience"
                                    class="itf-form-label"
                                    >Years of experience?</label
                                >
                                <input
                                    type="number"
                                    class="itf-form-control"
                                    id="job_experience"
                                    placeholder="3"
                                    v-model="job_experience"
                                    min="0"
                                    max="100"
                                />
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        nextForm();
                                    }
                                "
                            >
                                NEXT
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================= SECOND FORM END ================= -->
                <!-- ================= THIRD FORM ================= -->
                <div
                    class="itf-card"
                    :class="displayedForm === 3 ? 'd-block' : 'd-none'"
                >
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Tell us more about yourself
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="location" class="itf-form-label"
                                    >Where do you live?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="location"
                                    placeholder="Milan, Italy"
                                    v-model="location"
                                />
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        nextForm();
                                    }
                                "
                            >
                                NEXT
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================= THIRD FORM END ================= -->
                <!-- ================= FOURTH FORM ================= -->
                <div
                    class="itf-card"
                    :class="displayedForm === 4 ? 'd-block' : 'd-none'"
                >
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">
                            Tell us more about yourself
                        </h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="description" class="itf-form-label"
                                    >Describe yourself</label
                                >
                                <textarea
                                    class="itf-form-control"
                                    id="description"
                                    rows="3"
                                    v-model="description"
                                >
                                </textarea>
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        nextForm();
                                    }
                                "
                            >
                                NEXT
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================= FOURTH FORM END ================= -->
                <!-- ================= FIFTH FORM ================= -->
                <div
                    class="itf-card"
                    :class="displayedForm === 5 ? 'd-block' : 'd-none'"
                >
                    <div class="itf-card-header">
                        <h3 class="itf-card-title">Ok, how to contact you?</h3>
                    </div>
                    <div class="itf-card-body">
                        <div class="mb-3 d-flex flex-column">
                            <div class="itf-form-box">
                                <label for="phone" class="itf-form-label"
                                    >Phone number</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="phone"
                                    placeholder="+10 0000 000"
                                    v-model="phone"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="linkedin" class="itf-form-label"
                                    >Linkedin</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="linkedin"
                                    placeholder="linkedin/itexpert"
                                    v-model="linkedin"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="github" class="itf-form-label"
                                    >Github</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="github"
                                    placeholder="github/itexpert"
                                    v-model="github"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="site" class="itf-form-label"
                                    >Site</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="site"
                                    placeholder="www.ITExpert.com"
                                    v-model="site"
                                />
                            </div>
                            <button
                                class="itf-btn itf-btn-primary"
                                @click="
                                    () => {
                                        postData();
                                    }
                                "
                            >
                                FINALLY, FINISH
                            </button>
                        </div>
                    </div>
                </div>
                <!-- ================= FIFTH FORM END ================= -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CompleteSignUp",
    data() {
        return {
            position: "",
            job_experience: "",
            location: "",
            description: "",
            phone: "",
            linkedin: "",
            github: "",
            site: "",
            displayedForm: 1,
            userId: this.$route.params.id,
            userName: "",
        };
    },
    mounted() {
        this.userId = this.$route.params.id;
        console.log(this.userId);
        this.getUserName();
    },
    computed: {
        userName() {
            return this.userName;
        },
    },
    methods: {
        getUserName() {
            window.axios.get("/api/user/" + this.userId).then((response) => {
                this.userName = response.data.user_name;
                console.log(this.userName);
            });
        },
        postData() {
            console.log(
                "postData",
                this.userId,
                this.position,
                this.job_experience,
                this.location,
                this.description,
                this.phone,
                this.linkedin,
                this.github,
                this.site
            );
            window.axios
                .post(
                    `http://127.0.0.1:8000/api/user/${this.$route.params.id}/edit`,
                    {
                        // id: 1,
                        position: this.position,
                        job_experience: this.job_experience,
                        phone: this.phone,
                        location: this.location,
                        linkedin: this.linkedin,
                        github: this.github,
                        site: this.site,
                        cv: this.description,
                    }
                )
                .then((response) => {
                    console.log(response.data);
                    if (response.data.success) {
                        this.$router.push("/");
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        nextForm() {
            console.log("nextForm", this.displayedForm);
            this.displayedForm++;
        },
    },
};
</script>

<style lang="scss">
@import "../../sass/variables";
@import "../../sass/_custom-card";
</style>
