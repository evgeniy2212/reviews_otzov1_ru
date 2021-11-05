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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/profile.js":
/*!*********************************!*\
  !*** ./resources/js/profile.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    // admin navigation menu handler
    $('.js_navigation-btn').on('click', function () {
      $('body').addClass('profile-navigation--active').addClass('no--scroll');
    });
    $('.js_page-overlay').on('click', function () {
      $('body').removeClass('profile-navigation--active').removeClass('no--scroll');
    });
    $('.deleteReview').click(function () {
      var id = $(this).attr("data-review-id");
      var is_owner = $(this).attr("data-review-is-owner");
      var name = $(this).attr("data-review-name");
      var url = $(this).attr('data-action');
      url = url.replace(':id', id);
      url = url.replace(':is_owner', is_owner);
      $("#deleteReviewForm").attr('action', url);
      setModalData(name);
    });
    $('.deleteComment').click(function () {
      var id = $(this).data("reviewId");
      console.log(id);
      var url = $("#deleteCommentForm").data('action');
      url = url.replace(':id', id);
      $("#deleteCommentForm").attr('action', url);
    });
    $('.deleteMessage').click(function () {
      var id = $(this).attr("data-review-id");
      var url = $(this).attr('data-action');
      url = url.replace(':id', id);
      $("#deleteMessageForm").attr('action', url);
    });
    $('#editReview').click(function () {
      var name = $(this).data("reviewName");
      setModalData(name);
    });
    $('[id^="enableEditCommentButton"]').click(function () {
      var editForm = $(this).data('form');
      $('#' + editForm).find('textarea').each(function () {
        $(this).prop("disabled", false);
      });
      $(this).parent().find('[id^="saveCommentButton"]').show();
      $(this).parent().find('[id^="cancelSaveCommentButton"]').show();
    });
    $('[id^="saveCommentButton"]').click(function () {
      var saveForm = $(this).data('form');
      $("#" + saveForm).submit();
    });
    $('[id^="cancelSaveCommentButton"]').click(function () {
      var cancelForm = $(this).data('form');
      $('#' + cancelForm).find('textarea').each(function () {
        $(this).prop("disabled", true);
      });
      $(this).parent().find('[id^="saveCommentButton"]').hide();
      $(this).parent().find('[id^="cancelSaveCommentButton"]').hide();
    }); // $('#confirmReviewButton').click(function(){
    //     console.log('confirmReviewButton');
    //     console.log($('[id^="ReviewForm"]'));
    //     $('[id^="ReviewForm"]').submit();
    // });

    $(function () {
      $(".datepicker").datepicker({
        minDate: 0
      });
    });
    $('#imgBanner').change(function () {
      readImageURL(this);
    });
    $("#bannerButton").click(function (event) {
      var form = $("#bannerForm");

      if ($('#bannerCategory option:selected').val() == '') {
        $('#bannerCategory').addClass('invalid-selector');
      } else {
        $('#bannerCategory').removeClass("invalid-selector");
      }

      if ($('#imgBanner').val() == '') {
        $('.bannerFileUpload').addClass('invalid-selector');
      } else {
        $('.bannerFileUpload').removeClass("invalid-selector");
      }

      validation(form, event);
    });
    $("#congratulationButton").click(function (event) {
      var form = $("#congratulationForm");

      if ($('#selectRegion option:selected').val() == '') {
        $('#selectRegion').addClass('invalid-selector');
      } else {
        $('#selectRegion').removeClass("invalid-selector");
      }

      if ($('#selectCongratulationStatus option:selected').val() == '') {
        $('#selectCongratulationStatus').animate({
          borderColor: "#de1529"
        }, 250).delay(250).animate({
          borderColor: "#2f5496"
        }, 250).delay(250).animate({
          borderColor: "#de1529"
        }, 250).delay(250).animate({
          borderColor: "#2f5496"
        }, 250).delay(250).queue(function (next) {
          $(this).addClass("invalid-selector");
          next();
        });
      } else {
        $('#selectCongratulationStatus').removeClass("invalid-selector");
        $('#name').removeClass("invalid-selector");
        $('#second_name').removeClass("invalid-selector");

        if ($('#selectCongratulationStatus option:selected').val() == '1') {
          var url = $('#selectCongratulationStatus').data('baseUrl');
          var name = $('#name').val();
          var last_name = $('#second_name').val();

          if (url !== '', name !== '' && last_name !== '') {
            $.ajax({
              url: url + "/profile/ajax/check-user?name=" + name + '&last_name=' + last_name,
              dataType: "json",
              success: function success(data) {
                if (data.is_exist !== true) {
                  $('#errorUserExisting').modal('show');
                  $('#name').addClass('invalid-input');
                  $('#second_name').addClass('invalid-input');
                } else {
                  $('#name').removeClass("invalid-input");
                  $('#second_name').removeClass("invalid-input");
                }
              }
            });
          }
        }
      }

      if ($('#selectCountry optioSn:selected').val() == '') {
        $('#selectCountry').addClass('invalid-selector');
      } else {
        $('#selectCountry').removeClass("invalid-selector");
      }

      if ($('#selectCategoryCongrats option:selected').val() == '' || $('#selectCategoryCongrats option:selected').val() == 'Select') {
        $('#selectCategoryCongrats').addClass('invalid-selector');
      } else {
        $('#selectCategoryCongrats').removeClass("invalid-selector");
      }

      validation(form, event);

      if ($('#congratulationForm #videoCongratulation').prop('files')[0] && form.hasClass('valid-form')) {
        $('.create-congratulation-image').hide();
        $('#inTurnFadingTextG').show();
      }
    });

    if ($(window).width() >= 860) {
      $('[id^="profilePrivateCongratulationButton"]').click(function (event) {
        var congratulation = $(this).parent().parent().parent().parent().parent();
        var review_content = $(this).parent().parent();
        var url = $(this).attr('data-url');
        var is_open = $(this).text().trim() !== 'Close';
        is_open ? $(this).text('Close') : $(this).text('Show');

        if (is_open) {
          congratulation.css({
            'overflow': 'visible'
          });
          var autoheight = congratulation.find('.profile-single-congratulation').height();
          congratulation.animate({
            height: autoheight
          }, 500);
          setTimeout(function () {
            congratulation.css({
              'overflow': 'visible'
            });
          }, 510);
          $.ajax({
            url: url,
            dataType: "json",
            success: function success(data) {
              console.log('SUCCESS');
              console.log('data: ', data);
            }
          });
          congratulation.removeClass('unread-single-congratulation-private');
        } else {
          congratulation.css({
            'overflow': 'hidden'
          });
          congratulation.animate({
            height: "130px"
          }, 500);
          setTimeout(function () {
            congratulation.css({
              'overflow': 'hidden'
            });
          }, 510);
        }
      });
    } else {
      // const singlePrivate = document.querySelectorAll('.single-congratulation-private');
      // singlePrivate.forEach(function (item) {
      //    const height = item.querySelector('.congratulation-text').offsetHeight;
      //     item.querySelector('.congratulation-text').style.height = '130px';
      // });
      // $('.single-congratulation-private').find('.congratulation-text').css('height', '130px');
      $('[id^="profilePrivateCongratulationButton"]').click(function (event) {
        var congratulation = $(this).parent().parent().parent().parent().parent();
        var review_content = $(this).parent().parent();
        var url = $(this).attr('data-url');
        var is_open = $(this).text().trim() !== 'Close';
        var height = $(this).closest('.single-congratulation-private').find('.congratulation-text').height();
        is_open ? $(this).text('Close') : $(this).text('Show');

        if (is_open) {
          $.ajax({
            url: url,
            dataType: "json",
            success: function success(data) {
              console.log('SUCCESS');
              console.log('data: ', data);
            }
          });
          congratulation.removeClass('unread-single-congratulation-private'); // $(this).closest('.single-congratulation-private').find('.congratulation-text-wrap').animate({
          //     height: height,
          // }, 300 );

          if ($(this).closest('.single-congratulation-private').find('.congratulation-text').height() >= '35') {
            $(this).closest('.single-congratulation-private').find('.congratulation-text-wrap').css('height', "".concat(height, "px"));
          }
        } else {
          // $(this).closest('.single-congratulation-private').find('.congratulation-text-wrap').animate({
          //     height: '130px',
          // }, 300 );
          if ($(this).closest('.single-congratulation-private').find('.congratulation-text').height() >= '35') {
            $(this).closest('.single-congratulation-private').find('.congratulation-text-wrap').css('height', '35px');
          }
        }
      });
    }

    $('#imgCongratulation').change(function () {
      readImageURL(this);
    });
    $('#videoCongratulation').change(function () {
      if (this.files[0].size > 100000000) {
        alert("The file must be less than 100 MB!");
        this.value = "";
        var defaultDescription = $(this).data('defaultDescription');
        $(this).parent().find('span').text(defaultDescription);
      } else {
        readVideoURL(this);
        $('.videoPreview').hide();
        $('.congratulationVideoPreview').show();
      }
    });
    $('#imgDefaultCongratulation').click(function () {
      $('.congratulationContentContainer').hide();
      $('.congratulationDefaultImagesContainer').css('display', 'flex');
    });
    $('#imgCongratulation, #videoCongratulation').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
    });
    $('#imgDefaultCongratulationClose').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
      var src = '';

      if ($('#imgCongratulation').data('src') === '') {
        src = $('#blah').data('defaultSrc');
      } else {
        src = $('#imgCongratulation').data('src');
      }

      $('#blah').attr('src', src);
      $('#blah').data('src', src);
    });
    $('#imgDefaultCongratulationSave').click(function () {
      $('.congratulationContentContainer').css('display', 'flex');
      $('.congratulationDefaultImagesContainer').hide();
      var src = $('.congratulationDefaultImages .congratulationHighlight').find('img').attr('src');
      var saveImage = $('.congratulationDefaultImages .congratulationHighlight').find('img').data('imageid');
      $('#imgDefaultCongratulationValue').val(saveImage);
      $('#blah').attr('src', src);
      $('#blah').data('src', src);
      $('#blah').data('defaultSrc', src);
      $('#imgCongratulation').val('');
      $('#imgCongratulation').data('src', '');
      var uploadingImageInput = $('#imgCongratulation').parent().find('span');
      uploadingImageInput.text(uploadingImageInput.data('placeholder'));
    });
    $(".congratulationDefaultImagePreview").hover(function () {
      $('#blah').attr('src', $(this).find('img').attr('src'));
    }, function () {
      $('#blah').attr('src', $('#blah').data('src'));
    });
    $('.congratulationDefaultImagePreview').click(function () {
      var $this = $(this); // Clear formatting

      $('.congratulationDefaultImagePreview').removeClass('congratulationHighlight'); // Highlight with coloured border

      $this.addClass('congratulationHighlight');
      var src = $(this).find('img').attr('src');
      $('#blah').attr('src', src);
      $('#blah').data('src', src);
    });
    $('.congratulationDefaultImages').click(function () {
      $('.congratulationContentContainer').hide();
      $('.congratulationDefaultImagesContainer').css('display', 'flex');
    });
    $("#importantDateButton").click(function (event) {
      var form = $("#importantDateForm");

      if ($('#importantDateType option:selected').val() == '') {
        $('#importantDateType').addClass('invalid-selector');
      } else {
        $('#importantDateType').removeClass("invalid-selector");
      }

      if ($('[name^="important_date_reminds"]:checkbox:checked').length == 0) {
        $('#selectBox select').addClass('invalid-selector');
      } else {
        $('#selectBox select').removeClass("invalid-selector");
      }

      validation(form, event);
    });
    $('.checkImportantDate').change(function () {
      if ($(".profile-single-important-date input[type=checkbox]:checked").length > 0) {
        $("#deleteImportantDates").prop("disabled", false);
      } else {
        $("#deleteImportantDates").prop("disabled", true);
      }
    });
    $("#deleteImportantDates").click(function (event) {
      var deleteImportants = [];
      $(".profile-single-important-date input[type=checkbox]:checked").each(function () {
        deleteImportants.push($(this).val());
      });

      if (deleteImportants.length > 0) {
        $.ajax({
          type: "POST",
          url: "profile-important-dates-delete",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            dates: deleteImportants
          },
          success: function success(data) {
            location.reload();
          }
        });
      }
    });
    var expanded = false;
    $("#selectBox").click(function (event) {
      var checkboxes = document.getElementById("checkboxes");

      if (!expanded) {
        checkboxes.style.display = "flex";
        expanded = true;
      } else {
        checkboxes.style.display = "none";
        expanded = false;
      }
    });
    $("#importantDateRemindsButton .otherButton").click(function (event) {
      event.preventDefault();
      var checkboxes = document.getElementById("checkboxes");
      checkboxes.style.display = "none";
      expanded = false;
    });
  });

  function readImageURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#blah').attr('src', e.target.result);
        $('#blah').data('src', e.target.result);
        $('#imgCongratulation').data('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  function readVideoURL(input) {
    var $source = $('#videoPreview');
    $source[0].src = URL.createObjectURL(input.files[0]);
    $source.parent()[0].load();
  }

  function setModalData(name) {
    $("#reviewName").text(name);
  }

  var validation = function validation(form, event) {
    form.addClass('valid-form');

    if (form[0].checkValidity() === false) {
      form.removeClass('valid-form');
      event.preventDefault();
      event.stopPropagation();
    }

    form.addClass('was-validated');
  };

  $('[id^="profileComplaintButton"]').click(function (event) {
    var review = $(this).parent().parent();
    var complains = review.find('.complain');
    complains.each(function (index) {
      if ($(this).text().trim()) {
        $(this).toggle(750);
        $(this).css('display', 'flex');
      }
    });
    $(this).text().trim() !== 'Close' ? $(this).text('Close') : $(this).text('Complains (' + $(this).data('complains') + ')');
  });
})(jQuery);

/***/ }),

/***/ 6:
/*!***************************************!*\
  !*** multi ./resources/js/profile.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/profile.js */"./resources/js/profile.js");


/***/ })

/******/ });