@component('mail::message')
# Hello, {{ $user->name }}

Thank you so much for registering to BirdBook!
We hope you enjoy your avian adventure.

@component('mail::button', ['url' => 'http:localhost:8000/home'])
Start Browsing
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
