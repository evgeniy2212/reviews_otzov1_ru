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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/reviews.js":
/*!*********************************!*\
  !*** ./resources/js/reviews.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $(document).ready(function () {
    $('.testCreationReview *').on('click', function (e) {
      if (e.target.id !== 'cancelButton') {
        e.preventDefault();
        $('#testReviewCreation').modal('show');
      }
    }); // Rating stars options

    var options = {
      max_value: 5,
      step_size: 1,
      initial_value: 0,
      selected_symbol_type: 'utf8_star',
      // Must be a key from symbols
      cursor: 'default',
      readonly: false,
      change_ofnce: false // Determines if the rating can only be set once

    };
    $(".rating").rate(options);
    $(".rating").click(function (event) {
      var currentRating = $(this).find('#rating').val();

      if (currentRating <= 2 && !$('#submitFormAccept').data('enableLowRating')) {
        $('#submitFormAccept').val(0);
      } else {
        $('#submitFormAccept').val(1);
      }
    });
    $(".like-reaction").click(function (event) {
      if ($(this).hasClass('only-auth')) {
        window.location = $(this).data('reactionHref');
      } else {
        var userReactionIncreased = 1;
        var reactionType = $(this).data('reactionName');
        var reviewId = $(this).data('reviewId');
        var wasReaction = sessionStorage.getItem('wasReaction' + reviewId);
        var wasReactionType = sessionStorage.getItem('wasReviewReactionType' + reviewId);
        var wasReactionTypeCnt = sessionStorage.getItem('wasReviewTypeCnt' + reactionType + reviewId);
        var label = $("label[for='" + this.id + "']");
        var reviewLikes = Number.parseInt(label.text());

        if (wasReaction !== 'true') {
          reviewLikes++;
          label.text(reviewLikes);
          sessionStorage.setItem('wasReviewReactionType' + reviewId, reactionType);
          sessionStorage.setItem('wasReaction' + reviewId, true);
          sessionStorage.setItem('wasReviewTypeCnt' + reactionType + reviewId, reviewLikes);
        } else if (wasReaction == 'true') {
          if (wasReactionType === reactionType) {
            reviewLikes--;
            userReactionIncreased = 0;
            label.text(reviewLikes);
            sessionStorage.setItem('wasReviewReactionType' + reviewId, reactionType);
            sessionStorage.setItem('wasReaction' + reviewId, false);
            sessionStorage.setItem('wasReviewTypeCnt' + reactionType + reviewId, reviewLikes);
          }
        }

        if (reviewLikes - wasReactionTypeCnt !== 0) {
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            type: 'POST',
            url: '/ajax/review-reaction',
            data: {
              _token: CSRF_TOKEN,
              reaction: reactionType,
              value: reviewLikes,
              id: reviewId,
              user_reaction_increase: userReactionIncreased
            },
            success: function success(data) {// console.log(data);
            }
          });
        }
      }
    });
    $(".comment-like-reaction").click(function (event) {
      var userReactionIncreased = 1;
      var reactionType = $(this).data('reactionName');
      var commentId = $(this).data('commentId');
      var wasReaction = sessionStorage.getItem('wasCommentReaction' + commentId);
      var wasReactionType = sessionStorage.getItem('wasCommentReactionType' + commentId);
      var wasReactionTypeCnt = sessionStorage.getItem('wasReactionTypeCnt' + reactionType + commentId);
      var label = $("label[for='" + this.id + "']");
      var commentLikes = Number.parseInt(label.text());

      if (wasReaction !== 'true') {
        commentLikes++;
        label.text(commentLikes);
        sessionStorage.setItem('wasCommentReactionType' + commentId, reactionType);
        sessionStorage.setItem('wasCommentReaction' + commentId, true);
        sessionStorage.setItem('wasReactionTypeCnt' + reactionType + commentId, commentLikes);
      } else if (wasReaction == 'true') {
        if (wasReactionType === reactionType) {
          commentLikes--;
          userReactionIncreased = 0;
          label.text(commentLikes);
          sessionStorage.setItem('wasCommentReactionType' + commentId, reactionType);
          sessionStorage.setItem('wasCommentReaction' + commentId, false);
          sessionStorage.setItem('wasReactionTypeCnt' + reactionType + commentId, commentLikes);
        }
      }

      if (commentLikes - wasReactionTypeCnt !== 0) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: '/ajax/review-comment-reaction',
          data: {
            _token: CSRF_TOKEN,
            reaction: reactionType,
            value: Number.parseInt(label.text()),
            id: commentId,
            user_reaction_increase: userReactionIncreased
          },
          success: function success(data) {}
        });
      }
    });
    $('[id^="commentButton"]').click(function (event) {
      var review = $(this).parent().parent().parent();
      var comments = review.find('.comment');
      comments.each(function (index) {
        if ($(this).text().trim()) {
          $(this).toggle(750);
          $(this).css('display', 'flex');
        }
      });
      review.find('.review-textarea').toggle(750);
      var closeButtonName = $(this).attr('data-close');
      var showCommentsButtonName = $(this).attr('data-show-comments');
      $(this).text().trim() !== closeButtonName ? $(this).text(closeButtonName) : $(this).text(showCommentsButtonName + ' (' + $(this).data('comments') + ')');
    });
    $('[id^="profileCommentButton"]').click(function (event) {
      var review = $(this).parent().parent().parent();
      var comments = review.find('.comment');
      comments.each(function (index) {
        if ($(this).text().trim()) {
          $(this).toggle(750);
          $(this).css('display', 'flex');
        }
      });
      review.find('.review-textarea').toggle(750);
      var closeButtonName = $(this).attr('data-close');
      var replyButtonName = $(this).attr('data-reply');
      $(this).text().trim() !== closeButtonName ? $(this).text(closeButtonName) : $(this).text(replyButtonName);
    });
    $('[id^="complainButton"]').click(function (event) {
      var modelId = $(this).data('review-model-id');
      var modelType = $(this).data('review-model-type');
      $('#complainForm').find("input[name='model_id']").val(modelId);
      $('#complainForm').find("input[name='model_type']").val(modelType);
    });
    $('[id^="profileMessageButton"]').click(function (event) {
      var review = $(this).parent().parent().parent();
      var review_content = $(this).parent().parent();
      var comments = review.find('.message');
      var firstComment = review.find('.visible-message');
      firstComment.toggle(500);
      comments.each(function (index) {
        if ($(this).text().trim()) {
          $(this).toggle(500);
          $(this).css('display', 'flex');
        }
      });
      review.find('.review-textarea').toggle(500);
      var is_open = $(this).text().trim() !== 'Close';
      is_open ? $(this).text('Close') : $(this).text('Reply');

      if (is_open) {
        review_content.animate({
          height: "50%"
        }, 500);
      } else {
        review_content.animate({
          height: "100%"
        }, 500);
      }

      $(this).closest('.single-review').removeClass('unread-profile-messages');
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      var reviewId = $(this).attr('data-review-id');
      $.ajax({
        type: 'POST',
        url: '/ajax/review-message-read',
        data: {
          _token: CSRF_TOKEN,
          review_id: reviewId
        }
      });
    });
    $('[id^="addCommentButton"]').click(function (event) {
      var review = $(this).parent().parent();
      review.find('button').prop('disabled', true);
      var text = review.find('textarea').val();
      var reviewId = review.data("reviewId");

      if (text.trim()) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: '/ajax/review-add-comment',
          data: {
            _token: CSRF_TOKEN,
            body: text,
            review_id: reviewId
          },
          success: function success(data) {
            var elem = review.parent().find('.comment-example');
            var cloneElem = elem.clone();
            cloneElem.attr('class', 'comment');
            cloneElem.find('input').each(function (index, element) {
              if (index == 0) {
                $(this).attr('id', 'comment-like-' + data.comment_id);
                $(this).attr('data-comment-id', data.comment_id);
              } else {
                $(this).attr('id', 'comment-dislike-' + data.comment_id);
                $(this).attr('data-comment-id', data.comment_id);
              }
            });
            cloneElem.find('label').each(function (index, element) {
              if (index == 0) {
                $(this).attr('for', 'comment-like-' + data.comment_id);
                $(this).text(0);
              } else {
                $(this).attr('for', 'comment-dislike-' + data.comment_id);
                $(this).text(0);
              }
            });
            cloneElem.find('span').text(data.body);
            cloneElem.insertBefore(review.parent().find('.comment-example')).hide().show(750);
            review.find('textarea').val('');
            review.find('button').removeAttr("disabled");
          }
        });
      } else {
        alert('Comment is empty!');
      }
    });
    $('[id^="sendReviewMessageButton"]').click(function (event) {
      var review = $(this).parent().parent();
      review.find('button').prop('disabled', true);
      var text = review.find('textarea').val();
      var reviewId = review.data("reviewId");

      if (text.trim()) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: '/ajax/review-send-message',
          data: {
            _token: CSRF_TOKEN,
            message: text,
            review_id: reviewId
          },
          success: function success(data) {
            review.find('textarea').val('');
            review.find('button').removeAttr("disabled");
          }
        });
      } else {
        review.find('button').removeAttr("disabled");
        alert('Mail message is empty!');
      }
    });
    $('[id^="sendProfileReviewMessageButton"]').click(function (event) {
      var review = $(this).parent().parent();
      review.find('button').prop('disabled', true);
      var text = review.find('textarea').val();
      var reviewId = review.data("reviewId");

      if (text.trim()) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          type: 'POST',
          url: '/ajax/review-send-message',
          data: {
            _token: CSRF_TOKEN,
            message: text,
            review_id: reviewId
          },
          success: function success(data) {
            var elem = review.parent().find('.message-example');
            var cloneElem = elem.clone();
            cloneElem.attr('class', 'comment message');
            cloneElem.find('.message-response').text(data.data[0].message);
            cloneElem.find('.sender-name').text(elem.data('senderName'));
            cloneElem.insertBefore(review.parent().find('.message-example')).hide().show(750);
            review.find('textarea').val('');
            review.find('button').removeAttr("disabled");
          }
        });
      } else {
        review.find('button').removeAttr("disabled");
        alert('Mail message is empty!');
      }
    });
    $(".filter-select").change(function () {
      var slug = $(this).attr('name');
      var item = $(this).children("option:selected").val();
      var str = window.location.search;
      str = replaceQueryParam(slug, item, str);
      str = replaceQueryParam('page', 1, str);
      window.location = window.location.pathname + str;
    });

    function replaceQueryParam(param, newval, search) {
      var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
      var query = search.replace(regex, "$1").replace(/&$/, '');
      return (query.length > 2 ? query + "&" : "?") + (newval ? param + "=" + newval : '');
    }

    $('#video').change(function () {
      if (this.files[0].size > 35000000) {
        alert("The file must be less than 35 MB!");
        this.value = "";
      }

      ;
    });
    $('input[type="file"]').change(function (e) {
      var fileName = e.target.files[0].name;
      $(this).parent().find('span').text(fileName);
    }); // Get the modal

    var modal = document.getElementById("imageModal");
    $(".closeImageModal").click(function (event) {
      modal.style.display = "none";
    });
    $(".reviewImage").click(function (event) {
      // Get the image and insert it inside the modal - use its "alt" text as a caption
      // var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      modal.style.display = "block";
      modalImg.src = $(this).attr('data-full-size-src');
      captionText.innerHTML = this.alt;
    });
    $("#img").change(function (e) {
      $("#deletePhotoFlag").val('0');
    });
    $("#video").change(function (e) {
      $("#deleteVideoFlag").val('0');
    });
    $("#deleteImg").click(function (e) {
      // e.preventDefault();
      $("#img").val();
      var text = $("#img").data('text');
      $("#img").parent().find('span').text(text);
      $("#deletePhotoFlag").val('1');
    });
    $("#deleteVideo").click(function (e) {
      e.preventDefault();
      $("#video").val();
      var text = $("#video").data('text');
      $("#video").parent().find('span').text(text);
      $("#deleteVideoFlag").val('1');
    });
    $("#deleteCongratImg").click(function (e) {
      // e.preventDefault();
      $("#imgCongratulation").val();
      var text = $(this).data('default-description');
      $("#imgCongratulation").parent().find('span').text(text);
      $("#deletePhotoFlag").val('1');
      $('#blah').attr("src", $(this).data('default-src'));
      $('#imgDefaultCongratulationValue').val('');
    });
    $("#deleteCongratVideo").click(function (e) {
      e.preventDefault();
      $("#videoCongratulation").val();
      var text = $("#videoCongratulation").data('default-description');
      $("#videoCongratulation").parent().find('span').text(text);
      $("#deleteVideoFlag").val('1');
      $('.videoContainer').html('<img src="' + $(this).data('default-src') + '" ' + 'alt="video" class="videoPreview">');
    });
  });
})(jQuery);

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/reviews.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /app/resources/js/reviews.js */"./resources/js/reviews.js");


/***/ })

/******/ });