@component('mail::message')
Hello!

A review about your company was left on "{{ config('app.name') }}".

To read the review, click the link below:
@component('mail::button', ['url' => $url])
    "See The Review"
@endcomponent

Thanks for your time!

Respectfully,

The {{ config('app.name') }} Team
@endcomponent
