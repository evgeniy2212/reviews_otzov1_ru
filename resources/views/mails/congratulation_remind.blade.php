@component('mail::message')
Hi {{ $user }},

Taking into account your wishes, we remind you that {{ \Carbon\Carbon::now()->diffInDays($date_remind, false) ? \Carbon\Carbon::now()->diffInDays($date_remind, false) . ' day remains until' : ' today' }} the special day,

<b>Date</b>: {{ $date }}

<b>Name:</b> {{ $name }}

<b>Category:</b> {{ $date_type }}

Until that day, you still have time to prepare for this special day.

Respectfully.

The Reviews4Results Team
@endcomponent
