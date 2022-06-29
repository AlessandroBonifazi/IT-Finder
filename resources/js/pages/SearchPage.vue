<template>
    <div class="container-fluid m-0 p-0">
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
                <div class="col-3 h-100 m-0 p-0">
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
                                <div class="sidebar-item-body">
                                    <div class="sidebar-item-body-content">
                                        <div
                                            v-for="spec in specializations"
                                            :key="spec.id"
                                            class="sidebar-item-body-content-item"
                                        >
                                            <input
                                                type="checkbox"
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
                    </div>
                </div>
                <div class="col-9 m-0 p-0 overflow-hidden">
                    <div class="search-bar">
                        <div class="search-bar-container">
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
                    <div class="results-section">
                        <div class="results">
                            <UserCard
                                v-for="user in users"
                                :key="user.id"
                                :user="user"
                            />
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
    </div>
</template>

<script>
import UserCard from "./../components/UserCard.vue";
export default {
    components: {
        UserCard,
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
        };
    },
    mounted() {
        this.getSpecializations();
        this.getSearch();
    },
    methods: {
        getSearch(page) {
            // console.log(this.searchQuery, specializations);
            window.axios
                .get(`http://127.0.0.1:8000/api/advancedSearch`, {
                    params: {
                        value: this.searchQuery,
                        specializations: this.selectedSpecializations,
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
                    // console.log(response.data);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        handleSpecSelection(id) {
            if (this.selectedSpecializations.includes(id)) {
                this.selectedSpecializations =
                    this.selectedSpecializations.filter((id) => id !== id);
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
.search-bar {
    background: $white;
    width: 100%;
    max-width: 100%;
    box-shadow: $box-shadow-primary;
    padding: 20px;

    &-container {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        gap: 20px;
    }
    &-container-item {
        width: 40%;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }
    input {
        width: 100%;
        border: 1px solid $green-50;
        outline: none;
        font-size: 0.8rem;
        font-weight: 400;
        font-family: $ff-body;
        padding: 12px 24px;
        border-radius: $border-radius-small;
    }
}
.results-section {
    // background: $white;
    width: 100%;
    padding: 20px;
    position: relative;
    height: 100%;

    .results {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        gap: 20px;
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
