(function($) {
    $( document ).ready(function() {
        $('.testCreationReview *').on('click', function (e){
            if(e.target.id !== 'cancelButton'){
                e.preventDefault();
                $('#testReviewCreation').modal('show');
            }
        });

        // Rating stars options
        var options = {
            max_value: 5,
            step_size: 1,
            initial_value: 0,
            selected_symbol_type: 'utf8_star', // Must be a key from symbols
            cursor: 'default',
            readonly: false,
            change_ofnce: false, // Determines if the rating can only be set once
        }

        $(".rating").rate(options);
        $(".rating").click(function(event) {
            let currentRating = $(this).find('#rating').val();
            if(currentRating <= 2 && !$('#submitFormAccept').data('enableLowRating')){
                $('#submitFormAccept').val(0);
            } else {
                $('#submitFormAccept').val(1);
            }
        });

        $(".like-reaction").click(function(event) {
            if(($(this)).hasClass('only-auth')){
                window.location = $(this).data('reactionHref');
            } else {
                let userReactionIncreased = 1;
                let reactionType = $(this).data('reactionName');
                let reviewId = $(this).data('reviewId');
                let wasReaction = sessionStorage.getItem('wasReaction' + reviewId);
                let wasReactionType = sessionStorage.getItem('wasReviewReactionType' + reviewId);
                let wasReactionTypeCnt = sessionStorage.getItem('wasReviewTypeCnt' + reactionType + reviewId);
                let label = $("label[for='"+this.id+"']");
                let reviewLikes = Number.parseInt(label.text());

                if(wasReaction !== 'true'){
                    reviewLikes++;
                    label.text(reviewLikes);
                    sessionStorage.setItem('wasReviewReactionType' + reviewId, reactionType);
                    sessionStorage.setItem('wasReaction' + reviewId, true);
                    sessionStorage.setItem('wasReviewTypeCnt' + reactionType + reviewId, reviewLikes);
                } else if(wasReaction == 'true'){
                    if(wasReactionType === reactionType){
                        reviewLikes--;
                        userReactionIncreased = 0;
                        label.text(reviewLikes);
                        sessionStorage.setItem('wasReviewReactionType' + reviewId, reactionType);
                        sessionStorage.setItem('wasReaction' + reviewId, false);
                        sessionStorage.setItem('wasReviewTypeCnt' + reactionType + reviewId, reviewLikes);
                    }
                }

                if((reviewLikes - wasReactionTypeCnt) !== 0){
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        type:'POST',
                        url:'/ajax/review-reaction',
                        data: {_token: CSRF_TOKEN, reaction: reactionType, value: reviewLikes, id: reviewId, user_reaction_increase: userReactionIncreased},
                        success:function(data){
                            // console.log(data);
                        }
                    });
                }
            }
        });

        $(".comment-like-reaction").click(function(event) {
            let userReactionIncreased = 1;
            let reactionType = $(this).data('reactionName');
            let commentId = $(this).data('commentId');
            let wasReaction = sessionStorage.getItem('wasCommentReaction' + commentId);
            let wasReactionType = sessionStorage.getItem('wasCommentReactionType' + commentId);
            let wasReactionTypeCnt = sessionStorage.getItem('wasReactionTypeCnt' + reactionType + commentId);
            let label = $("label[for='"+this.id+"']");
            let commentLikes = Number.parseInt(label.text());

            if(wasReaction !== 'true'){
                commentLikes++;
                label.text(commentLikes);
                sessionStorage.setItem('wasCommentReactionType' + commentId, reactionType);
                sessionStorage.setItem('wasCommentReaction' + commentId, true);
                sessionStorage.setItem('wasReactionTypeCnt' + reactionType + commentId, commentLikes);
            } else if(wasReaction == 'true'){
                if(wasReactionType === reactionType){
                    commentLikes--;
                    userReactionIncreased = 0;
                    label.text(commentLikes);
                    sessionStorage.setItem('wasCommentReactionType' + commentId, reactionType);
                    sessionStorage.setItem('wasCommentReaction' + commentId, false);
                    sessionStorage.setItem('wasReactionTypeCnt' + reactionType + commentId, commentLikes);
                }
            }

            if((commentLikes - wasReactionTypeCnt) !== 0){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/ajax/review-comment-reaction',
                    data: {_token: CSRF_TOKEN, reaction: reactionType, value: Number.parseInt(label.text()), id: commentId, user_reaction_increase: userReactionIncreased},
                    success:function(data){

                    }
                });
            }
        });

        $('[id^="commentButton"]').click(function(event) {
            let review = $(this).parent().parent().parent();
            let comments = review.find('.comment');
            comments.each(function( index ) {
                if($(this).text().trim()) {
                    $(this).toggle(750);
                    $(this).css('display', 'flex');
                }
            });
            review.find('.review-textarea').toggle(750);
            let closeButtonName = $(this).attr('data-close');
            let showCommentsButtonName = $(this).attr('data-show-comments');
            $(this).text().trim() !== closeButtonName ? $(this).text(closeButtonName) : $(this).text(showCommentsButtonName + ' (' + $(this).data('comments') + ')');
        });

        $('[id^="profileCommentButton"]').click(function(event) {
            let review = $(this).parent().parent().parent();
            let comments = review.find('.comment');
            comments.each(function( index ) {
                if($(this).text().trim()) {
                    $(this).toggle(750);
                    $(this).css('display', 'flex');
                }
            });
            review.find('.review-textarea').toggle(750);
            let closeButtonName = $(this).attr('data-close');
            let replyButtonName = $(this).attr('data-reply');
            $(this).text().trim() !== closeButtonName ? $(this).text(closeButtonName) : $(this).text(replyButtonName);
        });

        $('[id^="complainButton"]').click(function(event) {
            let reviewId = $(this).data('review');
            $('#complainForm').find("input[name='review_id']").val(reviewId);
        });

        $('[id^="profileMessageButton"]').click(function(event) {
            let review = $(this).parent().parent().parent();
            let review_content = $(this).parent().parent();
            let comments = review.find('.message');
            let firstComment = review.find('.visible-message');
            firstComment.toggle(500);
            comments.each(function( index ) {
                if($(this).text().trim()) {
                    $(this).toggle(500);
                    $(this).css('display', 'flex');
                }
            });
            review.find('.review-textarea').toggle(500);
            let is_open =  $(this).text().trim() !== 'Close';
            is_open ? $(this).text('Close') : $(this).text('Reply');
            if(is_open){
                review_content.animate({
                    height: "50%",
                }, 500 );
            } else {
                review_content.animate({
                    height: "100%",
                }, 500 );
            }
            $(this).closest('.single-review').removeClass('unread-profile-messages');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let reviewId = $(this).attr('data-review-id');
            $.ajax({
                type:'POST',
                url:'/ajax/review-message-read',
                data: {_token: CSRF_TOKEN, review_id: reviewId},
            });
        });

        $('[id^="addCommentButton"]').click(function(event) {
            let review = $(this).parent().parent();
            review.find('button').prop('disabled', true);
            let text = review.find('textarea').val();
            let reviewId = review.data("reviewId");
            if(text.trim()){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/ajax/review-add-comment',
                    data: {_token: CSRF_TOKEN, body: text, review_id: reviewId},
                    success:function(data){
                        let elem = review.parent().find('.comment-example');
                        let cloneElem = elem.clone();
                        cloneElem.attr('class', 'comment');
                        cloneElem.find('input').each(function(index, element){
                            if(index == 0){
                                $(this).attr('id', 'comment-like-' + data.comment_id);
                                $(this).attr('data-comment-id', data.comment_id);
                            } else {
                                $(this).attr('id', 'comment-dislike-' + data.comment_id);
                                $(this).attr('data-comment-id', data.comment_id);
                            }
                        });
                        cloneElem.find('label').each(function(index, element){
                            if(index == 0){
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

        $('[id^="sendReviewMessageButton"]').click(function(event) {
            let review = $(this).parent().parent();
            review.find('button').prop('disabled', true);
            let text = review.find('textarea').val();
            let reviewId = review.data("reviewId");
            if(text.trim()){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/ajax/review-send-message',
                    data: {_token: CSRF_TOKEN, message: text, review_id: reviewId},
                    success:function(data){
                        review.find('textarea').val('');
                        review.find('button').removeAttr("disabled");
                    }
                });
            } else {
                review.find('button').removeAttr("disabled");
                alert('Mail message is empty!');
            }
        });

        $('[id^="sendProfileReviewMessageButton"]').click(function(event) {
            let review = $(this).parent().parent();
            review.find('button').prop('disabled', true);
            let text = review.find('textarea').val();
            let reviewId = review.data("reviewId");
            if(text.trim()){
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type:'POST',
                    url:'/ajax/review-send-message',
                    data: {_token: CSRF_TOKEN, message: text, review_id: reviewId},
                    success:function(data){
                        let elem = review.parent().find('.message-example');
                        let cloneElem = elem.clone();
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

        $( ".filter-select" ).change(function() {
            let slug = $(this).attr('name');
            let item = $(this).children("option:selected").val();
            var str = window.location.search;
            str = replaceQueryParam(slug, item, str);
            str = replaceQueryParam('page', 1, str);
            window.location = window.location.pathname + str
        });

        function replaceQueryParam(param, newval, search) {
            var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
            var query = search.replace(regex, "$1").replace(/&$/, '');

            return (query.length > 2 ? query + "&" : "?") + (newval ? param + "=" + newval : '');
        }

        $('#video').change(function() {
            if(this.files[0].size > 35000000){
                alert("The file must be less than 35 MB!");
                this.value = "";
            };
        });

        $('input[type="file"]').change(function(e){
            let fileName = e.target.files[0].name;
            $(this).parent().find('span').text(fileName);
        });

        // Get the modal
        var modal = document.getElementById("imageModal");

        $(".closeImageModal").click(function(event) {
            modal.style.display = "none";
        });

        $(".reviewImage").click(function(event) {
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            // var img = document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            modal.style.display = "block";
            modalImg.src = $(this).attr('data-full-size-src');
            captionText.innerHTML = this.alt;
        });

        $("#img").change(function (e){
            $("#deletePhotoFlag").val('0');
        });

        $("#video").change(function (e){
            $("#deleteVideoFlag").val('0');
        });

        $("#deleteImg").click(function (e){
            // e.preventDefault();
            $("#img").val();
            let text = $("#img").data('text')
            $("#img").parent().find('span').text(text)
            $("#deletePhotoFlag").val('1');
        });
        $("#deleteVideo").click(function (e){
            e.preventDefault();
            $("#video").val();
            let text = $("#video").data('text')
            $("#video").parent().find('span').text(text)
            $("#deleteVideoFlag").val('1');
        });
    });
})(jQuery);
