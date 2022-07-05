@component('mail::message')

@lang('service/message.mail.hi') {{ $name }}.

{{ config('app.name') }}, информирует вас о том, что у вас есть непрочитанные сообщения, пожалуйста проверьте их.

Спасибо.<br>

Команда {{ config('app.name') }}.
@endcomponent
