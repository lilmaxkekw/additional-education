<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="{{ asset('logo.jpg') }}" class="inline-block w-24 h-24">
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="{{ route('home') }}">Главная</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('courses') }}">Курсы</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('contacts') }}">Контакты</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('gallery') }}">Галерея</a>
        </nav>
        <ul class=" md:ml-auto flex flex-wrap items-center text-base">
            @auth
                <li>
                    <a
                        @if(auth()->user()->role_id === 1)
                            href="{{ route('user.account') }}"

                            @elseif(auth()->user()->role_id === 2)
                                href="{{ route('educator.account') }}"

                            @else
                                href="{{ route('admin.index') }}"

                        @endif>Личный кабинет
                    </a>
                </li>

                @else
                    <li>
                        <a href="{{ route('login') }}" class="mr-5 text-gray-600 hover:text-gray-900">Войти</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Регистрация</a>
                    </li>
            @endauth
        </ul>
    </div>
</header>

@yield('content')

<footer class="text-gray-600 body-font">
    <div class="bg-gray-100">
        <div class="container px-5 py-10 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <img src="{{ asset('logo-full.png') }}" class="inline-block">
            </a>
            <p class="text-sm text-gray-500 sm:mt-0 mt-4 ml-auto">© 2021 snowo</p>
        </div>
    </div>
</footer>

</body>

</html>
