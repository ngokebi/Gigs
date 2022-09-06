@component('mail::message')
# Notice

A new Gig has been Created

@component('mail::button', ['url' => 'http://127.0.0.1:8000/dashboard'])
Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
