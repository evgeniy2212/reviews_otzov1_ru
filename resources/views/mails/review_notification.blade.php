@component('mail::message')
Hello!

A review about your company was left on "{{ config('app.name') }}".
The reviewer has indicated that you may contact them for more information or to
resolve any concerns.

<span style="text-decoration: underline">You now have the choice to:</span>
<ul>
    <li>Leave a comment which will appear beside the review</li>
    <li>Send a private email to the reviewer</li>
    <li>Ignore this review</li>
</ul>

<span style="text-decoration: underline">If you choose to respond, please follow these steps:<span>

<ol>
    <li>Go to “See the Review”</li>
    <li>Click the “Sign In/Sign Up” button and log in</li>
    <li>Return to this email and click the “See the Review” button below to open the
        review</li>
    <li>Click on the “Show Comment” button to the right of the review</li>
    <li>Select “Comment” or “Send Email”</li>
</ol>

To read the review, click the link below:
@component('mail::button', ['url' => $url])
    "See The Review"
@endcomponent

Thanks for your time!

Respectfully,

The {{ config('app.name') }} Team
@endcomponent
