/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: cell-input.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: cell-input.js
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
/******/ 	return __webpack_require__(__webpack_require__.s = 34);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/bootstrap-table/src/extensions/cell-input/bootstrap-table-cell-input.js":
/*!**********************************************************************************************!*\
  !*** ./node_modules/bootstrap-table/src/extensions/cell-input/bootstrap-table-cell-input.js ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * @author andrey matveev <aamatveef@gmail.com>
 * @version: v1.1.0
 * https://github.com/aamatveev/bootstrap-table
 * extensions:
 */
$.extend($.fn.bootstrapTable.defaults, {
  cellInputEnabled: false,
  cellInputType: 'text',
  // text or select or textarea
  cellInputUniqueId: '',
  cellInputSelectOptinons: [],
  // [{ text: '', value: '', disabled: false, default: true },{}]
  cellInputIsDeciaml: false,
  onCellInputInit: function onCellInputInit() {
    return false;
  },
  onCellInputBlur: function onCellInputBlur(field, row, oldValue, $el) {
    return false;
  },
  onCellInputFocus: function onCellInputFocus(field, row, oldValue, $el) {
    return false;
  },
  onCellInputKeyup: function onCellInputKeyup(field, row, oldValue, $el) {
    return false;
  },
  onCellInputKeydown: function onCellInputKeydown(field, row, oldValue, $el) {
    return false;
  },
  onCellInputSelectChange: function onCellInputSelectChange(field, row, oldValue, $el) {
    return false;
  }
});
$.extend($.fn.bootstrapTable.Constructor.EVENTS, {
  'cellinput-init.bs.table': 'onCellInputInit',
  'cellinput-blur.bs.table': 'onCellInputBlur',
  'cellinput-focus.bs.table': 'onCellInputFocus',
  'cellinput-keyup.bs.table': 'onCellInputKeyup',
  'cellinput-keydown.bs.table': 'onCellInputKeydown',
  'cellinput-selectchange.bs.table': 'onCellInputSelectChange'
});
var BootstrapTable = $.fn.bootstrapTable.Constructor;
var _initTable = BootstrapTable.prototype.initTable;
var _initBody = BootstrapTable.prototype.initBody;

BootstrapTable.prototype.initTable = function () {
  for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
    args[_key] = arguments[_key];
  }

  _initTable.apply(this, Array.prototype.slice.apply(args)); // exit if table.options.cellInputEnabled = false


  if (!this.options.cellInputEnabled) {
    return;
  }

  $.each(this.columns, function (i, column) {
    // exit if column.cellInputEnabled = false
    if (!column.cellInputEnabled) {
      return;
    }

    var _formatter = column.formatter;

    if (column.cellInputType === 'text') {
      column.formatter = function (value, row, index) {
        var result = _formatter ? _formatter(value, row, index) : value; // Решает проблему невозможности ввода кавычек &quot;

        result = typeof result === 'string' ? result.replace(/"/g, '&quot;') : result;
        var isSetDataUniqueIdAttr = column.cellInputUniqueId && column.cellInputUniqueId.length > 0;
        var disableCallbackFunc = column.cellInputDisableCallbackFunc;
        return ['<input type="text" class="table-td-textbox form-control"', // ' id="' + column.field + '"',
        isSetDataUniqueIdAttr ? " data-uniqueid=\"".concat(row[column.cellInputUniqueId], "\"") : '', " data-name=\"".concat(column.field, "\""), " data-value=\"".concat(result, "\""), " value=\"".concat(result, "\""), ' autofocus="autofocus"', typeof disableCallbackFunc !== 'undefined' && disableCallbackFunc(row) ? ' disabled="disabled"' : '', '>'].join('');
      };
    } else if (column.cellInputType === 'select') {
      column.formatter = function (value, row, index) {
        var result = _formatter ? _formatter(value, row, index) : value;
        var optionDatas = column.cellInputSelectOptinons !== null ? column.cellInputSelectOptinons : [];
        var selectoptions = [];
        var arrAllowedValues = [];

        for (var k = 0; k < optionDatas.length; k++) {
          arrAllowedValues.push(optionDatas[k].value);
        }

        var allowedVal = $.inArray(value, arrAllowedValues) >= 0;
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = optionDatas[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            var optionData = _step.value;
            var isSelected = optionData.value === value;

            if (!allowedVal && optionData.disabled) {
              isSelected = true;
              result = optionData.value;
            }

            selectoptions.push("<option value=\"".concat(optionData.value, "\" ").concat(isSelected ? ' selected="selected" ' : '').concat(optionData.disabled ? ' disabled' : '', ">").concat(optionData.text, "</option>"));
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator.return != null) {
              _iterator.return();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }

        var isSetDataUniqueIdAttr = column.cellInputUniqueId && column.cellInputUniqueId.length > 0;
        var disableCallbackFunc = column.disableCallbackFunc;
        return ['<select class="form-control" style="padding: 4px;"', isSetDataUniqueIdAttr ? " data-uniqueid=\"".concat(row[column.cellInputUniqueId], "\"") : '', " data-name=\"".concat(column.field, "\""), " data-value=\"".concat(result, "\""), typeof disableCallbackFunc !== 'undefined' && disableCallbackFunc(row) ? ' disabled="disabled"' : '', '>', selectoptions.join(''), '</select>'].join('');
      };
    }
  });
};

BootstrapTable.prototype.initBody = function (fixedScroll) {
  var that = this;

  _initBody.apply(this, Array.prototype.slice.apply(arguments));

  if (!this.options.cellInputEnabled) {
    return;
  }

  $.each(this.columns, function (i, column) {
    if (column.cellInputType === 'text') {
      that.$body.find("input[data-name=\"".concat(column.field, "\"]")).off('blur').on('blur', function (e) {
        var data = that.getData();
        var index = $(this).parents('tr[data-index]').data('index');
        var row = data[index];
        var newValue = $(this).val();
        row[column.field] = newValue;
        that.trigger('cellinput-blur', column.field, row, $(this));
      });
      that.$body.find("input[data-name=\"".concat(column.field, "\"]")).off('keyup').on('keyup', function (e) {
        var data = that.getData();
        var index = $(this).parents('tr[data-index]').data('index');
        var row = data[index];
        var oldValue = row[column.field];
        var newValue = $(this).val();
        row[column.field] = newValue;
        that.trigger('cellinput-keyup', column.field, row, oldValue, index, $(this));
      });
      that.$body.find("input[data-name=\"".concat(column.field, "\"]")).off('keydown').on('keydown', function (e) {
        var data = that.getData();
        var index = $(this).parents('tr[data-index]').data('index');
        var row = data[index];
        var oldValue = row[column.field];
        var newValue = $(this).val();

        if (!column.tdtexboxIsDeciaml) {
          row[column.field] = newValue;
        }

        that.trigger('cellinput-keydown', column.field, row, oldValue, index, $(this));
      });
      that.$body.find("input[data-name=\"".concat(column.field, "\"]")).off('focus').on('focus', function (e) {
        var data = that.getData();
        var index = $(this).parents('tr[data-index]').data('index');
        var row = data[index];
        that.trigger('cellinput-focus', column.field, row, $(this));
      });
    } else if (column.cellInputType === 'select') {
      that.$body.find("select[data-name=\"".concat(column.field, "\"]")).off('change').on('change', function (e) {
        var data = that.getData();
        var index = $(this).parents('tr[data-index]').data('index');
        var row = data[index];
        var oldValue = row[column.field];
        var newValue = $(this).val();
        var isBoolTrue = newValue.toLowerCase() === 'true';
        var isBoolFalse = newValue.toLowerCase() === 'false';
        row[column.field] = isBoolTrue ? true : isBoolFalse ? false : newValue;
        that.trigger('cellinput-selectchange', column.field, row, oldValue, index, $(this));
      });
    }
  });
  this.trigger('cellinput-init');
};

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/cell-input/cell-input.js":
/*!******************************************************************************************!*\
  !*** ./resources/assets/vendor/libs/bootstrap-table/extensions/cell-input/cell-input.js ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! bootstrap-table/src/extensions/cell-input/bootstrap-table-cell-input.js */ "./node_modules/bootstrap-table/src/extensions/cell-input/bootstrap-table-cell-input.js");

/***/ }),

/***/ 34:
/*!************************************************************************************************!*\
  !*** multi ./resources/assets/vendor/libs/bootstrap-table/extensions/cell-input/cell-input.js ***!
  \************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Work Source\Dev-website\Appwork_v1.4.0\v1.4.0\laravel-demo\resources\assets\vendor\libs\bootstrap-table\extensions\cell-input\cell-input.js */"./resources/assets/vendor/libs/bootstrap-table/extensions/cell-input/cell-input.js");


/***/ })

/******/ })));
