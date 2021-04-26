@component('mail::message')
# Introduction

Привет, {{ $user->name }}!

Пожалуйста, подтвердите Ваш адрес электронной почты

@component('mail::button', ['url' => route('verification.verify')])
ПОДТВЕРДИТЬ EMAIL
@endcomponent

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
