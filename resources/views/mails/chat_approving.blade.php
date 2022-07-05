@component('mail::message')

@lang('service/message.mail.hi') {{ $contact_name }}.

{{ config('app.name') }}, информирует вас, {{ $name }} хочет включить вас в список своих контактов для общения с вами в режиме реального времени. Есл вы согласны, кликните по ссылке ниже.

@component('mail::button', ['url' => $url])
    @lang('service/message.mail.agree')
@endcomponent

Скпасибо.<br>

Команда {{ config('app.name') }}.
@endcomponent
