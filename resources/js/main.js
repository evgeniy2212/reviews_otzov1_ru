(function($) {
    sessionStorage.setItem('slider_enable', true);
    var isCheckedTermOfCondition = true;
    var isCheckedYearsOld = true;
    var isExistBadWords = false;
    var isSubmitFormAccept = true;
    var isCheckedCountryRegion = true;

    // console.log('loaded: ', sessionStorage.getItem('loaded'));
    // if(sessionStorage.getItem('loaded') === 'true') {
    //     $('.home').show();
    // }
    setTimeout(function(){$('.close').click()}, 3000);
    $( document ).ready(function() {
        $(".submitLoginButton").click(function(event) {
            var form = $("#loginForm");
            validation(form, event);
        });

        $(".submitChangePassButton").click(function(event) {
            var form = $("#changePassForm");
            validation(form, event);
        });

        $(".submitRegisterButton").click(function(event) {
            var form = $("#registerForm");

            if ($('#selectRegion option:selected').val() == 'Select'){
                $('#selectRegion').addClass('invalid-selector');
                isCheckedCountryRegion = false;
            } else {
                isCheckedCountryRegion = true;
                $('#selectRegion').removeClass( "invalid-selector" )
            }

            if ($('#selectCountry option:selected').val() == 'Select'){
                $('#selectCountry').addClass('invalid-selector');
                isCheckedCountryRegion = false;
            } else {
                isCheckedCountryRegion = true;
                $('#selectCountry').removeClass( "invalid-selector" )
            }

            isCheckedTermOfCondition = $('#confirmTermOfConditions').is(':checked')
            isCheckedTermOfCondition ? $('#confirmTermOfConditions').removeClass('invalid-checkbox') : $('#confirmTermOfConditions').addClass('invalid-checkbox');
            // isCheckedYearsOld = $('#confirmYearsOld').is(':checked')
            // isCheckedYearsOld ? $('#confirmYearsOld').removeClass('invalid-checkbox') : $('#confirmYearsOld').addClass('invalid-checkbox');
            validation(form, event);
        });

        $('#selectCategoryGood').change(function(){
            $('.text-review-creating-container').css({ height: '100%' });
            $('.new-group-creating-container').css({ display: 'none' });
        });
        $('#selectGroup').change(function(){
            let selectedText = $("#selectGroup option:selected").text();
            if(selectedText.toLowerCase() == 'other'){
                let textReviewHeight = $('.text-review-creating-container').parent().height();
                let groupCreatingHeight = $('.new-group-creating-container').height();
                let newTextHeight = textReviewHeight - groupCreatingHeight;
                $('.text-review-creating-container').css({ height: newTextHeight + 'px' });
                $('.new-group-creating-container').css({ display: 'block' });
                $('#new_group')
                    .animate({borderColor: "#dc3545"}, 500)
                    .delay(250)
                    .animate({borderColor: "#2f5496"}, 500)
                    .delay(250)
                    .animate({borderColor: "#dc3545"}, 500)
                    .delay(250)
                    .animate({borderColor: "#2f5496"}, 500)
                    .delay(250)
                    .animate({borderColor: "#dc3545"}, 500)
                    .delay(250)
                    .animate({borderColor: "#2f5496"}, 500);
            } else {
                $('.text-review-creating-container').css({ height: '100%' });
                $('.new-group-creating-container').css({ display: 'none' });
            }
        });

        $(".submitReviewButton").click(function(event) {
            var form = $("#createReviewForm").length > 0 ? $("#createReviewForm") : $("#editReviewForm");
            let action = $(this).data('action');
            form.attr('action', action);
            isExistBadWords = form.find('mark').length ? true : false;
            isSubmitFormAccept = $('#submitFormAccept').val() > 0 ? true : false;
            if(!isSubmitFormAccept){
                $('#acceptFormModal').modal('show');
                event.preventDefault();
            } else {
                if ($('#selectRegion option:selected').val() == ''){
                    $('#selectRegion').addClass('invalid-selector');
                } else {
                    $('#selectRegion').removeClass( "invalid-selector" )
                }

                if ($('#selectCountry option:selected').val() == ''){
                    $('#selectCountry').addClass('invalid-selector');
                } else {
                    $('#selectCountry').removeClass( "invalid-selector" )
                }

                if ($('#selectCategoryGood option:selected').val() == ''){
                    $('#selectCategoryGood').addClass('invalid-selector');
                } else {
                    $('#selectCategoryGood').removeClass( "invalid-selector" )
                }

                if ($('#selectGroup option:selected').val() == ''){
                    $('#selectGroup').addClass('invalid-selector');
                } else {
                    $('#selectGroup').removeClass( "invalid-selector" )
                }

                if(typeof $('#review-create-text').val() !== 'undefined'
                    && $('#review-create-text').val().length <= 1
                    && $('input:checkbox:checked').length <= 0)
                {
                    $('#review-create-text').addClass('invalid-textarea');
                    $('#emptyReviewNotificationModal').modal('show');
                    event.preventDefault();
                } else {
                    $('#review-create-text').removeClass('invalid-textarea');
                }

                if($("#selectGroup").is(":visible")){
                    if($("#selectGroup option:selected").text().toLowerCase() == 'other'){
                        if($('#new_group').val().length <= 0){
                            $('#new_group').addClass('invalid-input');
                        } else {
                            $('#new_group').removeClass('invalid-input');
                        }
                    } else {
                        $('#new_group').removeClass('invalid-input');
                    }
                }

                if($('input[name="characteristics[]"]:checked').length > 0){
                    $('#review-create-text').removeAttr('required');
                }

                validation(form, event);
            }

            if($('#createReviewForm #video, #editReviewForm #video').prop('files')[0]
                && form.hasClass('valid-form')){
                $('.custom-file-upload, .delete-button').hide();
                $('#inTurnFadingTextG').show();
            }
        });

        $('#acceptModal').click(function(){
            $('#submitFormAccept').val(1);
            $('#acceptFormModal').modal('hide');
        });

        $(".submitTouchInfoButton").click(function(event) {
            var form = $("#sendTouchInfo");
            validation(form, event);
        });

        //Choosing region after country
        $('#selectCountry').change(function() {
            $.ajax({
                url : "/ajax/regions/" + this.value,
                dataType:"json",
                success:function(data)
                {
                    $('#registerLabel').text(data[0].region_naming);
                    $('#selectRegion').empty();
                    for(var k in data) {
                        $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
                    }
                }
            });

            $('#selectRegion').removeAttr("disabled");
        });

        //Choosing region after country
        $('#selectCategoryGood').change(function() {
            $.ajax({
                url : "/ajax/groups/" + this.value,
                dataType:"json",
                success:function(data)
                {
                    console.log('data: ', data);
                    $('#selectGroup').empty();
                    var length = data.length - 1;
                    for(var k in data) {
                        $('#selectGroup').prepend('<option value="' + data[k].id + '"'+ (length == k ? "selected" : "") +' >' + data[k].name + '</option>');
                    }
                }
            });

            $('#selectGroup').removeAttr("disabled");
        });

        $('[id^="enableInputsButton"]').click(function(){
            let editForm = $(this).data('form');
            $('#' + editForm +' input, textarea').each(function(){
                $(this).prop("disabled", false);
            });
        });

        $('#editProfileButton').click(function(){
            $('#personalForm input').each(function(){
                $(this).prop("disabled", false);
            });
            $('#selectCountry').prop("disabled", false);
            $('#cancelButton').prop("disabled", false);
            $('#saveButton').prop("disabled", false);
        });

        $("#password, #new-password").on('keyup', ValidatePassword);
        $("#password, #new-password").focus(function() {
            $('#password-rules').show();
        }).blur(function() {
            $('#password-rules').hide();
        });

        // console.log($('#selectCountry').attr('data-country'));
        if($('#selectCountry') !== null && $('#selectCountry').length && $('#selectCountry').attr('data-country').length){
            $.ajax({
                url : "/ajax/regions/" + $('#selectCountry').attr('data-country'),
                dataType:"json",
                success:function(data)
                {
                    $('#registerLabel').text(data[0].region_naming);
                    $('#selectRegion').empty();
                    for(var k in data) {
                        $('#selectRegion').prepend('<option value="' + data[k].id + '">' + data[k].region + '</option>');
                    }
                    $('#selectCountry option[value=' + $('#selectCountry').attr('data-country') +']').prop('selected', true);
                    $('#selectRegion').removeAttr("disabled");
                    $('#selectRegion option[value=' + $('#selectRegion').attr('data-region') +']').prop('selected', true);
                }
            });
        }

        $('.shortcut').click(function(event) {
            let instructionTitle = $(this).parent();
            let showList = instructionTitle.find('ol');
            event.preventDefault();
            // hide all span
            $('#shortcutInstructionModal li ol').not(showList).slideUp(500, 'swing');

            if(showList.is(":visible")){
                $('#shortcutInstructionModal .shortcut').not($(this)).removeClass('disabled');
            } else {
                $('#shortcutInstructionModal .shortcut').not($(this)).addClass('disabled');
            }
            // here is what I want to do
            showList.slideToggle(750, 'swing');
            $(this).removeClass('disabled');
        });

        $('[id^="adminComplaintButton"]').click(function(event) {
            let review = $(this).parent().parent().parent();
            let complains = review.find('.complain');
            complains.each(function( index ) {
                if($(this).text().trim()) {
                    $(this).toggle(750);
                    $(this).css('display', 'flex');
                }
            });
            review.find('.review-textarea').toggle(750);
            $(this).text().trim() !== 'Close' ? $(this).text('Close') : $(this).text('Complains (' + $(this).data('complains') + ')');
        });

        $('#review-create-text').click(function(data){
            badWordsUpdate($('#review-create-text'));
        });
        $('#new_group').click(function(data){
            badWordsUpdate($('#new_group'));
        });
        $('#new_group').blur(function() {
            badWordsUpdate($('#new_group'));
        });
        $('#review-text').click(function(){
            badWordsUpdate($('#review-text'));
        });

        $('#review-create-text').blur(function() {
            badWordsUpdate($('#review-create-text'));
        });

        $('#review-text').blur(function() {
            badWordsUpdate($('#review-text'));
        });

        if($( "#review-create-text, #review-text, #new_group" ).length){
            let badWords = [];
            $.ajax({
                url : "/ajax/bad-words",
                dataType:"json",
                success:function(data)
                {
                    $('#review-create-text, #review-text, #new_group').highlightWithinTextarea({
                        highlight: getBadWords(data),
                        className: 'red'
                    });
                },
                error: function(){
                    $('#review-create-text, #review-text, #new_group').highlightWithinTextarea({
                        highlight: [],
                        className: 'red'
                    });
                }
            });
        }

        $('[id^="slider_body"]').click(function(event) {
            let data = $(this).data('body');
            $('#sliderBodyModalContent span').html(data);
            $('#sliderBodyModal').modal('show');
        });

        $( "#dontShowAgainInstruction" ).click(function() {
            localStorage.setItem('hideAlert', true);
        });
        $('[id^="instruction-video"]').click(function(){
            $(this).parent().hide();
        });

        $('#enable_share_message').change(function (){
            if($(this).is(":checked")) {
                $('#share_message').removeAttr('disabled');
            } else {
                let placeholder = $('#share_message').attr('data-placeholder');
                $('#share_message').prop('disabled', true);
                $('#share_message').val('');
                $('#share_message').attr("placeholder", placeholder);
            }
        });
    });

    function getBadWords(data){
        return new RegExp('[\\s]' + data.join('[\\s]|[\\s]') + '[\\s]', 'gi');
    }

    var validation = function(form, event){
        let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
        let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
        let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
        if(isCheckPassInvalid){
            $('#password, #new-password').addClass('invalid-input');
        } else {
            $('#password, #new-password').removeClass('invalid-input');
        }
        if(isExistBadWords){
            // alert('Your review contain Bad Words! You must delete Bad Words!');
            $('#errorBadWords').modal('show');
        }
        form.addClass('valid-form');
        if (form[0].checkValidity() === false
            || isCheckPassInvalid
            || !isCheckedTermOfCondition
            || !isCheckedYearsOld
            || isExistBadWords
            || !isCheckedCountryRegion
            || !isSubmitFormAccept)
        {
            form.removeClass('valid-form');
            event.preventDefault();
            event.stopPropagation();
        }

        form.addClass('was-validated');
    };

    /*Actual validation function*/
    function ValidatePassword() {
        /*Array of rules and the information target*/
        var rules = [{
            Pattern: "[A-Z]",
            Target: "UpperCase"
        },
            {
                Pattern: "[a-z]",
                Target: "LowerCase"
            },
            {
                Pattern: "[0-9]",
                Target: "Numbers"
            },
            {
                Pattern: "[!@@#$%^&*]",
                Target: "Symbols"
            }
        ];

        //Just grab the password once
        var password = $(this).val();
        /*Length Check, add and remove class could be chained*/
        /*I've left them seperate here so you can see what is going on */
        /*Note the Ternary operators ? : to select the classes*/
        $("#Length").prop('checked', password.length > 7 ? true : false);
        for (var i = 0; i < rules.length; i++) {
            $("#" + rules[i].Target).prop('checked', new RegExp(rules[i].Pattern).test(password) ? true : false);
        }
        let allPassRulesCnt = $('#password-rules').find("[type='checkbox']").length;
        let checkedPassRulesCnt = $('#password-rules').find("[type='checkbox']:checked").length;
        let isCheckPassInvalid = allPassRulesCnt != checkedPassRulesCnt;
        if(isCheckPassInvalid){
            $('#password, #new-password').addClass('invalid-input');
        } else {
            $('#password, #new-password').removeClass('invalid-input');
        }
    }

    function badWordsUpdate(input){
        let review = input.val();
        let length = review.length;
        if(length == 0 && review[0] != ' '){
            review = input.val(' ' + review);
            input.highlightWithinTextarea('update');
        }

        if(length > 0 && review[length - 1] != ' '){
            input.val(review + ' ');
            input.highlightWithinTextarea('update');
        }
    }
})(jQuery);
