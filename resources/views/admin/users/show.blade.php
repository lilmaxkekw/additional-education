@extends('admin.layouts.app')

@section('title', 'Пользователь ' . $user->name)

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                {{ $user->name }}
            </h3>

{{--            <div class="container flex justify-end">--}}
{{--                <a href="{{ route('courses.edit', $course->id) }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none mr-2">Редактировать</a>--}}
{{--                <a href="#modal" name="modal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</a>--}}
{{--            </div>--}}
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Название курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Описание курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Номер курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                    </dd>
                </div>
{{--                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">--}}
{{--                    <dt class="text-sm font-medium text-gray-500">--}}
{{--                        Категория--}}
{{--                    </dt>--}}
{{--                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">--}}
{{--                        @if(!empty($category->name_of_category))--}}
{{--                            {{ $category->name_of_category }}--}}
{{--                        @else--}}
{{--                            <span>-</span>--}}
{{--                        @endif--}}
{{--                    </dd>--}}
{{--                </div>--}}
{{--                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">--}}
{{--                    <dt class="text-sm font-medium text-gray-500">--}}
{{--                        Видео--}}
{{--                    </dt>--}}
{{--                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">--}}
{{--                        @isset($course->video)--}}
{{--                            <video src=""></video>--}}
{{--                        @endisset--}}
{{--                        <span>-</span>--}}
{{--                    </dd>--}}
{{--                </div>--}}
            </dl>
        </div>
    </div>

    <div id="modal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Подтверждение удаления</h2>
                <button class="text-black close-modal">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                    </svg>
                </button>
            </div>
            <!-- modal body -->
            <div class="p-4">
                Вы действительно хотите удалить?
            </div>
{{--            <div class="flex justify-center items-center w-100 p-3">--}}
{{--                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">--}}
{{--                    @method('DELETE')--}}
{{--                    @csrf--}}
{{--                    <button class="bg-red-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">Удалить</button>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"--}}
{{--            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $('a[name=modal]').click(function(e){--}}
{{--                e.preventDefault()--}}
{{--                $('#modal').removeClass('hidden')--}}
{{--            })--}}

{{--            $('.close-modal').click(function(){--}}
{{--                $('.modal').addClass('hidden')--}}
{{--            })--}}
{{--        })--}}
{{--    </script>--}}

@endsection
