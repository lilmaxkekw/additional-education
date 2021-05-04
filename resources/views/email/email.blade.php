@component('mail::message')
# Introduction

Здравствуйте, {{ $user->name }}!

Пожалуйста, подтвердите Ваш адрес электронной почты ({{ $user->email }}).
Благодарим Вас и желаем успехов в учебе!

@component('mail::button', ['url' => 'localhost'])
ПОДТВЕРДИТЬ EMAIL
@endcomponent

С наилучшими пожеланиями.<br>
Команда Политехнического колледжа

{{--Спасибо,<br>--}}
{{--{{ config('app.name') }}--}}
@endcomponent
