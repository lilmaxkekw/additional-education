<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
          integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    {{-- Lottie --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.3.0/dist/lottie-player.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <script src="{{ asset('js/search.js') }}"></script>
    <style>
        html,
        body {
            font-family: "Rubik", sans-serif;
        }

        /* navigation
         - show navigation always on the large screen devices with (min-width:1024)
        */

        @media (min-width: 1024px) {
            .top-navbar {
                display: inline-flex !important;
            }
        }
    </style>
{{--<body class="bg-gray-100">--}}
<body class="bg-blue-50">
{{--<body class="bg-gray-50">--}}

@component('components.header')
@endcomponent

<div class="flex">
    <nav class="flex-3 bg-white w-64 h-screen px-4 text-gray-900 hidden lg:block">
        <div class="mt-10 mb-4">
            <ul class="ml-4">
                @if(auth()->user()->role_id === 3)
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                           <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69M12 3L2 12H5V20H11V14H13V20H19V12H22L12 3Z" />
                            </svg>
                        </span>
                        <a href="{{ route('admin.index') }}">
                            <span class="ml-2">Главная</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('courses.index') }}">
                            <span class="ml-2">Курсы</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M3 11H11V3H3M5 5H9V9H5M13 21H21V13H13M15 15H19V19H15M3 21H11V13H3M5 15H9V19H5M13 3V11H21V3M19 9H15V5H19Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('categories.index') }}">
                            <span class="ml-2">Категории</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row  border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('groups.index') }}">
                            <span class="ml-2">Группы</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M1,12H10.76L8.26,9.5L9.67,8.08L14.59,13L9.67,17.92L8.26,16.5L10.76,14H1V12M19,3C20.11,3 21,3.9 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V16H5V19H19V7H5V10H3V5A2,2 0 0,1 5,3H19Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('applications.index') }}">
                            <span class="ml-2">Заявки</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                            </svg>
                        </span>
                        <a href="{{ route('users.index') }}">
                            <span class="ml-2">Пользователи</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('report.card.first') }}">
                            <span class="ml-2">Журнал успеваемости</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M4 7V19H19V21H4C2 21 2 19 2 19V7H4M21 5V15H8V5H21M21.3 3H7.7C6.76 3 6 3.7 6 4.55V15.45C6 16.31 6.76 17 7.7 17H21.3C22.24 17 23 16.31 23 15.45V4.55C23 3.7 22.24 3 21.3 3M9 6H12V11H9V6M20 14H9V12H20V14M20 8H14V6H20V8M20 11H14V9H20V11Z" />
                            </svg>
                        </span>
                        <a href="{{ route('news.index') }}">
                            <span class="ml-2">Новости</span>
                        </a>
                    </li>

                    @elseif(auth()->user()->role_id === 1)
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 5.69L17 10.19V18H15V12H9V18H7V10.19L12 5.69M12 3L2 12H5V20H11V14H13V20H19V12H22L12 3Z" />
                            </svg>
                            <a href="{{ route('user.dashboard') }}">
                                <span class="ml-2">Личный кабинет</span>
                            </a>
                        </li>
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                                <span>
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z" />
                                    </svg>
                                </span>
                            <a href="{{ route('courses') }}">
                                <span class="ml-2">Курсы</span>
                            </a>
                        </li>
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M10 4A4 4 0 0 0 6 8A4 4 0 0 0 10 12A4 4 0 0 0 14 8A4 4 0 0 0 10 4M10 6A2 2 0 0 1 12 8A2 2 0 0 1 10 10A2 2 0 0 1 8 8A2 2 0 0 1 10 6M17 12C16.84 12 16.76 12.08 16.76 12.24L16.5 13.5C16.28 13.68 15.96 13.84 15.72 14L14.44 13.5C14.36 13.5 14.2 13.5 14.12 13.6L13.16 15.36C13.08 15.44 13.08 15.6 13.24 15.68L14.28 16.5V17.5L13.24 18.32C13.16 18.4 13.08 18.56 13.16 18.64L14.12 20.4C14.2 20.5 14.36 20.5 14.44 20.5L15.72 20C15.96 20.16 16.28 20.32 16.5 20.5L16.76 21.76C16.76 21.92 16.84 22 17 22H19C19.08 22 19.24 21.92 19.24 21.76L19.4 20.5C19.72 20.32 20.04 20.16 20.28 20L21.5 20.5C21.64 20.5 21.8 20.5 21.8 20.4L22.84 18.64C22.92 18.56 22.84 18.4 22.76 18.32L21.72 17.5V16.5L22.76 15.68C22.84 15.6 22.92 15.44 22.84 15.36L21.8 13.6C21.8 13.5 21.64 13.5 21.5 13.5L20.28 14C20.04 13.84 19.72 13.68 19.4 13.5L19.24 12.24C19.24 12.08 19.08 12 19 12H17M10 13C7.33 13 2 14.33 2 17V20H11.67C11.39 19.41 11.19 18.77 11.09 18.1H3.9V17C3.9 16.36 7.03 14.9 10 14.9C10.43 14.9 10.87 14.94 11.3 15C11.5 14.36 11.77 13.76 12.12 13.21C11.34 13.08 10.6 13 10 13M18.04 15.5C18.84 15.5 19.5 16.16 19.5 17.04C19.5 17.84 18.84 18.5 18.04 18.5C17.16 18.5 16.5 17.84 16.5 17.04C16.5 16.16 17.16 15.5 18.04 15.5Z" />
                                </svg>
                            </span>
                            <a href="{{ route('user.account') }}">
                                <span class="ml-2">Настройки</span>
                            </a>
                        </li>

                    @elseif(auth()->user()->role_id === 2)
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/>
                                </svg>
                            </span>
                            <a href="{{ route('educator.account') }}">
                                <span class="ml-2">Личный кабинет</span>
                            </a>
                        </li>
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-50 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>
                                </svg>
                            </span>
                            <a href="{{ route('report.card.first') }}">
                                <span class="ml-2">Журнал успеваемости</span>
                            </a>
                        </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="flex-1 sm:mx-12 sm:my-12">
        @include('educator.include.message')
        @yield('content')
    </div>
</div>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
    $(document).ready(function () {



        $(".nav-toggler").each(function (_, navToggler) {
            let target = $(navToggler).data("target");
            $(navToggler).on("click", function () {
                $(target).animate({
                    height: "toggle"
                });
            });

            $('a[name=dropdown]').click(function (e) {
                e.preventDefault()
                $('#dropdown').toggleClass('hidden')
            })
        });
    });
</script>
</body>
</html>
