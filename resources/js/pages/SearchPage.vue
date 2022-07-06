<template>
    <div class="container-fluid m-0 p-0">
        <HeaderComponent />
        <!-- hero -->
        <div class="row m-0 p-0">
            <div class="col-12 m-0 p-0">
                <div class="hero">
                    <div class="hero-bg-color"></div>
                    <div class="container h-100">
                        <div class="row h-100">
                            <div
                                class="col-12 h-100 d-flex justify-content-center align-items-center"
                            >
                                <h1 class="hero-title">
                                    Search for best IT Specialists
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / hero -->
        <div class="main-section">
            <div class="row m-0 p-0">
                <div class="d-none d-md-block col-3 col-xl-2 h-100 m-0 p-0">
                    <div class="sidebar">
                        <div class="sidebar-header">
                            <h3 class="sidebar-title">Filter by</h3>
                        </div>
                        <div class="sidebar-body">
                            <div class="sidebar-item">
                                <div class="sidebar-item-header">
                                    <h4 class="sidebar-item-title">
                                        Specialization
                                    </h4>
                                </div>
                                <div class="sidebar-item-body-list">
                                    <div class="sidebar-item-body-content">
                                        <div
                                            v-for="spec in specializations"
                                            :key="spec.id"
                                            class="sidebar-item-body-content-item"
                                        >
                                            <input
                                                type="checkbox"
                                                :checked="isChecked(spec.id)"
                                                :id="spec.id"
                                                class="sidebar-item-body-content-item-input"
                                                @click="
                                                    () => {
                                                        handleSpecSelection(
                                                            spec.id
                                                        );
                                                    }
                                                "
                                            />
                                            <label
                                                :for="spec.id"
                                                class="sidebar-item-body-content-item-label"
                                            >
                                                {{ spec.specialization }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Valutation/Reviews -->
                        <div class="sidebar-body">
                            <div class="sidebar-item">
                                <div class="sidebar-item-header">
                                    <h4 class="sidebar-item-title">Rating</h4>
                                </div>
                                <div class="sidebar-item-body">
                                    <div class="sidebar-item-body-content">
                                        <select
                                            v-model="reviews"
                                            class="select-style"
                                        >
                                            <option value="">All</option>
                                            <option
                                                v-for="valut in valutations"
                                                :key="valut"
                                                :value="valut"
                                            >
                                                {{ valut
                                                }}{{ valut == 5 ? "" : "+" }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Number filter -->
                        <div class="sidebar-body">
                            <div class="sidebar-item">
                                <div class="sidebar-item-header">
                                    <h4 class="sidebar-item-title">
                                        With
                                        {{ reviewsNum || 0 }} review{{
                                            reviewsNum && reviewsNum > 1
                                                ? "s"
                                                : ""
                                        }}
                                        and more
                                    </h4>
                                </div>
                                <div class="sidebar-item-body">
                                    <div class="sidebar-item-body-content">
                                        <div class="slidecontainer">
                                            <input
                                                type="range"
                                                min="0"
                                                max="100"
                                                value="0"
                                                class="slider"
                                                v-model="reviewsNum"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-12 d-flex justify-content-center">
                                <button
                                    @click="
                                        () => {
                                            getSearch();
                                        }
                                    "
                                    class="itf-btn itf-btn-tertiary itf-btn-full-width itf-btn-small"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-filter"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                                        />
                                    </svg>
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-9 col-xl-10 m-0 p-0 overflow-hidden">
                    <div class="search-bar">
                        <div class="search-bar-container">
                            <div class="search-bar-container d-md-none">
                                <button
                                    @click="toggleFilter"
                                    class="itf-btn itf-btn-tertiary-outline itf-btn-icon"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-filter"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                                        />
                                    </svg>
                                </button>
                            </div>
                            <div class="search-bar-container-item">
                                <input
                                    type="text"
                                    class="search-bar-container-item-input"
                                    placeholder="Search"
                                    v-model="searchQuery"
                                />
                            </div>
                            <div class="search-bar-container-item">
                                <button
                                    class="itf-btn itf-btn-primary itf-btn-small"
                                    @click="getSearch"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                    <div v-if="isFilterShown" class="mobile-filter">
                        <div class="row justify-content-center">
                            <div class="col-11 d-flex justify-content-end">
                                <button
                                    @click="toggleFilter"
                                    class="itf-btn itf-btn-primary-outline itf-btn-icon"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-x-lg"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-11">
                                <div class="sidebar-header">
                                    <h3 class="sidebar-title">Filter by</h3>
                                </div>
                                <div class="sidebar-body">
                                    <div class="sidebar-item">
                                        <div class="sidebar-item-header">
                                            <h4 class="sidebar-item-title">
                                                Specialization
                                            </h4>
                                        </div>
                                        <div class="sidebar-item-body-list">
                                            <div
                                                class="sidebar-item-body-content"
                                            >
                                                <div
                                                    v-for="spec in specializations"
                                                    :key="spec.id"
                                                    class="sidebar-item-body-content-item"
                                                >
                                                    <input
                                                        type="checkbox"
                                                        :checked="
                                                            isChecked(spec.id)
                                                        "
                                                        :id="
                                                            spec.specialization
                                                        "
                                                        class="sidebar-item-body-content-item-input"
                                                        @click="
                                                            () => {
                                                                handleSpecSelection(
                                                                    spec.id
                                                                );
                                                            }
                                                        "
                                                    />
                                                    <label
                                                        :for="
                                                            spec.specialization
                                                        "
                                                        class="sidebar-item-body-content-item-label"
                                                    >
                                                        {{
                                                            spec.specialization
                                                        }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Valutation/Reviews -->
                                <div class="sidebar-body">
                                    <div class="sidebar-item">
                                        <div class="sidebar-item-header">
                                            <h4 class="sidebar-item-title">
                                                Rating
                                            </h4>
                                        </div>
                                        <div class="sidebar-item-body">
                                            <div
                                                class="sidebar-item-body-content"
                                            >
                                                <select
                                                    v-model="reviews"
                                                    class="select-style"
                                                >
                                                    <option value="">
                                                        All
                                                    </option>
                                                    <option
                                                        v-for="valut in valutations"
                                                        :key="valut"
                                                        :value="valut"
                                                    >
                                                        {{ valut
                                                        }}{{
                                                            valut == 5
                                                                ? ""
                                                                : "+"
                                                        }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews Number filter -->
                                <div class="sidebar-body">
                                    <div class="sidebar-item">
                                        <div class="sidebar-item-header">
                                            <h4 class="sidebar-item-title">
                                                With
                                                {{ reviewsNum || 0 }} review{{
                                                    reviewsNum && reviewsNum > 1
                                                        ? "s"
                                                        : ""
                                                }}
                                                and more
                                            </h4>
                                        </div>
                                        <div class="sidebar-item-body">
                                            <div
                                                class="sidebar-item-body-content"
                                            >
                                                <div class="slidecontainer">
                                                    <input
                                                        type="range"
                                                        min="0"
                                                        max="100"
                                                        value="0"
                                                        class="slider"
                                                        v-model="reviewsNum"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-11 d-flex justify-content-center">
                                <button
                                    @click="
                                        () => {
                                            toggleFilter();
                                            getSearch();
                                        }
                                    "
                                    class="itf-btn itf-btn-tertiary itf-btn-full-width"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="16"
                                        height="16"
                                        fill="currentColor"
                                        class="bi bi-filter"
                                        viewBox="0 0 16 16"
                                    >
                                        <path
                                            d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"
                                        />
                                    </svg>
                                    Filter
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="results-section">
                        <div v-if="users.length > 0" class="results">
                            <UserCard
                                v-for="user in users"
                                :key="user.id"
                                :user="user"
                            />
                        </div>
                        <div v-else class="results">
                            <div class="no-results">
                                <h3>No results found</h3>
                            </div>
                        </div>
                        <div class="pagination-box">
                            <nav aria-label="...">
                                <ul
                                    class="itf-pagination"
                                    v-if="pagination.totalRecords > 12"
                                >
                                    <li
                                        :class="
                                            'itf-page-item' +
                                            (pagination.currentPage === 1
                                                ? ' disabled'
                                                : '')
                                        "
                                    >
                                        <a
                                            :class="
                                                'itf-page-link' +
                                                (pagination.currentPage === 1
                                                    ? ' disabled'
                                                    : '')
                                            "
                                            href="#"
                                            tabindex="-1"
                                            @click="
                                                () => {
                                                    if (
                                                        pagination.currentPage ===
                                                        1
                                                    )
                                                        return;
                                                    getSearch(
                                                        pagination.currentPage -
                                                            1
                                                    );
                                                    scrollToTop();
                                                }
                                            "
                                            >Previous</a
                                        >
                                    </li>
                                    <li
                                        :class="
                                            'itf-page-item' +
                                            (pagination.currentPage === n
                                                ? ' active'
                                                : '')
                                        "
                                        v-for="n in pagination.totalPages"
                                        :key="n"
                                    >
                                        <a
                                            class="itf-page-link"
                                            href="#"
                                            @click.prevent="
                                                () => {
                                                    if (
                                                        n !=
                                                        pagination.currentPage
                                                    ) {
                                                        getSearch(n);
                                                        scrollToTop();
                                                    }
                                                }
                                            "
                                            >{{ n }}</a
                                        >
                                    </li>
                                    <li
                                        :class="
                                            'itf-page-item' +
                                            (pagination.currentPage ===
                                            pagination.totalPages
                                                ? ' disabled'
                                                : '')
                                        "
                                    >
                                        <a
                                            :class="
                                                'itf-page-link' +
                                                (pagination.currentPage ===
                                                pagination.totalPages
                                                    ? ' disabled'
                                                    : '')
                                            "
                                            href="#"
                                            tabindex="+1"
                                            @click="
                                                () => {
                                                    if (
                                                        pagination.currentPage ===
                                                        pagination.totalPages
                                                    )
                                                        return;
                                                    getSearch(
                                                        pagination.currentPage +
                                                            1
                                                    );
                                                    scrollToTop();
                                                }
                                            "
                                            >Next</a
                                        >
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <FooterComponent />
    </div>
</template>

<script>
import UserCard from "./../components/UserCard.vue";
import HeaderComponent from "./../components/HeaderComponent.vue";
import FooterComponent from "./../components/FooterComponent.vue";
export default {
    components: {
        UserCard,
        HeaderComponent,
        FooterComponent,
    },
    data() {
        return {
            searchQuery: "",
            specializations: {},
            selectedSpecializations: [],
            users: [],
            pagination: {
                currentPage: 1,
                totalPages: 1,
                totalRecords: 0,
            },
            valutations: 5,
            selectedValutations: [],
            reviews: "",
            reviewsNum: "",
            isFilterShown: false,
            initialSpec: "",
        };
    },
    mounted() {
        this.getSpecializations();
    },
    methods: {
        getSearch(page) {
            // console.log(this.searchQuery, specializations);
            window.axios
                .get(`http://127.0.0.1:8000/api/advancedSearch`, {
                    params: {
                        value: this.searchQuery,
                        specializations: this.selectedSpecializations,
                        reviews: this.reviews,
                        reviewsNum: this.reviewsNum,
                        page: page || 1,
                    },
                })
                .then((response) => {
                    console.log(response.data);
                    this.users = response.data.data;
                    this.pagination.totalPages = response.data.last_page;
                    this.pagination.currentPage = response.data.current_page;
                    this.pagination.totalRecords = response.data.total;
                    // console.log(this.pagination);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        getSpecializations() {
            window.axios
                .get("http://127.0.0.1:8000/api/specializations")
                .then((response) => {
                    this.specializations = response.data;
                    console.log("specialization", response.data);
                    this.checkForParams();
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        checkForParams() {
            if (!this.$route.params.specialization) {
                this.getSearch();
                return;
            }
            this.initialSpec = this.$route.params.specialization
                ? this.$route.params.specialization
                : "";
            // console.log(this.initialSpec);
            this.initialSpec = this.initialSpec.split("%20").join(" ");
            // console.log(this.initialSpec);
            if (this.initialSpec) {
                // console.log(this.specializations);
                let spec = this.specializations.find(
                    (spec) => spec.specialization == this.initialSpec
                );
                if (spec) {
                    this.selectedSpecializations.push(spec.id);
                    this.getSearch();
                } else {
                    this.getSearch();
                }
            }
        },

        handleSpecSelection(id) {
            if (this.selectedSpecializations.includes(id)) {
                this.selectedSpecializations =
                    this.selectedSpecializations.filter((item) => item !== id);
            } else {
                this.selectedSpecializations.push(id);
            }
            console.log(this.selectedSpecializations);
        },

        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        },
        toggleFilter() {
            this.isFilterShown = !this.isFilterShown;
        },
        isChecked(id) {
            return this.selectedSpecializations.includes(id);
        },
    },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";

.hero {
    background: url("https://images.unsplash.com/photo-1622675363311-3e1904dc1885?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 30vh;
    position: relative;

    &-bg-color {
        background: $green-60;
        opacity: 0.8;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
    &-title {
        color: white;
        font-size: 2rem;
        font-weight: bold;
        font-family: $ff-heading;
    }
}
.sidebar {
    background: $white;
    height: 100%;
    min-height: 100vh;
    width: 100%;
    box-shadow: $box-shadow-primary;
    padding: 20px;
    z-index: 1;
    margin: 0;
    border-bottom-right-radius: 10px;

    &-header {
        margin-bottom: 20px;
    }
    &-title {
        font-size: 1.5rem;
        font-weight: bold;
        font-family: $ff-heading;
    }
}
.sidebar-body {
    margin: 20px 0;
}
.sidebar-item-body-list {
    border-radius: $border-radius-small;
    border: 1px solid $fc-grey-clear;
    padding: 10px;
    font-size: 0.8rem;
    color: $fc-grey-dark;
    font-family: $ff-body;
    font-weight: 400;
    outline: none;
    width: 100%;
    max-height: 300px;
    overflow: auto;
}
.search-bar {
    background: $white;
    position: relative;
    width: 100%;
    max-width: 100%;
    box-shadow: $box-shadow-primary;
    padding: 20px;

    &-container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;

        @include media-breakpoint-up(md) {
            justify-content: flex-start;
        }
    }
    &-container-item {
        // width: 40%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    input {
        width: 100%;
        border: 1px solid $green-50;
        outline: none;
        font-size: 0.6rem;
        font-weight: 400;
        font-family: $ff-body;
        padding: 12px 24px;
        border-radius: $border-radius-small;

        @include media-breakpoint-up(md) {
            font-size: 0.8rem;
        }
    }
}
.sidebar-item-title {
    font-size: 1rem;
    font-weight: bold;
    font-family: $ff-body;
    flood-color: $fc-grey-clear;
}
.mobile-filter {
    position: absolute;
    padding: 20px;
    top: 0;
    right: 0;
    left: 0;
    z-index: 5;
    background: $white;
    box-shadow: $box-shadow-primary;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
}
.slidecontainer {
    width: 100%; /* Width of the outside container */
}

/* The slider itself */
.slider {
    -webkit-appearance: none; /* Override default CSS styles */
    appearance: none;
    width: 100%; /* Full-width */
    height: 5px; /* Specified height */
    background: $green-10; /* Grey background */
    outline: none; /* Remove outline */
    opacity: 0.7; /* Set transparency (for mouse-over effects on hover) */
    -webkit-transition: 0.2s; /* 0.2 seconds transition on hover */
    transition: opacity 0.2s;
    border-radius: $border-radius-small;
}

/* Mouse-over effects */
.slider:hover {
    opacity: 1; /* Fully shown on mouse-over */
}

/* The slider handle (use -webkit- (Chrome, Opera, Safari, Edge) and -moz- (Firefox) to override default look) */
.slider::-webkit-slider-thumb {
    -webkit-appearance: none; /* Override default look */
    appearance: none;
    width: 10px; /* Set a specific slider handle width */
    height: 10px; /* Slider handle height */
    background: $green-50; /* Green background */
    cursor: pointer; /* Cursor on hover */
    border: 1px solid $green-70; /* Green border */
}

.slider::-moz-range-thumb {
    -webkit-appearance: none; /* Override default look */
    appearance: none;
    width: 10px; /* Set a specific slider handle width */
    height: 10px; /* Slider handle height */
    background: $green-50; /* Green background */
    cursor: pointer; /* Cursor on hover */
    border: 1px solid $green-70; /* Green border */
}

.select-style {
    margin: 0;
    width: 100%;
    border-radius: $border-radius-small;
    overflow: hidden;
    background-color: #fff;
    background: #fff;
    position: relative;

    border: 1px solid $fc-grey-clear;
    padding: 10px;
    font-size: 0.8rem;
    color: $fc-grey-dark;
    font-family: $ff-body;
    font-weight: 400;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
    border: none;
    box-shadow: none;
    background-color: transparent;
    background-image: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.select-style:after {
    top: 50%;
    left: 85%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-top-color: #d41f1f;
    border-width: 5px;
    margin-top: -2px;
    z-index: 100;
}

.select-style select:focus {
    outline: none;
}
.results-section {
    // background: $white;
    width: 100%;
    padding: 20px;
    position: relative;
    min-height: 60vh;

    .results {
        align-content: stretch;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        gap: 20px;
    }
    .no-results {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        width: 100%;
        font-size: 1rem;
        font-weight: bold;
        font-family: $ff-heading;
        color: $fc-grey-clear;
    }
    .pagination-box {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        .itf-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            border-radius: $border-radius-small;
            overflow: hidden;

            .itf-page-item {
                min-width: 40px;
                height: 40px;
                background: $white;
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                transition: all 0.3s ease-in-out;
                margin: 0;
                padding: 5px;
                &:hover {
                    background: $green-40;
                }
                &:hover .itf-page-link {
                    color: $white;
                }
                &.active {
                    background: $green-60;
                }
                &.active .itf-page-link {
                    color: $white;
                }
                .itf-page-link {
                    transition: all 0.3s ease-in-out;
                    color: $fc-grey-dark;
                    font-size: 1rem;
                    font-weight: normal;
                    font-family: $ff-body;
                    &.disabled {
                        color: $fc-grey-dark;
                        cursor: not-allowed;
                    }
                }
                &.disabled {
                    opacity: 0.5;
                    cursor: not-allowed;
                }
            }
        }
    }
}
</style>
