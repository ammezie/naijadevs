@component('mail::message')
Welcome {{ $user->name }},

Thanks for signing up on Naijadevs.

Please take a moment to fill your company's details by clicking the button below.

@component('mail::button', ['url' => config('app.url') . '/settings/company' ])
Fill Company's Details
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
