/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 1/5/20, 1:52 AM
 * Last Modified: 12/22/19, 10:14 PM
 * Project Name: Wafaq
 * File Name: print.js
 */

/*
 * Created by PhpStorm.
 * Developer: Tariq Ayman ( tariq.ayman94@gmail.com )
 * Date: 12/22/19, 10:14 PM
 * Last Modified: 12/19/19, 10:37 PM
 *
 * File Name: print.js
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
/******/ 	return __webpack_require__(__webpack_require__.s = 50);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/bootstrap-table/src/extensions/print/bootstrap-table-print.js":
/*!************************************************************************************!*\
  !*** ./node_modules/bootstrap-table/src/extensions/print/bootstrap-table-print.js ***!
  \************************************************************************************/
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
 * @update zhixin wen <wenzhixin2010@gmail.com>
 */
var Utils = $.fn.bootstrapTable.utils;

function printPageBuilderDefault(table) {
  return "\n  <html>\n  <head>\n  <style type=\"text/css\" media=\"print\">\n  @page {\n    size: auto;\n    margin: 25px 0 25px 0;\n  }\n  </style>\n  <style type=\"text/css\" media=\"all\">\n  table {\n    border-collapse: collapse;\n    font-size: 12px;\n  }\n  table, th, td {\n    border: 1px solid grey;\n  }\n  th, td {\n    text-align: center;\n    vertical-align: middle;\n  }\n  p {\n    font-weight: bold;\n    margin-left:20px;\n  }\n  table {\n    width:94%;\n    margin-left:3%;\n    margin-right:3%;\n  }\n  div.bs-table-print {\n    text-align:center;\n  }\n  </style>\n  </head>\n  <title>Print Table</title>\n  <body>\n  <p>Printed on: ".concat(new Date(), " </p>\n  <div class=\"bs-table-print\">").concat(table, "</div>\n  </body>\n  </html>");
}

$.extend($.fn.bootstrapTable.defaults, {
  showPrint: false,
  printAsFilteredAndSortedOnUI: true,
  printSortColumn: undefined,
  printSortOrder: 'asc',
  printPageBuilder: function printPageBuilder(table) {
    return printPageBuilderDefault(table);
  }
});
$.extend($.fn.bootstrapTable.COLUMN_DEFAULTS, {
  printFilter: undefined,
  printIgnore: false,
  printFormatter: undefined
});
$.extend($.fn.bootstrapTable.defaults.icons, {
  print: {
    bootstrap3: 'glyphicon-print icon-share'
  }[$.fn.bootstrapTable.theme] || 'fa-print'
});

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

      this.showToolbar = this.showToolbar || this.options.showPrint;

      for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
        args[_key] = arguments[_key];
      }

      (_get2 = _get(_getPrototypeOf(_class.prototype), "initToolbar", this)).call.apply(_get2, [this].concat(args));

      if (!this.options.showPrint) {
        return;
      }

      var $btnGroup = this.$toolbar.find('>.columns');
      var $print = $btnGroup.find('button.bs-print');

      if (!$print.length) {
        $print = $("\n        <button class=\"".concat(this.constants.buttonsClass, " bs-print\" type=\"button\">\n        <i class=\"").concat(this.options.iconsPrefix, " ").concat(this.options.icons.print, "\"></i>\n        </button>")).appendTo($btnGroup);
      }

      $print.off('click').on('click', function () {
        _this.doPrint(_this.options.printAsFilteredAndSortedOnUI ? _this.getData() : _this.options.data.slice(0));
      });
    }
  }, {
    key: "doPrint",
    value: function doPrint(data) {
      var _this2 = this;

      var formatValue = function formatValue(row, i, column) {
        var value = row[column.field];

        if (typeof column.printFormatter === 'function') {
          return column.printFormatter.apply(column, [value, row, i]);
        }

        return typeof value === 'undefined' ? '-' : value;
      };

      var buildTable = function buildTable(data, columnsArray) {
        var dir = _this2.$el.attr('dir') || 'ltr';
        var html = ["<table dir=\"".concat(dir, "\"><thead>")];
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = columnsArray[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            var _columns = _step.value;
            html.push('<tr>');

            for (var h = 0; h < _columns.length; h++) {
              if (!_columns[h].printIgnore) {
                html.push("<th\n              ".concat(Utils.sprintf(' rowspan="%s"', _columns[h].rowspan), "\n              ").concat(Utils.sprintf(' colspan="%s"', _columns[h].colspan), "\n              >").concat(_columns[h].title, "</th>"));
              }
            }

            html.push('</tr>');
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

        html.push('</thead><tbody>');

        for (var i = 0; i < data.length; i++) {
          html.push('<tr>');
          var _iteratorNormalCompletion2 = true;
          var _didIteratorError2 = false;
          var _iteratorError2 = undefined;

          try {
            for (var _iterator2 = columnsArray[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
              var columns = _step2.value;

              for (var j = 0; j < columns.length; j++) {
                if (!columns[j].printIgnore && columns[j].field) {
                  html.push('<td>', formatValue(data[i], i, columns[j]), '</td>');
                }
              }
            }
          } catch (err) {
            _didIteratorError2 = true;
            _iteratorError2 = err;
          } finally {
            try {
              if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
                _iterator2.return();
              }
            } finally {
              if (_didIteratorError2) {
                throw _iteratorError2;
              }
            }
          }

          html.push('</tr>');
        }

        html.push('</tbody></table>');
        return html.join('');
      };

      var sortRows = function sortRows(data, colName, sortOrder) {
        if (!colName) {
          return data;
        }

        var reverse = sortOrder !== 'asc';
        reverse = -(+reverse || -1);
        return data.sort(function (a, b) {
          return reverse * a[colName].localeCompare(b[colName]);
        });
      };

      var filterRow = function filterRow(row, filters) {
        for (var index = 0; index < filters.length; ++index) {
          if (row[filters[index].colName] !== filters[index].value) {
            return false;
          }
        }

        return true;
      };

      var filterRows = function filterRows(data, filters) {
        return data.filter(function (row) {
          return filterRow(row, filters);
        });
      };

      var getColumnFilters = function getColumnFilters(columns) {
        return !columns || !columns[0] ? [] : columns[0].filter(function (col) {
          return col.printFilter;
        }).map(function (col) {
          return {
            colName: col.field,
            value: col.printFilter
          };
        });
      };

      data = filterRows(data, getColumnFilters(this.options.columns));
      data = sortRows(data, this.options.printSortColumn, this.options.printSortOrder);
      var table = buildTable(data, this.options.columns);
      var newWin = window.open('');
      newWin.document.write(this.options.printPageBuilder.call(this, table));
      newWin.print();
      newWin.close();
    }
  }]);

  return _class;
}($.BootstrapTable);

/***/ }),

/***/ "./resources/assets/vendor/libs/bootstrap-table/extensions/print/print.js":
/*!********************************************************************************!*\
  !*** ./resources/assets/vendor/libs/bootstrap-table/extensions/print/print.js ***!
  \********************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! bootstrap-table/src/extensions/print/bootstrap-table-print.js */ "./node_modules/bootstrap-table/src/extensions/print/bootstrap-table-print.js");

/***/ }),

/***/ 50:
/*!**************************************************************************************!*\
  !*** multi ./resources/assets/vendor/libs/bootstrap-table/extensions/print/print.js ***!
  \**************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Work Source\Dev-website\Appwork_v1.4.0\v1.4.0\laravel-demo\resources\assets\vendor\libs\bootstrap-table\extensions\print\print.js */"./resources/assets/vendor/libs/bootstrap-table/extensions/print/print.js");


/***/ })

/******/ })));
