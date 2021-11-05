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
/******/ 	return __webpack_require__(__webpack_require__.s = 9);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sources.js":
/*!*********************************!*\
  !*** ./resources/js/sources.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
 Color animation 1.6.0
 http://www.bitstorm.org/jquery/color-animation/
 Copyright 2011, 2013 Edwin Martin
 Released under the MIT and GPL licenses.
*/


(function (d) {
  function h(a, b, e) {
    var c = "rgb" + (d.support.rgba ? "a" : "") + "(" + parseInt(a[0] + e * (b[0] - a[0]), 10) + "," + parseInt(a[1] + e * (b[1] - a[1]), 10) + "," + parseInt(a[2] + e * (b[2] - a[2]), 10);
    d.support.rgba && (c += "," + (a && b ? parseFloat(a[3] + e * (b[3] - a[3])) : 1));
    return c + ")";
  }

  function f(a) {
    var b;
    return (b = /#([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})/.exec(a)) ? [parseInt(b[1], 16), parseInt(b[2], 16), parseInt(b[3], 16), 1] : (b = /#([0-9a-fA-F])([0-9a-fA-F])([0-9a-fA-F])/.exec(a)) ? [17 * parseInt(b[1], 16), 17 * parseInt(b[2], 16), 17 * parseInt(b[3], 16), 1] : (b = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(a)) ? [parseInt(b[1]), parseInt(b[2]), parseInt(b[3]), 1] : (b = /rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9\.]*)\s*\)/.exec(a)) ? [parseInt(b[1], 10), parseInt(b[2], 10), parseInt(b[3], 10), parseFloat(b[4])] : l[a];
  }

  d.extend(!0, d, {
    support: {
      rgba: function () {
        var a = d("script:first"),
            b = a.css("color"),
            e = !1;
        if (/^rgba/.test(b)) e = !0;else try {
          e = b != a.css("color", "rgba(0, 0, 0, 0.5)").css("color"), a.css("color", b);
        } catch (c) {}
        return e;
      }()
    }
  });
  var k = "color backgroundColor borderBottomColor borderLeftColor borderRightColor borderTopColor outlineColor".split(" ");
  d.each(k, function (a, b) {
    d.Tween.propHooks[b] = {
      get: function get(a) {
        return d(a.elem).css(b);
      },
      set: function set(a) {
        var c = a.elem.style,
            g = f(d(a.elem).css(b)),
            m = f(a.end);

        a.run = function (a) {
          c[b] = h(g, m, a);
        };
      }
    };
  });
  d.Tween.propHooks.borderColor = {
    set: function set(a) {
      var b = a.elem.style,
          e = [],
          c = k.slice(2, 6);
      d.each(c, function (b, c) {
        e[c] = f(d(a.elem).css(c));
      });
      var g = f(a.end);

      a.run = function (a) {
        d.each(c, function (d, c) {
          b[c] = h(e[c], g, a);
        });
      };
    }
  };
  var l = {
    aqua: [0, 255, 255, 1],
    azure: [240, 255, 255, 1],
    beige: [245, 245, 220, 1],
    black: [0, 0, 0, 1],
    blue: [0, 0, 255, 1],
    brown: [165, 42, 42, 1],
    cyan: [0, 255, 255, 1],
    darkblue: [0, 0, 139, 1],
    darkcyan: [0, 139, 139, 1],
    darkgrey: [169, 169, 169, 1],
    darkgreen: [0, 100, 0, 1],
    darkkhaki: [189, 183, 107, 1],
    darkmagenta: [139, 0, 139, 1],
    darkolivegreen: [85, 107, 47, 1],
    darkorange: [255, 140, 0, 1],
    darkorchid: [153, 50, 204, 1],
    darkred: [139, 0, 0, 1],
    darksalmon: [233, 150, 122, 1],
    darkviolet: [148, 0, 211, 1],
    fuchsia: [255, 0, 255, 1],
    gold: [255, 215, 0, 1],
    green: [0, 128, 0, 1],
    indigo: [75, 0, 130, 1],
    khaki: [240, 230, 140, 1],
    lightblue: [173, 216, 230, 1],
    lightcyan: [224, 255, 255, 1],
    lightgreen: [144, 238, 144, 1],
    lightgrey: [211, 211, 211, 1],
    lightpink: [255, 182, 193, 1],
    lightyellow: [255, 255, 224, 1],
    lime: [0, 255, 0, 1],
    magenta: [255, 0, 255, 1],
    maroon: [128, 0, 0, 1],
    navy: [0, 0, 128, 1],
    olive: [128, 128, 0, 1],
    orange: [255, 165, 0, 1],
    pink: [255, 192, 203, 1],
    purple: [128, 0, 128, 1],
    violet: [128, 0, 128, 1],
    red: [255, 0, 0, 1],
    silver: [192, 192, 192, 1],
    white: [255, 255, 255, 1],
    yellow: [255, 255, 0, 1],
    transparent: [255, 255, 255, 0]
  };
})(jQuery);

/***/ }),

/***/ 9:
/*!***************************************!*\
  !*** multi ./resources/js/sources.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/sources.js */"./resources/js/sources.js");


/***/ })

/******/ });