<template>
    <div class="container">
        <div class="row justify-content-end align-items-center vh-100">
            <div class="col-md-6">
                <ul class="steps">
                    <li class="step step-success">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 1
                                        ? 'step-circle active'
                                        : displayedForm > 1
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >1</span
                            >
                            <!-- <span class="step-text">Step 1</span> -->
                        </div>
                    </li>
                    <li class="step step-active">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 2
                                        ? 'step-circle active'
                                        : displayedForm > 2
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >2</span
                            >
                        </div>
                    </li>
                    <li class="step">
                        <div class="step-content">
                            <span
                                :class="
                                    displayedForm == 3
                                        ? 'step-circle active'
                                        : displayedForm > 3
                                        ? 'step-circle completed'
                                        : ' step-circle'
                                "
                                >3</span
                            >
                        </div>
                    </li>
                </ul>
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
                                    v-model="params.name"
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
                                    v-model="params.surname"
                                />
                            </div>
                            <div class="itf-form-box">
                                <label for="location" class="itf-form-label"
                                    >Where do you live?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="location"
                                    placeholder="Milan, Italy"
                                    v-model="params.location"
                                />
                            </div>
                            <div class="d-flex">
                                <button
                                    v-if="displayedForm !== 1"
                                    class="itf-btn itf-btn-primary-outline mr-1"
                                    @click="
                                        () => {
                                            prevForm();
                                        }
                                    "
                                >
                                    PREVIOUS
                                </button>
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
                            <a
                                href=""
                                class="itf-skip-link"
                                @click.prevent="skipForm"
                            >
                                Skip for the moment</a
                            >
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
                            <!-- <div class="itf-form-box">
                                <label for="position" class="itf-form-label"
                                    >What is your job position?</label
                                >
                                <input
                                    type="text"
                                    class="itf-form-control"
                                    id="position"
                                    placeholder="Full Stack Developer"
                                    v-model="params.position"
                                />
                            </div> -->
                            <div class="itf-form-box">
                                <label for="position" class="itf-form-label"
                                    >What is your job position?*</label
                                >
                                <select
                                    class="itf-form-control"
                                    id="position"
                                    v-model="params.specialization"
                                >
                                    <option value="">
                                        Select your position
                                    </option>
                                    <option
                                        :value="specialization.id"
                                        v-for="specialization in specializations"
                                        :key="specialization.id"
                                    >
                                        {{ specialization.specialization }}
                                    </option>
                                </select>
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
                                    v-model="params.job_experience"
                                    min="0"
                                    max="100"
                                />
                            </div>
                            <div class="d-flex">
                                <button
                                    v-if="displayedForm !== 1"
                                    class="itf-btn itf-btn-primary-outline mr-1"
                                    @click="
                                        () => {
                                            prevForm();
                                        }
                                    "
                                >
                                    PREVIOUS
                                </button>
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
                            <a href="" class="itf-skip-link" @click="skipForm">
                                Skip for the moment</a
                            >
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
                                    v-model="params.phone"
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
                                    v-model="params.linkedin"
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
                                    v-model="params.github"
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
                                    v-model="params.site"
                                />
                            </div>
                            <div class="d-flex">
                                <button
                                    v-if="displayedForm !== 1"
                                    class="itf-btn itf-btn-primary-outline mr-1"
                                    @click="
                                        () => {
                                            prevForm();
                                        }
                                    "
                                >
                                    PREVIOUS
                                </button>
                                <button
                                    class="itf-btn itf-btn-primary"
                                    @click="
                                        () => {
                                            postData();
                                        }
                                    "
                                >
                                    SUBMIT
                                </button>
                            </div>
                            <a href="" class="itf-skip-link" @click="skipForm">
                                Skip for the moment</a
                            >
                        </div>
                    </div>
                </div>
                <!-- ================= THIRD FORM END ================= -->
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CompleteSignUp",
    data() {
        return {
            params: {
                specialization: "",
                job_experience: "",
                location: "",
                phone: "",
                cv: "",
                linkedin: "",
                github: "",
                site: "",
                name: "",
                surname: "",
            },
            displayedForm: 1,
            userId: this.$route.params.id,
            userName: "",
            specializations: [],
        };
    },
    mounted() {
        this.userId = this.$route.params.id;
        // console.log(this.userId);
        this.getUserName();
        this.getSpecializations();
    },
    methods: {
        getSpecializations() {
            window.axios
                .get("http://127.0.0.1:8000/api/specializations")
                .then((response) => {
                    this.specializations = response.data;
                    console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getUserName() {
            window.axios.get("/api/getUser/" + this.userId).then((response) => {
                this.userName = response.data.user_name;
                // return response.data.user_name;
            });
        },
        postData() {
            window.axios
                .post(
                    `http://127.0.0.1:8000/api/user/${this.$route.params.id}/completeRegistration`,
                    {
                        ...this.params,
                    }
                )
                .then((response) => {
                    console.log(response.data);
                    if (response.data.success) {
                        this.$router.push(`/user/dashboard`);
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        nextForm() {
            // console.log("nextForm", this.displayedForm);
            this.displayedForm++;
        },
        prevForm() {
            // console.log("prevForm", this.displayedForm);
            this.displayedForm--;
        },
        skipForm() {
            // console.log("skipForm", this.displayedForm);
            this.setEmptyParams();
            this.displayedForm = 3;
            this.postData();
        },
        setEmptyParams() {
            if (this.params.position === "") this.position = "/";
            if (this.params.job_experience === "")
                this.params.job_experience = "0";
            if (this.params.location === "") this.params.location = "/";
            if (this.params.cv === "") this.params.cv = "/";
            if (this.params.phone === "") this.params.phone = "/";
            if (this.params.linkedin === "") this.params.linkedin = "/";
            if (this.params.github === "") this.params.github = "/";
            if (this.params.site === "") this.params.site = "/";
            if (this.params.name === "") this.params.name = "/";
            if (this.params.surname === "") this.params.surname = "/";
        },
    },
};
</script>

<style lang="scss">
@import "../../sass/variables";
@import "../../sass/_custom-card";
</style>
