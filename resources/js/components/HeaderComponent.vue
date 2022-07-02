<template>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="row justify-content-between">
          <!-- LOGO -->
          <div class="col-3">
            <h1>ITFinder</h1>
          </div>
          <!-- END LOGO -->

          <!-- USER CONTROLS -->
          <div class="col d-flex align-items-center justify-content-end">
            <div class="row">
              <!-- BUTTON -->
              <div class="col d-lg-none">
                <button
                  class="itf-btn itf-btn-tertiary itf-btn-small"
                  @click="toggleMenu"
                >
                  Menu
                </button>
              </div>
              <!-- / BUTTON -->

              <div class="col d-none d-lg-block">
                <button
                  class="itf-btn itf-btn-tertiary itf-btn-small"
                  @click="searchRedirect"
                >
                  Search
                </button>
                <button
                  class="itf-btn itf-btn-tertiary itf-btn-small"
                  @click="register"
                >
                  Register
                </button>
                <button
                  class="itf-btn itf-btn-primary itf-btn-small"
                  @click="login"
                >
                  Login
                </button>
                <a href="/register">reg</a>
              </div>
            </div>
          </div>
          <!-- END USER CONTROLS -->
        </div>
      </div>
    </div>

    <div v-if="isMenuOpen" class="row">
      <div class="col">
        <div class="col d-flex align-items-center justify-content-end">
          <div class="row">
            <div class="col">
              <button
                class="itf-btn itf-btn-tertiary itf-btn-small"
                @click="searchRedirect"
              >
                Search
              </button>
              <button
                class="itf-btn itf-btn-tertiary itf-btn-small"
                @click="register"
              >
                Register
              </button>
              <button
                class="itf-btn itf-btn-primary itf-btn-small"
                @click="login"
              >
                Login
              </button>
              <a href="/register">reg</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      user: {},
      isMenuOpen: false,
    };
  },
  methods: {
    logout() {
      window.axios.post("/logout").then(() => {
        // this.$router.push("/");
      });
    },
    login() {
      this.$router.push("/login");
    },
    register() {
      this.$router.push("/register-front");
      // window.location.reload();
    },
    searchRedirect() {
      this.$router.push("/search");
    },
    toggleMenu() {
      console.log("toggle");

      this.isMenuOpen = !this.isMenuOpen;
    },
  },
};
</script>

<style lang="scss" scoped>
@import "./../../sass/app";
</style>
