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
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/slider.js":
/*!********************************!*\
  !*** ./resources/js/slider.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    'use strict';

    var multiItemSlider = function () {
      function _isElementVisible(element) {
        var rect = element.getBoundingClientRect(),
            vWidth = window.innerWidth || doc.documentElement.clientWidth,
            vHeight = window.innerHeight || doc.documentElement.clientHeight,
            elemFromPoint = function elemFromPoint(x, y) {
          return document.elementFromPoint(x, y);
        };

        if (rect.right < 0 || rect.bottom < 0 || rect.left > vWidth || rect.top > vHeight) return false;
        return element.contains(elemFromPoint(rect.left, rect.top)) || element.contains(elemFromPoint(rect.right, rect.top)) || element.contains(elemFromPoint(rect.right, rect.bottom)) || element.contains(elemFromPoint(rect.left, rect.bottom));
      }

      return function (selector, config) {
        var _mainElement = document.querySelector(selector),
            // основный элемент блока
        _sliderWrapper = _mainElement.querySelector('.slider__wrapper'),
            // обертка для .slider-item
        _sliderItems = _mainElement.querySelectorAll('.slider__item'),
            // элементы (.slider-item)
        _sliderControls = _mainElement.querySelectorAll('.slider__control'),
            // элементы управления
        _sliderControlLeft = _mainElement.querySelector('.slider__control_left'),
            // кнопка "LEFT"
        _sliderControlRight = _mainElement.querySelector('.slider__control_right'),
            // кнопка "RIGHT"
        _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width),
            // ширина обёртки
        _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width),
            // ширина одного элемента
        _positionLeftItem = 0,
            // позиция левого активного элемента
        _transform = 0,
            // значение транфсофрмации .slider_wrapper
        _step = _itemWidth / _wrapperWidth * 100,
            // величина шага (для трансформации)
        _items = [],
            // массив элементов
        _interval = 0,
            _html = _mainElement.innerHTML,
            _states = [{
          active: false,
          minWidth: 0,
          count: 1
        }, {
          active: false,
          minWidth: 980,
          count: 2
        }],
            _config = {
          isCycling: false,
          // автоматическая смена слайдов
          direction: 'right',
          // направление смены слайдов
          interval: 5000,
          // интервал между автоматической сменой слайдов
          pause: true // устанавливать ли паузу при поднесении курсора к слайдеру

        };

        for (var key in config) {
          if (key in _config) {
            _config[key] = config[key];
          }
        } // наполнение массива _items


        _sliderItems.forEach(function (item, index) {
          _items.push({
            item: item,
            position: index,
            transform: 0
          });
        });

        var _setActive = function _setActive() {
          var _index = 0;
          var width = parseFloat(document.body.clientWidth);

          _states.forEach(function (item, index, arr) {
            _states[index].active = false;
            if (width >= _states[index].minWidth) _index = index;
          });

          _states[_index].active = true;
        };

        var _getActive = function _getActive() {
          var _index;

          _states.forEach(function (item, index, arr) {
            if (_states[index].active) {
              _index = index;
            }
          });

          return _index;
        };

        var position = {
          getItemMin: function getItemMin() {
            var indexItem = 0;

            _items.forEach(function (item, index) {
              if (item.position < _items[indexItem].position) {
                indexItem = index;
              }
            });

            return indexItem;
          },
          getItemMax: function getItemMax() {
            var indexItem = 0;

            _items.forEach(function (item, index) {
              if (item.position > _items[indexItem].position) {
                indexItem = index;
              }
            });

            return indexItem;
          },
          getMin: function getMin() {
            return _items[position.getItemMin()].position;
          },
          getMax: function getMax() {
            return _items[position.getItemMax()].position;
          }
        };

        var _transformItem = function _transformItem(direction) {
          var nextItem;

          if (!_isElementVisible(_mainElement)) {
            return;
          }

          if (direction === 'right') {
            _positionLeftItem++;

            if (_positionLeftItem + _wrapperWidth / _itemWidth - 1 > position.getMax()) {
              nextItem = position.getItemMin();
              _items[nextItem].position = position.getMax() + 1;
              _items[nextItem].transform += _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }

            _transform -= _step;
          }

          if (direction === 'left') {
            _positionLeftItem--;

            if (_positionLeftItem < position.getMin()) {
              nextItem = position.getItemMax();
              _items[nextItem].position = position.getMin() - 1;
              _items[nextItem].transform -= _items.length * 100;
              _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
            }

            _transform += _step;
          }

          _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
        };

        var _cycle = function _cycle(direction) {
          if (!_config.isCycling) {
            return;
          }

          _interval = setInterval(function () {
            _transformItem(direction);
          }, _config.interval);
        }; // обработчик события click для кнопок "назад" и "вперед"


        var _controlClick = function _controlClick(e) {
          if (e.target.classList.contains('slider__control')) {
            e.preventDefault();
            var direction = e.target.classList.contains('slider__control_right') ? 'right' : 'left';

            _transformItem(direction);

            clearInterval(_interval);

            _cycle(_config.direction);
          }
        }; // обработка события изменения видимости страницы


        var _handleVisibilityChange = function _handleVisibilityChange() {
          if (document.visibilityState === "hidden") {
            clearInterval(_interval);
          } else {
            clearInterval(_interval);

            _cycle(_config.direction);
          }
        };

        var _refresh = function _refresh() {
          clearInterval(_interval);
          _mainElement.innerHTML = _html;
          _sliderWrapper = _mainElement.querySelector('.slider__wrapper');
          _sliderItems = _mainElement.querySelectorAll('.slider__item');
          _sliderControls = _mainElement.querySelectorAll('.slider__control');
          _sliderControlLeft = _mainElement.querySelector('.slider__control_left');
          _sliderControlRight = _mainElement.querySelector('.slider__control_right');
          _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width);
          _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width);
          _positionLeftItem = 0;
          _transform = 0;
          _step = _itemWidth / _wrapperWidth * 100;
          _items = [];

          _sliderItems.forEach(function (item, index) {
            _items.push({
              item: item,
              position: index,
              transform: 0
            });
          });
        };

        var _setUpListeners = function _setUpListeners() {
          _mainElement.addEventListener('click', _controlClick);

          if (_config.pause && _config.isCycling) {
            _mainElement.addEventListener('mouseenter', function () {
              clearInterval(_interval);
            });

            _mainElement.addEventListener('mouseleave', function () {
              clearInterval(_interval);

              _cycle(_config.direction);
            });
          }

          document.addEventListener('visibilitychange', _handleVisibilityChange, false);
          window.addEventListener('resize', function () {
            var _index = 0,
                width = parseFloat(document.body.clientWidth);

            _states.forEach(function (item, index, arr) {
              if (width >= _states[index].minWidth) _index = index;
            });

            if (_index !== _getActive()) {
              _setActive();

              _refresh();
            }
          });
        }; // инициализация


        _setUpListeners();

        if (document.visibilityState === "visible") {
          _cycle(_config.direction);
        }

        _setActive();

        return {
          right: function right() {
            // метод right
            _transformItem('right');
          },
          left: function left() {
            // метод left
            _transformItem('left');
          },
          stop: function stop() {
            // метод stop
            _config.isCycling = false;
            clearInterval(_interval);
          },
          cycle: function cycle() {
            // метод cycle
            _config.isCycling = true;
            clearInterval(_interval);

            _cycle();
          }
        };
      };
    }(); // sessionStorage.setItem('slider_enable', false);


    console.log('slider_enable: ', sessionStorage.getItem('slider_enable'), sessionStorage.getItem('slider_enable') == 'true', sessionStorage.getItem('slider_enable') == 'false');
    var slider = multiItemSlider('.slider', {
      isCycling: sessionStorage.getItem('slider_enable') == 'true'
    });
    setTimeout(function () {
      multiItemSlider('.slider', {
        isCycling: sessionStorage.getItem('slider_enable') == 'true'
      });
    }, 42000);
  });
})(jQuery);

/***/ }),

/***/ 7:
/*!**************************************!*\
  !*** multi ./resources/js/slider.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/slider.js */"./resources/js/slider.js");


/***/ })

/******/ });