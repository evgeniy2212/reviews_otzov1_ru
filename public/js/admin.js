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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    $(".admin-filter-select").change(function () {
      var slug = $(this).attr('name');
      var item = $(this).children("option:selected").val();
      var str = window.location.search;
      str = replaceQueryParam(slug, item, str);
      str = replaceQueryParam('page', 1, str);
      window.location = window.location.pathname + str;
    });
    $(".admin-complain").click(function () {
      var slug = $(this).attr('name');
      var item = $(this).attr('value');
      var str = window.location.search;
      str = replaceQueryParam(slug, item, str);
      str = replaceQueryParam('page', 1, str);
      window.location = window.location.pathname + str;
    });
    var minDate = $("#adminDatepickerDifMinRange").length > 0 ? $("#adminDatepickerDifMinRange").val() : 0;
    var maxDate = $("#adminDatepickerDifMaxRange").length > 0 ? $("#adminDatepickerDifMaxRange").val() : 0;
    $(function () {
      $(".adminReviewdatepicker").datepicker({
        minDate: -minDate,
        maxDate: maxDate
      });
    });
    $(".adminFilterButton").click(function (event) {
      var str = window.location.search;
      str = replaceQueryParam($(".adminFilters .select").attr('name'), $(".adminFilters .select").val(), str);
      str = replaceQueryParam('from', $(".adminFilterDatepicker [name='from']").val(), str);
      str = replaceQueryParam('to', $(".adminFilterDatepicker [name='to']").val(), str);
      str = replaceQueryParam('page', 1, str);
      window.location = window.location.pathname + str;
    });
    $(".admin-data-filter-select").change(function () {
      var slug = $(this).attr('name');
      var item = $(this).children("option:selected").val();
      var str = window.location.search;
      str = replaceQueryParam(slug, item, str);
      window.location = window.location.pathname + str;
    });
    $('.deleteLogo').click(function () {
      var id = $(this).data("logoId");
      var name = $(this).data("reviewName");
      var categoryName = $(this).data("reviewCategoryName");
      var url = $("#deleteLogoForm").data('action');
      url = url.replace(':id', id);
      console.log(id, name, categoryName, url);
      $("#deleteLogoForm").attr('action', url);
      $("#reviewName").text(name);
      $("#reviewCategoryName").text(categoryName);
    });
    $('select[id^="bannerType"]').change(function () {
      var bannerId = $(this).data('bannerId');
      var banner = $('#banner-' + bannerId);

      if ($(this).val() == window.banner_types.text) {
        banner.find('#bannerImagePreview').hide();
        banner.find('#title').hide();
        banner.find('#link').hide();
        banner.find('#uploadBannerContainer').hide();
        banner.find('#bannerTextPreview').show();
      } else {
        banner.find('#bannerTextPreview').hide();
        banner.find('#title').show();
        banner.find('#link').show();
        banner.find('#uploadBannerContainer').show();
        banner.find('#bannerImagePreview').show();
      }
    });
    $('[id^="reviewEditBtn"]').on('click', function () {
      $('[id^="moderationInput"]').attr('readonly', true);
      var reviewId = $(this).data('review-id');
      !$('#moderationInput' + reviewId).attr('readonly') ? $('#moderationInput' + reviewId).attr('readonly', true) : $('#moderationInput' + reviewId).removeAttr('readonly');
    }); // admin navigation menu handler

    $('[id^="moderationInput"]').focusout(function () {
      if ($(this).attr('readonly') !== 'readonly') {
        var reviewId = $(this).data('review-id');
        $('#newGroupName' + reviewId).val($(this).val());
      }
    });
  });

  function replaceQueryParam(param, newval, search) {
    var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
    var query = search.replace(regex, "$1").replace(/&$/, '');
    return (query.length > 2 ? query + "&" : "?") + (newval ? param + "=" + newval : '');
  }
})(jQuery);

/***/ }),

/***/ 8:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/admin.js */"./resources/js/admin.js");


/***/ })

/******/ });