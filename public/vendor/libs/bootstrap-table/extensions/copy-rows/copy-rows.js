/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: copy-rows.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: copy-rows.js
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
/******/ 	return __webpack_require__(__webpack_require__.s = 36);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/bootstrap-table/src/extensions/copy-rows/bootstrap-table-copy-rows.js":
/*!********************************************************************************************!*\
  !*** ./node_modules/bootstrap-table/src/extensions/copy-rows/bootstrap-table-copy-rows.js ***!
  \********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _get(target, property, receiver) { if (typeof Reflect !== "undefined" && Reflect.get) { _get = Reflect.get; } else { _get = function _get(target, property, receiver) { var base = _superPropBase(target, property); if (!base) return; var desc = Object.getOwnPropertyDescriptor(base, property); if (desc.get) { return desc.get.call(receiver); } return desc.value; }; } return _get(target, property, receiver || target); }

function _superPropBase(object, property) { while (!Object.prototype.hasOwnProperty.call(object, property)) { object = _getPrototypeOf(object); if (object === null) break; } return object; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

/**
 * @author Homer Glascock <HopGlascock@gmail.com>
 * @update zhixin wen <wenzhixin2010@gmail.com>
 */
var Utils = $.fn.bootstrapTable.utils;
$.extend($.fn.bootstrapTable.defaults.icons, {
  copy: {
    bootstrap3: 'glyphicon-copy icon-pencil',
    materialize: 'content_copy'
  }[$.fn.bootstrapTable.theme] || 'fa-copy'
});

var copyText = function copyText(text) {
  var textField = document.createElement('textarea');
  $(textField).html(text);
  document.body.appendChild(textField);
  textField.select();

  try {
    document.execCommand('copy');
  } catch (e) {
    console.log('Oops, unable to copy');
  }

  $(textField).remove();
};

$.extend($.fn.bootstrapTable.defaults, {
  showCopyRows: false,
  copyWithHidden: false,
  copyDelimiter: ', ',
  copyNewline: '\n'
});
$.fn.bootstrapTable.methods.push('copyColumnsToClipboard');

$.BootstrapTable =
/*#__PURE__*/
function (_$$BootstrapTable) {
  _inherits(_class, _$$BootstrapTable);

  function _class() {
    _classCallCheck(this, _class);

    return _possibleConstructorReturn(this, _getPrototypeOf(_class).apply(this, arguments));
  }

  _createClass(_class, [{
    key: "initToolbar",
    value: function initToolbar() {
      var _get2,
          _this = this;

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      (_get2 = _get(_getPrototypeOf(_class.prototype), "initToolbar", this)).call.apply(_get2, [this].concat(args));

      var $btnGroup = this.$toolbar.find('>.columns');

      if (this.options.showCopyRows && this.header.stateField) {
        this.$copyButton = $("\n        <button class=\"".concat(this.constants.buttonsClass, "\">\n        ").concat(Utils.sprintf(this.constants.html.icon, this.options.iconsPrefix, this.options.icons.copy), "\n        </button>\n      "));
        $btnGroup.append(this.$copyButton);
        this.$copyButton.click(function () {
          _this.copyColumnsToClipboard();
        });
        this.updateCopyButton();
      }
    }
  }, {
    key: "copyColumnsToClipboard",
    value: function copyColumnsToClipboard() {
      var _this2 = this;

      var rows = [];
      $.each(this.getSelections(), function (index, row) {
        var cols = [];
        $.each(_this2.options.columns[0], function (indy, column) {
          if (column.field !== _this2.header.stateField && (!_this2.options.copyWithHidden || _this2.options.copyWithHidden && column.visible)) {
            if (row[column.field] !== null) {
              cols.push(Utils.calculateObjectValue(column, _this2.header.formatters[indy], [row[column.field], row, index], row[column.field]));
            }
          }
        });
        rows.push(cols.join(_this2.options.copyDelimiter));
      });
      copyText(rows.join(this.options.copyNewline));
    }
  }, {
    key: "updateSelected",
    value: function updateSelected() {
      _get(_getPrototypeOf(_class.prototype), "updateSelected", this).call(this);

      this.updateCopyButton();
    }
  }, {
    key: "updateCopyButton",
    value: function updateCopyButton() {
      this.$copyButton.prop('disabled', !this.getSelections().length);
    }
  }]);

  return _class;
}($.BootstrapTable);

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/copy-rows/copy-rows.js":
/*!****************************************************************************************!*\
  !*** ./resources/assets/vendor/libs/bootstrap-table/extensions/copy-rows/copy-rows.js ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! bootstrap-table/src/extensions/copy-rows/bootstrap-table-copy-rows.js */ "./node_modules/bootstrap-table/src/extensions/copy-rows/bootstrap-table-copy-rows.js");

/***/ }),

/***/ 36:
/*!**********************************************************************************************!*\
  !*** multi ./resources/assets/vendor/libs/bootstrap-table/extensions/copy-rows/copy-rows.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Work Source\Dev-website\Appwork_v1.4.0\v1.4.0\laravel-demo\resources\assets\vendor\libs\bootstrap-table\extensions\copy-rows\copy-rows.js */"./resources/assets/vendor/libs/bootstrap-table/extensions/copy-rows/copy-rows.js");


/***/ })

/******/ })));
