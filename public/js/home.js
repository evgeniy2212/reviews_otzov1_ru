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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/home.js":
/*!******************************!*\
  !*** ./resources/js/home.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    sessionStorage.setItem('slider_enable', false);
  });

  window.onload = function () {
    var startHomeHeight = 0; // var containerMainHeight = $('.main').outerHeight();

    var containerMainHeight = $('.home-content-place').outerHeight();
    console.log('containerMainHeight: ', containerMainHeight); // console.log('document.getElementById(audio): ', document.getElementById('audio'));
    // var myAudio = $("#audio")[0];
    // myAudio.play();

    var loaded = sessionStorage.getItem('loaded');
    sessionStorage.setItem('loaded', true); // $('.home *').show();
    // if(loaded !== 'true') {

    sessionStorage.setItem('slider_enable', false);
    $('.nav-gradient').addClass('nav-first-menu-showing');
    $('.navigate li a').addClass('first-menu-showing');

    for (var i = 0; i <= 2; i++) {
      setTimeout(function () {
        // if(i >= 1){
        //     setTimeout(function(){
        //         $('.nav-gradient').removeClass('nav-first-menu-showing');
        //     }, 1000);
        // }
        $('.navigate li a').each(function (i) {
          $(this).delay(150 * i).fadeTo(100, 1);
          $(this).delay(100 * i).not(".menu-active a").fadeTo(100, 0);
        });
      }, 1250 * i);
    }

    setTimeout(function () {
      $('.nav-gradient').removeClass('');

      if ($(window).width() < 860) {
        $('.navigate li a').each(function (i) {
          $(this).delay(150 * i).fadeTo(100, 1);
        });
      }
    }, 4000);
    setTimeout(function () {
      $('.navigate li a').removeClass('first-menu-showing');
    }, 22500); // setTimeout(function(){
    //     $('.home .home-main-content').fadeTo( 1000, 1 );
    // }, 4000);

    setTimeout(function () {
      $('.home .home-title').each(function (index) {
        var $this = $(this);
        setTimeout(function () {
          $this.delay(500 * index).fadeTo(150, 1).fadeTo(150, 0).fadeTo(150, 1).fadeTo(150, 0).fadeTo(150, 1).fadeTo(150, 0).fadeTo(150, 1);
        }, 21500 * index);
      });
    }, 4000);
    setTimeout(function () {
      var mainContentDelay = 0;
      $('.home-main-content').each(function (index) {
        var item = $(this);
        $("#audio")[0].play();
        setTimeout(function () {
          $("#audio")[0].play();
          item.parent().fadeTo(250, 1);
          item.fadeTo(250, 1);
          item.animate_Text();

          if ($('.home').height() > $('.home-content-place').height()) {
            // console.log('home-main-content down');
            animateContent('down');
          }
        }, mainContentDelay);
        mainContentDelay = item.text().length * 3 + mainContentDelay;
      });
    }, 5250);
    setTimeout(function () {
      startHomeHeight = $('.home').height();
      var heightIndex = 0;
      $('.home-point img').each(function (index) {
        var $this = $(this);
        $(this).delay(250 * (index + 1)).fadeTo(200, 1);
        setTimeout(function () {
          if ($('.home-point').height() * index + startHomeHeight > containerMainHeight) {
            ++heightIndex;
            animateContent('down', 50 * heightIndex, 200);
          }
        }, 250 * (index + 1));
      }); // animateContent('up');
    }, 7000);
    setTimeout(function () {
      if ($('.home').height() > containerMainHeight) {
        animateContent('up', $('.home-point').height() + 50, 100);
      } // }

    }, 10300);
    setTimeout(function () {
      // var startHomePointTitle = $( ".home-point img" ).first().position().top;
      var heightIndex = 0;
      $('.home .home-point-title').each(function (index) {
        setTimeout(function () {
          // console.log('degree условие: ', $('.home-point').height(), ($('.home-point').height() * index + startHomeHeight + 20), index, );
          if ($('.home-point').height() * index + startHomeHeight + 20 > containerMainHeight) {
            // console.log('degree outerHeight: ', $('.home-point').outerHeight());
            var degree = $('.home-point').outerHeight() * heightIndex + startHomeHeight + 20; //                            let degree = ($('.home-point').outerHeight() * heightIndex) + 50;
            //                             console.log('degree: ', degree);

            if (degree > containerMainHeight) {
              animateContent('down', degree, 100);
            }

            ++heightIndex;
          }
        }, 600 * index);

        if (index > 0) {
          $(this).delay(600 * index).fadeTo(175, 1).fadeTo(175, 0).fadeTo(175, 1);
        } else {
          $(this).delay(600 * index).fadeTo(175, 1).fadeTo(175, 0).fadeTo(175, 1);
        }
      });
    }, 10500);
    setTimeout(function () {
      if ($('.home').height() > containerMainHeight) {
        animateContent('up');
        animateContent('down', startHomeHeight, 250);
      }

      var delay = 0;
      var textHeightDegree = startHomeHeight;
      var textHeightDifferenceDegree = 0;
      $('.home-point-show').each(function (index) {
        var item = $(this);
        $("#audio")[0].play();
        setTimeout(function () {
          $("#audio")[0].play();
          item.parent().fadeTo(50, 1);
          item.fadeTo(25, 1);
          item.animate_Text();

          if (window.matchMedia('(max-width: 768px)').matches) {
            if (index < 10 || index > 13 && index <= 16) {
              textHeightDegree = item.parent().height() + textHeightDegree;
            } else {
              textHeightDegree = item.height() + textHeightDegree + 50;
            }

            animateContent('down', textHeightDegree, 50);
          } else {
            if (index < 10 || index > 13 && index <= 16) {
              textHeightDegree = item.parent().height() + textHeightDegree;
            } else if (index > 16) {
              textHeightDegree = item.height() + textHeightDegree + 60;
            } else {
              textHeightDegree = item.height() + textHeightDegree;
            }

            textHeightDifferenceDegree = textHeightDegree - containerMainHeight;

            if (textHeightDegree > containerMainHeight) {
              animateContent('down', textHeightDifferenceDegree, 10);
            }
          }
        }, delay);
        delay = item.text().length * 2 + delay;
      });
      setTimeout(function () {
        if ($('.home').height() > containerMainHeight) {
          animateContent('up');
        }
      }, delay + 1000);
      setTimeout(function () {
        // if(localStorage.getItem('hideAlert') == 'false'){
        $("#instructionModal").modal('show');
        sessionStorage.setItem('slider_enable', true); // }
      }, delay + 2000);
    }, 18000); // } else {
    //     $('.home *').show();
    // }
  };

  $.fn.animate_Text = function () {
    var string = $.trim(this.text());
    return this.each(function () {
      var $this = $(this);
      $this.html(string.replace(/./g, '<span class="new">$&</span>'));
      $this.find('span.new').each(function (i, el) {
        setTimeout(function () {
          $(el).addClass('div_opacity');
        }, 2 * i);
      });
    });
  };

  function animateContent(direction) {
    var inputAddingHeight = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var animateSpeed = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 500;
    // var animationOffset = $('.home-content-place').height() - $('.home').height();
    // var animationOffset = $('.home-content-place').height();
    // // var animationOffset = $('.container').outerHeight() + $('.main').outerHeight();
    // if (direction == 'up') {
    //     animationOffset = 0;
    // }
    // console.log('homeContentOuterHeight: ', $('.home-content-place').outerHeight());
    // console.log('homeOuterHeight: ', $('.home').outerHeight());
    // console.log('inputAddingHeight: ', inputAddingHeight);
    console.log('-inputAddingHeight: ', inputAddingHeight, -inputAddingHeight); // console.log('animationOffset: ', animationOffset);
    // console.log('animationContent: ', -animationOffset-inputAddingHeight);

    $('.home').animate({
      "marginTop": -inputAddingHeight + "px"
    }, animateSpeed);
  }

  function Utils() {}

  Utils.prototype = {
    constructor: Utils,
    isElementInView: function isElementInView(element, fullyInView) {
      var pageTop = $(window).scrollTop();
      var pageBottom = pageTop + $(window).height();
      var elementTop = $(element).offset().top;
      var elementBottom = elementTop + $(element).height();

      if (fullyInView === true) {
        return pageTop < elementTop && pageBottom > elementBottom;
      } else {
        return elementTop <= pageBottom && elementBottom >= pageTop;
      }
    }
  };
  var Utils = new Utils();
})(jQuery);

/***/ }),

/***/ 3:
/*!************************************!*\
  !*** multi ./resources/js/home.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/home.js */"./resources/js/home.js");


/***/ })

/******/ });