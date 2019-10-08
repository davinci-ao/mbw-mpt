/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
* First, we will load all of this project's Javascript utilities and other
* dependencies. Then, we will be ready to develop a robust and powerful
* application frontend using useful Laravel and JavaScript libraries.
*/
new Vue({
  el: '#menu',
  vuetify: new Vuetify()
});
new Vue({
  el: '#slider',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      items: [{
        src: 'images/slide1.jpg'
      }]
    };
  }
});
new Vue({
  el: '#footer',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      links: ['/home', 'Chalets', 'Contact'],
      icons: ['fab fa-facebook', 'fab fa-twitter', 'fab fa-google-plus', 'fab fa-linkedin', 'fab fa-instagram']
    };
  }
});
new Vue({
  el: '#form',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      valid: true,
      firstname: '',
      firstnameRules: [function (v) {
        return !!v || 'Voornaam is verplicht';
      }, function (v) {
        return v && v.length <= 50 || 'Voornaam moet minder dan 50 karakters zijn';
      }],
      lastname: '',
      lastnameRules: [function (v) {
        return !!v || 'Achternaam is verplicht';
      }, function (v) {
        return v && v.length <= 50 || 'Achternaam moet minder dan 50 karakters zijn';
      }],
      email: '',
      emailRules: [function (v) {
        return !!v || 'E-mail is verplicht';
      }, function (v) {
        return /.+@.+\..+/.test(v) || 'E-mail moet geldig zijn';
      }],
      phone: '',
      phoneRules: [function (v) {
        return !!v || 'Telefoonummer is verplicht';
      }, function (v) {
        return v && v.length <= 15 || 'Telefoonnummer moet geldig zijn';
      }],
      subject: '',
      subjectRules: [function (v) {
        return !!v || 'Onderwerp is verplicht';
      }, function (v) {
        return v && v.length <= 300 || 'Onderwerp moet minder dan 300 karakters zijn';
      }],
      checkbox: false,
      lazy: false
    };
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /Users/larsgruis/Projects/mbw-mpt/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /Users/larsgruis/Projects/mbw-mpt/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });