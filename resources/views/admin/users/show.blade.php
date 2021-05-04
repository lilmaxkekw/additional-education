@extends('admin.layouts.app')

@section('title', 'Пользователь ' . $user->name)

@section('content')
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Пользователь {{ $user->name }}
            </h3>

        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        ИНН
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->insurance_number))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не указан</span>

                            @else
                                {{ $user->listener->insurance_number }}
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Номер телефона
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->phone_number))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не указан</span>

                            @else
                                {{ $user->listener->phone_number }}
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Дата рождения
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->birthday))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не указана</span>

                            @else
                                {{ $user->listener->birthday }}
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Место жительства
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->place_of_residence))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не указано</span>

                        @else
                            {{ $user->listener->place_of_residence }}
                        @endif
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Номер группы
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->group))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не указан</span>

                            @else
                                {{-- TODO --}}
                        @endif
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Курс
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @if(empty($user->listener->group))
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs align-middle">не записан</span>

                        @else
                            {{-- TODO --}}
                        @endif
                    </dd>
                </div>
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
