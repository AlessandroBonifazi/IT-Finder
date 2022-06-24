(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'CompleteSignUp',
  data: function data() {
    return {
      position: ' ',
      job_experience: ' ',
      phone: ' ',
      linkedin: ' ',
      github: ' ',
      site: ' ',
      description: ' '
    };
  },
  methods: {
    postData: function postData() {
      var params = {
        position: this.position,
        job_experience: this.job_experience,
        phone: this.phone,
        linkedin: this.linkedin,
        github: this.github,
        site: this.position,
        cv: this.description
      }; //window.axios.post(''+ '')

      console.log(params);
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c& ***!
  \************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "container" }, [
    _c("div", { staticClass: "row justify-content-center" }, [
      _c("div", { staticClass: "col-md-8" }, [
        _c("div", { staticClass: "card" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "mb-3 d-flex flex-column" }, [
              _c(
                "label",
                {
                  staticClass: "form-label mt-2",
                  attrs: { for: "description" },
                },
                [_vm._v("Description")]
              ),
              _vm._v(" "),
              _c("textarea", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.description,
                    expression: "description",
                  },
                ],
                attrs: { placeholder: "add description" },
                domProps: { value: _vm.description },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.description = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                { staticClass: "form-label mt-2", attrs: { for: "position" } },
                [_vm._v("Position")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.position,
                    expression: "position",
                  },
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "position", placeholder: "name" },
                domProps: { value: _vm.position },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.position = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                {
                  staticClass: "form-label mt-2",
                  attrs: { for: "job-experience" },
                },
                [_vm._v("Job Experience")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.job_experience,
                    expression: "job_experience",
                  },
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  id: "job-experience",
                  placeholder: "Front end ",
                },
                domProps: { value: _vm.job_experience },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.job_experience = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                { staticClass: "form-label mt-2", attrs: { for: "linkedin" } },
                [_vm._v("Linkedin")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.linkedin,
                    expression: "linkedin",
                  },
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  id: "linkedin",
                  placeholder: "name@example.com",
                },
                domProps: { value: _vm.linkedin },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.linkedin = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                { staticClass: "form-label mt-2", attrs: { for: "github" } },
                [_vm._v("Github")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.github,
                    expression: "github",
                  },
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "github", placeholder: "github" },
                domProps: { value: _vm.github },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.github = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                { staticClass: "form-label mt-2", attrs: { for: "site" } },
                [_vm._v("Site")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.site,
                    expression: "site",
                  },
                ],
                staticClass: "form-control",
                attrs: { type: "text", id: "site", placeholder: "site" },
                domProps: { value: _vm.site },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.site = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "label",
                {
                  staticClass: "form-label mt-2",
                  attrs: { for: "phone-number" },
                },
                [_vm._v("Phone Number")]
              ),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.phone,
                    expression: "phone",
                  },
                ],
                staticClass: "form-control",
                attrs: {
                  type: "text",
                  id: "phone-number",
                  placeholder: "phone number",
                },
                domProps: { value: _vm.phone },
                on: {
                  input: function ($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.phone = $event.target.value
                  },
                },
              }),
              _vm._v(" "),
              _c(
                "button",
                {
                  staticClass: "btn btn-primary justify-self-center mt-4",
                  on: {
                    click: function () {
                      _vm.postData()
                    },
                  },
                },
                [_vm._v("NEXT")]
              ),
            ]),
          ]),
        ]),
      ]),
    ]),
  ])
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card-header" }, [
      _c("h2", [_vm._v("Your Info")]),
    ])
  },
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/pages/CompleteSignup.vue":
/*!***********************************************!*\
  !*** ./resources/js/pages/CompleteSignup.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./CompleteSignup.vue?vue&type=template&id=f2855e0c& */ "./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c&");
/* harmony import */ var _CompleteSignup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./CompleteSignup.vue?vue&type=script&lang=js& */ "./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _CompleteSignup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/pages/CompleteSignup.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CompleteSignup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./CompleteSignup.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/CompleteSignup.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_CompleteSignup_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c&":
/*!******************************************************************************!*\
  !*** ./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./CompleteSignup.vue?vue&type=template&id=f2855e0c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/pages/CompleteSignup.vue?vue&type=template&id=f2855e0c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_CompleteSignup_vue_vue_type_template_id_f2855e0c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);