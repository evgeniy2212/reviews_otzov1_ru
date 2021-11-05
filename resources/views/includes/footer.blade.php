<footer class="footer d-flex flex-column justify-content-end">
    {{--<div class="d-flex flex-row justify-content-around">--}}
    <ul class="footer__list">
        <li class="footer__item"><a class="footer__link" href="{{ route('privacy-policy') }}">@lang('service/index.privacy_policy')</a></li>
        <li class="left-border"><a class="footer__link" href="{{ route('get-in-touch') }}">@lang('service/index.contacts')</a></li>
        <li class="left-border"><a class="footer__link" href="{{ route('term-of-service') }}">@lang('service/index.term_of_service')</a></li>
    </ul>
    <div class="footer__copyright">
        <p>Copyright © <span class="yearN">2020</span> @lang('service/index.site_name'), @lang('service/index.all_rights_reserved')</p>
    </div>
</footer>

