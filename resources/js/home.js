(function($) {
    $( document ).ready(function() {
        sessionStorage.setItem('slider_enable', false);
    });
    window.onload = function() {
        var startHomeHeight = 0;
        // var containerMainHeight = $('.main').outerHeight();
        var containerMainHeight = $('.home-content-place').outerHeight();
        console.log('containerMainHeight: ', containerMainHeight);
        // console.log('document.getElementById(audio): ', document.getElementById('audio'));
        // var myAudio = $("#audio")[0];
        // myAudio.play();
        var loaded = sessionStorage.getItem('loaded');
        sessionStorage.setItem('loaded', true);
        // $('.home *').show();
        // if(loaded !== 'true') {
        sessionStorage.setItem('slider_enable', false);
            $('.nav-gradient').addClass('nav-first-menu-showing');
            $('.navigate li a').addClass('first-menu-showing');
            for(let i = 0; i <= 2; i++){
                setTimeout(function(){
                    // if(i >= 1){
                    //     setTimeout(function(){
                    //         $('.nav-gradient').removeClass('nav-first-menu-showing');
                    //     }, 1000);
                    // }
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(150 * i).fadeTo( 100, 1 );
                        $(this).delay(100 * i).not(".menu-active a").fadeTo( 100, 0 );
                    });
                }, 1250 * i);
            }
            setTimeout(function(){
                $('.nav-gradient').removeClass('');
                if ($(window).width() < 860) {
                    $('.navigate li a').each(function(i)
                    {
                        $(this).delay(150 * i).fadeTo( 100, 1 );
                    });
                }
            }, 4000);
            setTimeout(function(){
                $('.navigate li a').removeClass('first-menu-showing');
            }, 22500);

            // setTimeout(function(){
            //     $('.home .home-main-content').fadeTo( 1000, 1 );
            // }, 4000);

            setTimeout(function(){
                $('.home .home-title').each(function(index){
                    let $this = $(this);
                    setTimeout(function(){
                        $this.delay(500 * index)
                            .fadeTo( 150, 1 )
                            .fadeTo( 150, 0 )
                            .fadeTo( 150, 1 )
                            .fadeTo( 150, 0 )
                            .fadeTo( 150, 1 )
                            .fadeTo( 150, 0 )
                            .fadeTo( 150, 1 );
                    }, 21500 * index);
                });
            }, 4000);

            setTimeout(function(){
                let mainContentDelay = 0;
                $('.home-main-content').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 250, 1 );
                        item.fadeTo( 250, 1 );
                        item.animate_Text();
                        if ($('.home').height() > $('.home-content-place').height()) {
                            // console.log('home-main-content down');
                            animateContent('down');
                        }
                    }, mainContentDelay);
                    mainContentDelay = (item.text().length * 3) + mainContentDelay;
                });
            }, 5250);

            setTimeout(function(){
                startHomeHeight = $('.home').height();
                let heightIndex = 0;
                $('.home-point img').each(function(index){
                    let $this = $(this);
                    $(this).delay(250 * (index + 1)).fadeTo( 200, 1 );
                    setTimeout(function(){
                        if (($('.home-point').height() * index + startHomeHeight) > containerMainHeight) {
                            ++heightIndex;
                            animateContent('down', (50 * heightIndex), 200);
                        }
                    }, 250 * (index + 1));
                });
                // animateContent('up');
            }, 7000);
            setTimeout(function() {
                if ($('.home').height() > containerMainHeight) {
                    animateContent('up', ($('.home-point').height() + 50), 100);
                }
                // }
            }, 10300);
            setTimeout(function(){
                // var startHomePointTitle = $( ".home-point img" ).first().position().top;
                let heightIndex = 0;
                $('.home .home-point-title').each(function(index){
                    setTimeout(function(){
                        // console.log('degree условие: ', $('.home-point').height(), ($('.home-point').height() * index + startHomeHeight + 20), index, );
                        if (($('.home-point').height() * index + startHomeHeight + 20) > containerMainHeight) {
                            // console.log('degree outerHeight: ', $('.home-point').outerHeight());
                            let degree = ($('.home-point').outerHeight() * heightIndex) + startHomeHeight + 20;

//                            let degree = ($('.home-point').outerHeight() * heightIndex) + 50;
//                             console.log('degree: ', degree);
                            if(degree > containerMainHeight){
                                animateContent('down', (degree), 100);
                            }
                            ++heightIndex;
                        }
                    }, 600 * index);
                    if(index > 0){
                        $(this).delay(600 * index)
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 );
                    } else {
                        $(this).delay(600 * index)
                            .fadeTo( 175, 1 )
                            .fadeTo( 175, 0 )
                            .fadeTo( 175, 1 );
                    }
                });
            }, 10500);

            setTimeout(function(){
                if ($('.home').height() > containerMainHeight) {
                    animateContent('up', );
                    animateContent('down', (startHomeHeight), 250);
                }
                let delay = 0;
                let textHeightDegree = startHomeHeight;
                let textHeightDifferenceDegree = 0;
                $('.home-point-show').each(function(index) {
                    let item = $(this);
                    $("#audio")[0].play();
                    setTimeout(function() {
                        $("#audio")[0].play();
                        item.parent().fadeTo( 50, 1 );
                        item.fadeTo( 25, 1 );
                        item.animate_Text();
                            if(window.matchMedia('(max-width: 768px)').matches){
                                if(index < 10 || index > 13 && index <= 16){
                                    textHeightDegree = (item.parent().height()) + textHeightDegree;
                                } else {
                                    textHeightDegree = (item.height()) + textHeightDegree + 50;
                                }
                                animateContent('down', (textHeightDegree), 50);
                            } else {
                                if(index < 10 || index > 13 && index <= 16){
                                    textHeightDegree = (item.parent().height()) + textHeightDegree;
                                } else if (index > 16){
                                    textHeightDegree = (item.height()) + textHeightDegree + 60;
                                } else {
                                    textHeightDegree = (item.height()) + textHeightDegree;
                                }
                                textHeightDifferenceDegree = textHeightDegree - containerMainHeight;
                                if(textHeightDegree > containerMainHeight){
                                    animateContent('down', (textHeightDifferenceDegree), 10)
                                }
                            }
                    }, delay);
                    delay = (item.text().length * 2) + delay;
                });
                setTimeout(function() {
                    if ($('.home').height() > containerMainHeight) {
                        animateContent('up');
                    }
                }, delay + 1000);
                setTimeout(function() {
                    // if(localStorage.getItem('hideAlert') == 'false'){
                        $("#instructionModal").modal('show');
                        sessionStorage.setItem('slider_enable', true);
                    // }
                }, delay + 2000);
            }, 18000);
        // } else {
        //     $('.home *').show();
        // }
    };

    $.fn.animate_Text = function() {
        var string = $.trim(this.text());
        return this.each(function(){
            var $this = $(this);
            $this.html(string.replace(/./g, '<span class="new">$&</span>'));
            $this.find('span.new').each(function(i, el){
                setTimeout(function(){ $(el).addClass('div_opacity'); }, 2 * i);
            });
        });
    };

    function animateContent(direction, inputAddingHeight = 0, animateSpeed = 500) {
        // var animationOffset = $('.home-content-place').height() - $('.home').height();
        // var animationOffset = $('.home-content-place').height();
        // // var animationOffset = $('.container').outerHeight() + $('.main').outerHeight();
        // if (direction == 'up') {
        //     animationOffset = 0;
        // }
        // console.log('homeContentOuterHeight: ', $('.home-content-place').outerHeight());
        // console.log('homeOuterHeight: ', $('.home').outerHeight());
        // console.log('inputAddingHeight: ', inputAddingHeight);
        console.log('-inputAddingHeight: ', inputAddingHeight, -(inputAddingHeight));
        // console.log('animationOffset: ', animationOffset);
        // console.log('animationContent: ', -animationOffset-inputAddingHeight);
        $('.home').animate({ "marginTop": -(inputAddingHeight)+ "px" }, animateSpeed);
    }

    function Utils() {

    }

    Utils.prototype = {
        constructor: Utils,
        isElementInView: function (element, fullyInView) {
            var pageTop = $(window).scrollTop();
            var pageBottom = pageTop + $(window).height();
            var elementTop = $(element).offset().top;
            var elementBottom = elementTop + $(element).height();

            if (fullyInView === true) {
                return ((pageTop < elementTop) && (pageBottom > elementBottom));
            } else {
                return ((elementTop <= pageBottom) && (elementBottom >= pageTop));
            }
        }
    };

    var Utils = new Utils();
})(jQuery);
