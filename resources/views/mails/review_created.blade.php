@component('mail::message')

Hello, {{ $name }}.

Your review is now live at {{ config('app.name') }}

@component('mail::button', ['url' => $url])
    Your review
@endcomponent

Regards,<br>
—The otzov1.ru Team
@endcomponent
