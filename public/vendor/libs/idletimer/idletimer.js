/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: idletimer.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: idletimer.js
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
/******/ 	return __webpack_require__(__webpack_require__.s = 77);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/vendor/libs/idletimer/idletimer.js":
/*!*************************************************************!*\
  !*** ./resources/assets/vendor/libs/idletimer/idletimer.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

// REPO: https://github.com/thorst/jquery-idletimer

/*! Idle Timer - v1.1.0 - 2016-03-21
* https://github.com/thorst/jquery-idletimer
* Copyright (c) 2016 Paul Irish; Licensed MIT */

/*
	mousewheel (deprecated) -> IE6.0, Chrome, Opera, Safari
	DOMMouseScroll (deprecated) -> Firefox 1.0
	wheel (standard) -> Chrome 31, Firefox 17, IE9, Firefox Mobile 17.0

	//No need to use, use DOMMouseScroll
	MozMousePixelScroll -> Firefox 3.5, Firefox Mobile 1.0

	//Events
	WheelEvent -> see wheel
	MouseWheelEvent -> see mousewheel
	MouseScrollEvent -> Firefox 3.5, Firefox Mobile 1.0
*/
(function ($) {
  $.idleTimer = function (firstParam, elem) {
    var opts;

    if (_typeof(firstParam) === "object") {
      opts = firstParam;
      firstParam = null;
    } else if (typeof firstParam === "number") {
      opts = {
        timeout: firstParam
      };
      firstParam = null;
    } // element to watch


    elem = elem || document; // defaults that are to be stored as instance props on the elem

    opts = $.extend({
      idle: false,
      // indicates if the user is idle
      timeout: 30000,
      // the amount of time (ms) before the user is considered idle
      events: "mousemove keydown wheel DOMMouseScroll mousewheel mousedown touchstart touchmove MSPointerDown MSPointerMove" // define active events

    }, opts);

    var jqElem = $(elem),
        obj = jqElem.data("idleTimerObj") || {},

    /* (intentionally not documented)
     * Toggles the idle state and fires an appropriate event.
     * @return {void}
     */
    toggleIdleState = function toggleIdleState(e) {
      var obj = $.data(elem, "idleTimerObj") || {}; // toggle the state

      obj.idle = !obj.idle; // store toggle state date time

      obj.olddate = +new Date(); // create a custom event, with state and name space

      var event = $.Event((obj.idle ? "idle" : "active") + ".idleTimer"); // trigger event on object with elem and copy of obj

      $(elem).trigger(event, [elem, $.extend({}, obj), e]);
    },

    /**
     * Handle event triggers
     * @return {void}
     * @method event
     * @static
     */
    handleEvent = function handleEvent(e) {
      var obj = $.data(elem, "idleTimerObj") || {};

      if (e.type === "storage" && e.originalEvent.key !== obj.timerSyncId) {
        return;
      } // this is already paused, ignore events for now


      if (obj.remaining != null) {
        return;
      }
      /*
      mousemove is kinda buggy, it can be triggered when it should be idle.
      Typically is happening between 115 - 150 milliseconds after idle triggered.
      @psyafter & @kaellis report "always triggered if using modal (jQuery ui, with overlay)"
      @thorst has similar issues on ios7 "after $.scrollTop() on text area"
      */


      if (e.type === "mousemove") {
        // if coord are same, it didn't move
        if (e.pageX === obj.pageX && e.pageY === obj.pageY) {
          return;
        } // if coord don't exist how could it move


        if (typeof e.pageX === "undefined" && typeof e.pageY === "undefined") {
          return;
        } // under 200 ms is hard to do, and you would have to stop, as continuous activity will bypass this


        var elapsed = +new Date() - obj.olddate;

        if (elapsed < 200) {
          return;
        }
      } // clear any existing timeout


      clearTimeout(obj.tId); // if the idle timer is enabled, flip

      if (obj.idle) {
        toggleIdleState(e);
      } // store when user was last active


      obj.lastActive = +new Date(); // update mouse coord

      obj.pageX = e.pageX;
      obj.pageY = e.pageY; // sync lastActive

      if (e.type !== "storage" && obj.timerSyncId) {
        if (typeof localStorage !== "undefined") {
          localStorage.setItem(obj.timerSyncId, obj.lastActive);
        }
      } // set a new timeout


      obj.tId = setTimeout(toggleIdleState, obj.timeout);
    },

    /**
     * Restore initial settings and restart timer
     * @return {void}
     * @method reset
     * @static
     */
    reset = function reset() {
      var obj = $.data(elem, "idleTimerObj") || {}; // reset settings

      obj.idle = obj.idleBackup;
      obj.olddate = +new Date();
      obj.lastActive = obj.olddate;
      obj.remaining = null; // reset Timers

      clearTimeout(obj.tId);

      if (!obj.idle) {
        obj.tId = setTimeout(toggleIdleState, obj.timeout);
      }
    },

    /**
     * Store remaining time, stop timer
     * You can pause from an idle OR active state
     * @return {void}
     * @method pause
     * @static
     */
    pause = function pause() {
      var obj = $.data(elem, "idleTimerObj") || {}; // this is already paused

      if (obj.remaining != null) {
        return;
      } // define how much is left on the timer


      obj.remaining = obj.timeout - (+new Date() - obj.olddate); // clear any existing timeout

      clearTimeout(obj.tId);
    },

    /**
     * Start timer with remaining value
     * @return {void}
     * @method resume
     * @static
     */
    resume = function resume() {
      var obj = $.data(elem, "idleTimerObj") || {}; // this isn't paused yet

      if (obj.remaining == null) {
        return;
      } // start timer


      if (!obj.idle) {
        obj.tId = setTimeout(toggleIdleState, obj.remaining);
      } // clear remaining


      obj.remaining = null;
    },

    /**
     * Stops the idle timer. This removes appropriate event handlers
     * and cancels any pending timeouts.
     * @return {void}
     * @method destroy
     * @static
     */
    destroy = function destroy() {
      var obj = $.data(elem, "idleTimerObj") || {}; //clear any pending timeouts

      clearTimeout(obj.tId); //Remove data

      jqElem.removeData("idleTimerObj"); //detach the event handlers

      jqElem.off("._idleTimer");
    },

    /**
    * Returns the time until becoming idle
    * @return {number}
    * @method remainingtime
    * @static
    */
    remainingtime = function remainingtime() {
      var obj = $.data(elem, "idleTimerObj") || {}; //If idle there is no time remaining

      if (obj.idle) {
        return 0;
      } //If its paused just return that


      if (obj.remaining != null) {
        return obj.remaining;
      } //Determine remaining, if negative idle didn't finish flipping, just return 0


      var remaining = obj.timeout - (+new Date() - obj.lastActive);

      if (remaining < 0) {
        remaining = 0;
      } //If this is paused return that number, else return current remaining


      return remaining;
    }; // determine which function to call


    if (firstParam === null && typeof obj.idle !== "undefined") {
      // they think they want to init, but it already is, just reset
      reset();
      return jqElem;
    } else if (firstParam === null) {// they want to init
    } else if (firstParam !== null && typeof obj.idle === "undefined") {
      // they want to do something, but it isnt init
      // not sure the best way to handle this
      return false;
    } else if (firstParam === "destroy") {
      destroy();
      return jqElem;
    } else if (firstParam === "pause") {
      pause();
      return jqElem;
    } else if (firstParam === "resume") {
      resume();
      return jqElem;
    } else if (firstParam === "reset") {
      reset();
      return jqElem;
    } else if (firstParam === "getRemainingTime") {
      return remainingtime();
    } else if (firstParam === "getElapsedTime") {
      return +new Date() - obj.olddate;
    } else if (firstParam === "getLastActiveTime") {
      return obj.lastActive;
    } else if (firstParam === "isIdle") {
      return obj.idle;
    }
    /* (intentionally not documented)
     * Handles a user event indicating that the user isn't idle. namespaced with internal idleTimer
     * @param {Event} event A DOM2-normalized event object.
     * @return {void}
     */


    jqElem.on($.trim((opts.events + " ").split(" ").join("._idleTimer ")), function (e) {
      handleEvent(e);
    });

    if (opts.timerSyncId) {
      $(window).bind("storage", handleEvent);
    } // Internal Object Properties, This isn't all necessary, but we
    // explicitly define all keys here so we know what we are working with


    obj = $.extend({}, {
      olddate: +new Date(),
      // the last time state changed
      lastActive: +new Date(),
      // the last time timer was active
      idle: opts.idle,
      // current state
      idleBackup: opts.idle,
      // backup of idle parameter since it gets modified
      timeout: opts.timeout,
      // the interval to change state
      remaining: null,
      // how long until state changes
      timerSyncId: opts.timerSyncId,
      // localStorage key to use for syncing this timer
      tId: null,
      // the idle timer setTimeout
      pageX: null,
      // used to store the mouse coord
      pageY: null
    }); // set a timeout to toggle state. May wish to omit this in some situations

    if (!obj.idle) {
      obj.tId = setTimeout(toggleIdleState, obj.timeout);
    } // store our instance on the object


    $.data(elem, "idleTimerObj", obj);
    return jqElem;
  }; // This allows binding to element


  $.fn.idleTimer = function (firstParam) {
    if (this[0]) {
      return $.idleTimer(firstParam, this[0]);
    }

    return this;
  };
})(jQuery);

/***/ }),

/***/ 77:
/*!*******************************************************************!*\
  !*** multi ./resources/assets/vendor/libs/idletimer/idletimer.js ***!
  \*******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Work Source\Dev-website\Appwork_v1.4.0\v1.4.0\laravel-demo\resources\assets\vendor\libs\idletimer\idletimer.js */"./resources/assets/vendor/libs/idletimer/idletimer.js");


/***/ })

/******/ })));
