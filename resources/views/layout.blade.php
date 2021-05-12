<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
          integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    {{-- Lottie --}}
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.3.0/dist/lottie-player.js"></script>
{{--    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>--}}

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
<body class="bg-gray-100">

@component('components.header')
@endcomponent

<div class="flex">
    <nav class="flex-3 bg-white w-64 h-screen px-4 text-gray-900 hidden lg:block">
        <div class="mt-10 mb-4">
            <ul class="ml-4">
                @if(auth()->user()->role_id === 3)
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
                        <span>
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/>
                            </svg>
                        </span>
                        <a href="{{ route('admin.index') }}">
                            <span class="ml-2">Главная</span>
                        </a>
                    </li>
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
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
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
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
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row  border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
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
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
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
                    <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
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

                    @elseif(auth()->user()->role_id === 1)
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M12,3L2,12H5V20H19V12H22L12,3M12,8.75A2.25,2.25 0 0,1 14.25,11A2.25,2.25 0 0,1 12,13.25A2.25,2.25 0 0,1 9.75,11A2.25,2.25 0 0,1 12,8.75M12,15C13.5,15 16.5,15.75 16.5,17.25V18H7.5V17.25C7.5,15.75 10.5,15 12,15Z"/>
                                </svg>
                            </span>
                            <a href="{{ route('user.account') }}">
                                <span class="ml-2">Личный кабинет</span>
                            </a>
                        </li>
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                      d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z"/>
                                </svg>
                            </span>
                            <a href="{{ route('admin.index') }}">
                                <span class="ml-2">Мои курсы</span>
                            </a>
                        </li>
                        <li class="mb-2 px-4 py-4 text-gray-900 flex flex-row border-blue-100 hover:text-black hover:bg-blue-100 hover:font-bold rounded rounded-lg">
                            <span>
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.07 14.88L21.12 16.93L15.06 23H13V20.94L19.07 14.88M21.04 13.13C21.18 13.13 21.31 13.19 21.42 13.3L22.7 14.58C22.92 14.79 22.92 15.14 22.7 15.35L21.7 16.35L19.65 14.3L20.65 13.3C20.76 13.19 20.9 13.13 21.04 13.13M17 4V10L15 8L13 10V4H9V20H11V22H7C5.95 22 5 21.05 5 20V19H3V17H5V13H3V11H5V7H3V5H5V4C5 2.89 5.9 2 7 2H19C20.05 2 21 2.95 21 4V10L19 12V4H17M5 5V7H7V5H5M5 11V13H7V11H5M5 17V19H7V17H5Z" />
                                </svg>
                            </span>
                            <a href="{{ route('admin.index') }}">
                                <span class="ml-2">Моя успеваемость</span>
                            </a>
                        </li>
                    @else
                @endif
            </ul>
        </div>
    </nav>

    <div class="flex-1 sm:mx-12 sm:my-12">
        @yield('content')
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
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
