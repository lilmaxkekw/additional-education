@extends('layout')

@section('title', 'Личный кабинет')

@section('content')

        @if(session()->has('success'))
            @component('components.modal', ['gif' => 'https://assets9.lottiefiles.com/packages/lf20_folnmvzi.json'])
            @endcomponent
        @endif

{{--    style="background-color: rgba(231,238,239, .9); h-screen--}}
{{--    <div id="addCourseModal" class="modal  w-full fixed left-0 top-0 flex justify-center items-center">--}}
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Подача заявки</h2>
                <button class="text-black close-modal">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                    </svg>
                </button>
            </div>
            <!-- modal body -->
            <div class="flex justify-center items-center w-100 p-3">
                <form action="{{ route('user.enrollment') }}" method="POST">
                    @csrf
                    <div class="p-4">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="phone_number" class="block text-sm font-medium text-gray-700">
                                        Номер телефона
                                    </label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input type="text" name="phone_number" id="phone_number"
                                               class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    </div>
                                    <span class="text-sm font-medium text-red-500" id="phone_number_error"></span>
                                </div>
                            </div>
                            <div>
                                <label for="birthday" class="block text-sm font-medium text-gray-700">
                                    Дата рождения
                                </label>
                                <div class="mt-1">
                                    <input type="date" name="birthday" id="birthday"
                                           class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
                            </div>
                            <div>
                                <label for="place_of_residence" class="block text-sm font-medium text-gray-700">
                                    Место проживания
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="place_of_residence" id="place_of_residence"
                                           class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="place_of_residence_error"></span>
                            </div>
                            <div>
                                <label for="platform_address" class="block text-sm font-medium text-gray-700">
                                    Место обучения
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="platform_address" id="platform_address"
                                           class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="place_address_error"></span>
                            </div>
                            <div>
                                <label for="insurance_number" class="block text-sm font-medium text-gray-700">
                                    ИНН
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="insurance_number" id="insurance_number"
                                           class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="insurance_number_error"></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
                </form>
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function(){
            $('button[name=ok]').click(function(){
                $('#modalSuccess').addClass('hidden')
            })
        })

    </script>
@endsection