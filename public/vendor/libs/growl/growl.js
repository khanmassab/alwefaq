/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: growl.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: growl.js
 */

(function(e, a) { for(var i in a) e[i] = a[i]; }(window, /******/ (function(modules) { // webpackBootstrap
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
/******/ 	return __webpack_require__(__webpack_require__.s = 76);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/jquery.growl/javascripts/jquery.growl.js":
/*!***************************************************************!*\
  !*** ./node_modules/jquery.growl/javascripts/jquery.growl.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// Generated by CoffeeScript 2.1.0
(function () {
  /*
  jQuery Growl
  Copyright 2015 Kevin Sylvestre
  1.3.5
  */
  "use strict";

  var $, Animation, Growl;

  $ = jQuery;

  Animation = function () {
    var Animation = function () {
      function Animation() {
        _classCallCheck(this, Animation);
      }

      _createClass(Animation, null, [{
        key: "transition",
        value: function transition($el) {
          var el, ref, result, type;
          el = $el[0];
          ref = this.transitions;
          for (type in ref) {
            result = ref[type];
            if (el.style[type] != null) {
              return result;
            }
          }
        }
      }]);

      return Animation;
    }();

    ;

    Animation.transitions = {
      "webkitTransition": "webkitTransitionEnd",
      "mozTransition": "mozTransitionEnd",
      "oTransition": "oTransitionEnd",
      "transition": "transitionend"
    };

    return Animation;
  }();

  Growl = function () {
    var Growl = function () {
      _createClass(Growl, null, [{
        key: "growl",
        value: function growl() {
          var settings = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

          return new Growl(settings);
        }
      }]);

      function Growl() {
        var settings = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

        _classCallCheck(this, Growl);

        this.render = this.render.bind(this);
        this.bind = this.bind.bind(this);
        this.unbind = this.unbind.bind(this);
        this.mouseEnter = this.mouseEnter.bind(this);
        this.mouseLeave = this.mouseLeave.bind(this);
        this.click = this.click.bind(this);
        this.close = this.close.bind(this);
        this.cycle = this.cycle.bind(this);
        this.waitAndDismiss = this.waitAndDismiss.bind(this);
        this.present = this.present.bind(this);
        this.dismiss = this.dismiss.bind(this);
        this.remove = this.remove.bind(this);
        this.animate = this.animate.bind(this);
        this.$growls = this.$growls.bind(this);
        this.$growl = this.$growl.bind(this);
        this.html = this.html.bind(this);
        this.content = this.content.bind(this);
        this.container = this.container.bind(this);
        this.settings = $.extend({}, Growl.settings, settings);
        this.initialize(this.settings.location);
        this.render();
      }

      _createClass(Growl, [{
        key: "initialize",
        value: function initialize(location) {
          var id;
          id = 'growls-' + location;
          return $('body:not(:has(#' + id + '))').append('<div id="' + id + '" />');
        }
      }, {
        key: "render",
        value: function render() {
          var $growl;
          $growl = this.$growl();
          this.$growls(this.settings.location).append($growl);
          if (this.settings.fixed) {
            this.present();
          } else {
            this.cycle();
          }
        }
      }, {
        key: "bind",
        value: function bind() {
          var $growl = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.$growl();

          $growl.on("click", this.click);
          if (this.settings.delayOnHover) {
            $growl.on("mouseenter", this.mouseEnter);
            $growl.on("mouseleave", this.mouseLeave);
          }
          return $growl.on("contextmenu", this.close).find("." + this.settings.namespace + "-close").on("click", this.close);
        }
      }, {
        key: "unbind",
        value: function unbind() {
          var $growl = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : this.$growl();

          $growl.off("click", this.click);
          if (this.settings.delayOnHover) {
            $growl.off("mouseenter", this.mouseEnter);
            $growl.off("mouseleave", this.mouseLeave);
          }
          return $growl.off("contextmenu", this.close).find("." + this.settings.namespace + "-close").off("click", this.close);
        }
      }, {
        key: "mouseEnter",
        value: function mouseEnter(event) {
          var $growl;
          $growl = this.$growl();
          return $growl.stop(true, true);
        }
      }, {
        key: "mouseLeave",
        value: function mouseLeave(event) {
          return this.waitAndDismiss();
        }
      }, {
        key: "click",
        value: function click(event) {
          if (this.settings.url != null) {
            event.preventDefault();
            event.stopPropagation();
            return window.open(this.settings.url);
          }
        }
      }, {
        key: "close",
        value: function close(event) {
          var $growl;
          event.preventDefault();
          event.stopPropagation();
          $growl = this.$growl();
          return $growl.stop().queue(this.dismiss).queue(this.remove);
        }
      }, {
        key: "cycle",
        value: function cycle() {
          var $growl;
          $growl = this.$growl();
          return $growl.queue(this.present).queue(this.waitAndDismiss());
        }
      }, {
        key: "waitAndDismiss",
        value: function waitAndDismiss() {
          var $growl;
          $growl = this.$growl();
          return $growl.delay(this.settings.duration).queue(this.dismiss).queue(this.remove);
        }
      }, {
        key: "present",
        value: function present(callback) {
          var $growl;
          $growl = this.$growl();
          this.bind($growl);
          return this.animate($growl, this.settings.namespace + "-incoming", 'out', callback);
        }
      }, {
        key: "dismiss",
        value: function dismiss(callback) {
          var $growl;
          $growl = this.$growl();
          this.unbind($growl);
          return this.animate($growl, this.settings.namespace + "-outgoing", 'in', callback);
        }
      }, {
        key: "remove",
        value: function remove(callback) {
          this.$growl().remove();
          return typeof callback === "function" ? callback() : void 0;
        }
      }, {
        key: "animate",
        value: function animate($element, name) {
          var direction = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'in';
          var callback = arguments[3];

          var transition;
          transition = Animation.transition($element);
          $element[direction === 'in' ? 'removeClass' : 'addClass'](name);
          $element.offset().position;
          $element[direction === 'in' ? 'addClass' : 'removeClass'](name);
          if (callback == null) {
            return;
          }
          if (transition != null) {
            $element.one(transition, callback);
          } else {
            callback();
          }
        }
      }, {
        key: "$growls",
        value: function $growls(location) {
          var base;
          if (this.$_growls == null) {
            this.$_growls = [];
          }
          return (base = this.$_growls)[location] != null ? base[location] : base[location] = $('#growls-' + location);
        }
      }, {
        key: "$growl",
        value: function $growl() {
          return this.$_growl != null ? this.$_growl : this.$_growl = $(this.html());
        }
      }, {
        key: "html",
        value: function html() {
          return this.container(this.content());
        }
      }, {
        key: "content",
        value: function content() {
          return "<div class='" + this.settings.namespace + "-close'>" + this.settings.close + "</div>\n<div class='" + this.settings.namespace + "-title'>" + this.settings.title + "</div>\n<div class='" + this.settings.namespace + "-message'>" + this.settings.message + "</div>";
        }
      }, {
        key: "container",
        value: function container(content) {
          return "<div class='" + this.settings.namespace + " " + this.settings.namespace + "-" + this.settings.style + " " + this.settings.namespace + "-" + this.settings.size + "'>\n  " + content + "\n</div>";
        }
      }]);

      return Growl;
    }();

    ;

    Growl.settings = {
      namespace: 'growl',
      duration: 3200,
      close: "&#215;",
      location: "default",
      style: "default",
      size: "medium",
      delayOnHover: true
    };

    return Growl;
  }();

  this.Growl = Growl;

  $.growl = function () {
    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    return Growl.growl(options);
  };

  $.growl.error = function () {
    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    var settings;
    settings = {
      title: "Error!",
      style: "error"
    };
    return $.growl($.extend(settings, options));
  };

  $.growl.notice = function () {
    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    var settings;
    settings = {
      title: "Notice!",
      style: "notice"
    };
    return $.growl($.extend(settings, options));
  };

  $.growl.warning = function () {
    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};

    var settings;
    settings = {
      title: "Warning!",
      style: "warning"
    };
    return $.growl($.extend(settings, options));
  };
}).call(this);

/***/ }),

/***/ "./resources/assets/vendor/libs/growl/growl.js":
/*!*****************************************************!*\
  !*** ./resources/assets/vendor/libs/growl/growl.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! jquery.growl/javascripts/jquery.growl.js */ "./node_modules/jquery.growl/javascripts/jquery.growl.js");

/***/ }),

/***/ 76:
/*!***********************************************************!*\
  !*** multi ./resources/assets/vendor/libs/growl/growl.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Work Source\Dev-website\Appwork_v1.4.0\v1.4.0\laravel-demo\resources\assets\vendor\libs\growl\growl.js */"./resources/assets/vendor/libs/growl/growl.js");


/***/ })

/******/ })));
