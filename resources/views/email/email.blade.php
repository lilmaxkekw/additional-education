@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
ПОДТВЕРДИТЬ EMAIL
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
