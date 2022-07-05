require('./bootstrap');
window.Vue = require('vue');
Vue.prototype.baseUrl = window.Laravel.baseUrl;
Vue.prototype.authId = window.Laravel.authId;

import App from './chat/App'
import VueChatScroll from 'vue-chat-scroll';
import loader from "vue-ui-preloader";

Vue.use(loader);
Vue.use(VueChatScroll)

if(window.Laravel.authId.length > 0){
    console.log('auth: ', window.Laravel.authId.length > 0);
    const app = new Vue({
        el: '#chatApp',
        render: h => h(App)
    });
} else {
    $( document ).ready(function() {
        sessionStorage.setItem('slider_enable', false);
        $('.js-open-chat').on('click', function () {
            $('.chat').toggleClass('is-active');
            $('.chat__wrapper').toggleClass('is-active');
        });
        $('.js-close-chat').on('click', function () {
            $('.chat').removeClass('is-active');
        });
        $('.js-contacts').on('click', function () {
            $('.chat__inner').addClass('is-active');
        });
        $('.js-create-contact').on('click', function () {
            $('.chat__create').addClass('is-active');
        });
        $('.js-chat-contact').on('click', function () {
            $('.chat__settings').addClass('is-active');
        });
        $('.js-close-create').on('click', function () {
            $(this).closest('.chat__create').removeClass('is-active');
        });
        $('.js-close-settings').on('click', function (e) {
            e.stopPropagation();
            // $('.chat__inner').removeClass('is-active');
            $(this).closest('.chat__settings').removeClass('is-active');
        });
        $('.js-begin-chat').on('click', function () {
            $(this).closest('.chat').find('.chat__wrap').addClass('is-active');
        });

        $('.js-close-messages').on('click', function () {
            $(this).closest('.chat').find('.chat__wrap').removeClass('is-active');
        });
        $('.js-edit-chat').on('click', function () {
            $('.chat__settings').find('.chat__edit').addClass('is-active');
        });

        $('.js-edit-chat').on('click', function () {
            $('.chat__settings').find('.chat__edit').addClass('is-active');
        });

        $('.js-close-chat-delete').on('click', function () {
            $(this).closest('.chat__delete').removeClass('is-active');
        });

        $('.js-open-delete').on('click', function () {
            $('.chat__settings').find('.chat__delete').addClass('is-active');
        });

        $('.js-close-edit').on('click', function () {
            $(this).closest('.chat__edit').removeClass('is-active');
        });

        $('.js-close-chat-contacts').on('click', function () {
            $('.chat__inner').removeClass('is-active');
        });
        $('.js-btn-emoji').on('click', function () {
            $(this).closest('.chat__field-wrap').find('.chat__emoji-holder').toggleClass('is-show');
        });
        $('.js-show-btns').on('click', function () {
            $(this).siblings().fadeIn();
        });

        $('.js-select-all').on('click', function () {
            $(this).closest('.chat__buttons').siblings('.chat__window').find('input').prop('checked', true);
            // $(this).closest('.chat__buttons').siblings('.chat__window').find('input').attr('checked', true);;
        });
        $('.js-delete-messages').on('click', function () {

        });
    });
}
