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
      }, {
        src: 'images/slide2.jpg'
      }]
    };
  }
});
new Vue({
  el: '#footer',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      links: ['Home', 'Chalets', 'Contact'],
      icons: ['fab fa-facebook', 'fab fa-twitter', 'fab fa-google-plus', 'fab fa-linkedin', 'fab fa-instagram']
    };
  }
});
new Vue({
  el: '#calendar',
  vuetify: new Vuetify(),
  data: function data() {
    return {
      today: 'locales',
      focus: 'locales',
      type: 'month',
      typeToLabel: {
        month: 'Maand',
        week: 'Week',
        day: 'Dag'
      },
      start: null,
      end: null,
      selectedEvent: {},
      selectedElement: null,
      selectedOpen: false,
      events: [{
        name: 'Verblijf Chalet Zee',
        details: 'gereseveerd door ',
        start: '2019-10-7',
        end: '2019-10-12',
        color: 'blue'
      }, {
        name: 'Verblijf Chalet Strand',
        start: '2019-10-8 22:00',
        end: '2019-10-21 23:00',
        color: '#f5b642'
      }, {
        name: 'Onderhoud Chalet Zee',
        details: ' onderhoud ',
        start: '2019-10-13 9:00',
        end: '2019-10-13 19:00',
        color: 'black'
      }, {
        name: 'Verblijf Chalet Zee',
        details: '',
        start: '2019-10-14',
        end: '2019-10-26',
        color: 'blue'
      }]
    };
  },
  computed: {
    title: function title() {
      var start = this.start,
          end = this.end;

      if (!start || !end) {
        return '';
      }

      var startMonth = this.monthFormatter(start);
      var endMonth = this.monthFormatter(end);
      var suffixMonth = startMonth === endMonth ? '' : endMonth;
      var startYear = start.year;
      var endYear = end.year;
      var suffixYear = startYear === endYear ? '' : endYear;
      var startDay = start.day + this.nth(start.day);
      var endDay = end.day + this.nth(end.day);

      switch (this.type) {
        case 'month':
          return "".concat(startMonth, " ").concat(startYear);

        case 'week':
        case '4day':
          return "".concat(startMonth, " ").concat(startDay, " ").concat(startYear, " - ").concat(suffixMonth, " ").concat(endDay, " ").concat(suffixYear);

        case 'day':
          return "".concat(startMonth, " ").concat(startDay, " ").concat(startYear);
      }

      return '';
    },
    monthFormatter: function monthFormatter() {
      return this.$refs.calendar.getFormatter({
        timeZone: 'GMT',
        month: 'long'
      });
    }
  },
  mounted: function mounted() {
    this.$refs.calendar.checkChange();
  },
  methods: {
    viewDay: function viewDay(_ref) {
      var date = _ref.date;
      this.focus = date;
      this.type = 'day';
    },
    getEventColor: function getEventColor(event) {
      return event.color;
    },
    setToday: function setToday() {
      this.focus = this.today;
    },
    prev: function prev() {
      this.$refs.calendar.prev();
    },
    next: function next() {
      this.$refs.calendar.next();
    },
    showEvent: function showEvent(_ref2) {
      var _this = this;

      var nativeEvent = _ref2.nativeEvent,
          event = _ref2.event;

      var open = function open() {
        _this.selectedEvent = event;
        _this.selectedElement = nativeEvent.target;
        setTimeout(function () {
          return _this.selectedOpen = true;
        }, 10);
      };

      if (this.selectedOpen) {
        this.selectedOpen = false;
        setTimeout(open, 10);
      } else {
        open();
      }

      nativeEvent.stopPropagation();
    },
    updateRange: function updateRange(_ref3) {
      var start = _ref3.start,
          end = _ref3.end;
      // You could load events from an outside source (like database) now that we have the start and end dates on the calendar
      this.start = start;
      this.end = end;
    },
    nth: function nth(d) {
      return d > 3 && d < 21 ? 'th' : ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'][d % 10];
    }
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

__webpack_require__(/*! C:\xampp\htdocs\mbw-mpt\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\mbw-mpt\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });