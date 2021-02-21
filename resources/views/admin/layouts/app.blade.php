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
<nav class="flex items-center bg-gray-800 p-3 flex-wrap">
    <a href="#" class="p-2 mr-4 inline-flex items-center">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-8 w-8 mr-2">
            <path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"/>
        </svg>
        <span class="text-xl text-white font-bold uppercase tracking-wide">Talwind CSS</span
        >
    </a>
    <button class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
        <i class="material-icons">menu</i>
    </button>
    <div class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:ml-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">

        </div>
    </div>

    <div class="hidden lg:flex">
        <span class="text-white mr-3">Welcome to the club, buddy</span>
        <img src="/pBZkO4_5eKQ.jpg" alt="" class="rounded-full h-14 w-14">
    </div>
</nav>

<div class="flex">
    <nav class="flex-3 bg-purple-900 w-64 h-screen px-4 tex-gray-900 border border-purple-900">
        <div class="mt-10 mb-4">
            <ul class="ml-4">
                <li class="mb-2 px-4 py-4 text-gray-100 flex flex-row border-gray-300 hover:text-black hover:bg-gray-300 hover:font-bold rounded rounded-lg">
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
                <li class="mb-2 px-4 py-4 text-gray-100 flex flex-row border-gray-300 hover:text-black hover:bg-gray-300 hover:font-bold rounded rounded-lg">
              <span>
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M12 3L1 9L5 11.18V17.18L12 21L19 17.18V11.18L21 10.09V17H23V9L12 3M18.82 9L12 12.72L5.18 9L12 5.28L18.82 9M17 16L12 18.72L7 16V12.27L12 15L17 12.27V16Z" />
</svg>
              </span>
                    <a href="{{ route('courses.index') }}">
                        <span class="ml-2">Курсы</span>
                    </a>
                </li>
                <li class="mb-2 px-4 py-4 text-gray-100 flex flex-row border-gray-300 hover:text-black hover:bg-gray-300 hover:font-bold rounded rounded-lg">
              <span>
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M3 11H11V3H3M5 5H9V9H5M13 21H21V13H13M15 15H19V19H15M3 21H11V13H3M5 15H9V19H5M13 3V11H21V3M19 9H15V5H19Z" />
</svg>
              </span>
                    <a href="{{ route('categories.index') }}">
                        <span class="ml-2">Категории</span>
                    </a>
                </li>
                <li class="mb-2 px-4 py-4 text-gray-100 flex flex-row  border-gray-300 hover:text-black hover:bg-gray-300 hover:font-bold rounded rounded-lg">
              <span>
                  <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M12,5A3.5,3.5 0 0,0 8.5,8.5A3.5,3.5 0 0,0 12,12A3.5,3.5 0 0,0 15.5,8.5A3.5,3.5 0 0,0 12,5M12,7A1.5,1.5 0 0,1 13.5,8.5A1.5,1.5 0 0,1 12,10A1.5,1.5 0 0,1 10.5,8.5A1.5,1.5 0 0,1 12,7M5.5,8A2.5,2.5 0 0,0 3,10.5C3,11.44 3.53,12.25 4.29,12.68C4.65,12.88 5.06,13 5.5,13C5.94,13 6.35,12.88 6.71,12.68C7.08,12.47 7.39,12.17 7.62,11.81C6.89,10.86 6.5,9.7 6.5,8.5C6.5,8.41 6.5,8.31 6.5,8.22C6.2,8.08 5.86,8 5.5,8M18.5,8C18.14,8 17.8,8.08 17.5,8.22C17.5,8.31 17.5,8.41 17.5,8.5C17.5,9.7 17.11,10.86 16.38,11.81C16.5,12 16.63,12.15 16.78,12.3C16.94,12.45 17.1,12.58 17.29,12.68C17.65,12.88 18.06,13 18.5,13C18.94,13 19.35,12.88 19.71,12.68C20.47,12.25 21,11.44 21,10.5A2.5,2.5 0 0,0 18.5,8M12,14C9.66,14 5,15.17 5,17.5V19H19V17.5C19,15.17 14.34,14 12,14M4.71,14.55C2.78,14.78 0,15.76 0,17.5V19H3V17.07C3,16.06 3.69,15.22 4.71,14.55M19.29,14.55C20.31,15.22 21,16.06 21,17.07V19H24V17.5C24,15.76 21.22,14.78 19.29,14.55M12,16C13.53,16 15.24,16.5 16.23,17H7.77C8.76,16.5 10.47,16 12,16Z" />
</svg>
              </span>
                    <a href="{{ route('groups.index') }}">
                        <span class="ml-2">Группы</span>
                    </a>
                </li>
                <li class="mb-2 px-4 py-4 text-gray-100 flex flex-row border-gray-300 hover:text-black hover:bg-gray-300 hover:font-bold rounded rounded-lg">
              <span>
                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M1,12H10.76L8.26,9.5L9.67,8.08L14.59,13L9.67,17.92L8.26,16.5L10.76,14H1V12M19,3C20.11,3 21,3.9 21,5V19A2,2 0 0,1 19,21H5C3.89,21 3,20.1 3,19V16H5V19H19V7H5V10H3V5A2,2 0 0,1 5,3H19Z" />
</svg>
              </span>
                    <a href="{{ route('applications.index') }}">
                        <span class="ml-2">Заявки</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="flex-1 mx-12 my-12">
        @yield('content')
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(".nav-toggler").each(function (_, navToggler) {
            var target = $(navToggler).data("target");
            $(navToggler).on("click", function () {
                $(target).animate({
                    height: "toggle"
                });
            });
        });
    });
</script>
</body>
</html>
