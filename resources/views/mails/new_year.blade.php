@component('mail::message')
    <b>New Year’s Day</b>

    Happy New Year {{ \Carbon\Carbon::now()->year }}!

    May this year bring peace, health, and happiness, along with plenty of exciting
    experiences for you to tell us about. The entire otzov1.ru team is thrilled to hear
    what {{ \Carbon\Carbon::now()->year }} has in store for you.

    Thank you for your reviews — keep making the world a better place!

    Respectfully.

    The otzov1.ru Team
@endcomponent
