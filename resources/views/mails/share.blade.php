@component('mail::message')

@lang('service/message.mail.hi_this') {{ $name }}.

{!! $message !!}

@component('mail::button', ['url' => route('home')])
    @lang('service/message.mail.to_the') {{ config('app.name') }}
@endcomponent

@lang('service/message.mail.regards'), {{ config('app.name') }}
@endcomponent
