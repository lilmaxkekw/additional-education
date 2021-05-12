@extends('layout')

@section('title', 'Информация')

@section('content')

    @if(empty(auth()->user()->email_verified_at))
        <div class="alert flex flex-row items-center bg-yellow-200 p-5 rounded border-b-2 border-yellow-300 mb-5">
            <div class="alert-icon flex items-center bg-yellow-100 border-2 border-yellow-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-yellow-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-yellow-800">
                    Внимание!
                </div>
                <div class="alert-description text-sm text-yellow-600">
                    Подтвердите свой email
                </div>
            </div>
        </div>
    @endif

    <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
{{--    bg-opacity-5--}}
    <section class="bg-gray-100 bg-opacity-50 h-screen">
        <div class="bg-gray-300 p-4 border-t-2 border-indigo-400 rounded-t">
            <div class="max-w-sm mx-auto md:w-full md:mx-0">
                <div class="inline-flex items-center space-x-4">
                    <img class="inline-block h-56 w-56 rounded-full" @if(empty(auth()->user()->photo)) src="/user.svg" @else src="12121" @endif alt="">
                    <h1 class="text-gray-600 text-xl">{{ $user->name }}</h1>
                </div>
            </div>
        </div>
        <div class="bg-white space-y-6">
            <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 max-w-xl mx-auto text-xl">Профиль</h2>
                <div class="md:w-2/3 max-w-xl mx-auto">
                    <label class="text-sm text-gray-400">Электронная почта</label>
                    <div class="w-full inline-flex border">
                        <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                            <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </div>
                        <input
                            type="email"
                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            placeholder="email@example.com"
                            value="{{ $user->email }}"
                        />
                    </div>
                </div>
            </div>

            <hr />
            <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 mx-auto max-w-xl text-xl">Персональная информация</h2>
                <div class="md:w-2/3 mx-auto max-w-xl space-y-5">
                    <div>
                        <label class="text-sm text-gray-400">Полное имя</label>
                        <div class="w-full inline-flex border">
                            <div class="w-1/12 pt-2 bg-gray-100">
                                <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                            </div>
                            <input
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                placeholder="Иванов Иван Иванович"
                                value="{{ $user->name }}"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-400">Номер телефона</label>
                        <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100">
                                <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                                    />
                                </svg>
                            </div>
                            <input
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                placeholder="+7(999) 999-99-99"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <hr />
            <div class="w-full p-4 text-right text-gray-500">
                <div class="md:w-3/12 text-center md:pl-6">
                    <button class="text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
                        <svg
                            fill="none"
                            class="w-4 text-white mr-2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                            />
                        </svg>
                        Сохранить
                    </button>
                </div>
                <button class="inline-flex items-center focus:outline-none mr-4">
                    <svg
                        fill="none"
                        class="w-4 mr-2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                        />
                    </svg>
                    Удалить профиль
                </button>
            </div>
        </div>
    </section>

{{--    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">--}}
{{--        <div--}}
{{--            class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">--}}
{{--            <div class="modal-content py-4 text-left px-6">--}}
{{--                <!--Title-->--}}
{{--                <div class="flex justify-between items-center pb-3">--}}
{{--                    <p class="text-2xl font-bold">Изменение данных об аккаунте</p>--}}
{{--                    <div class="modal-close cursor-pointer z-50">--}}
{{--                        <svg class="fill-current text-black mb-6 ml-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"--}}
{{--                             viewBox="0 0 18 18">--}}
{{--                            <path--}}
{{--                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">--}}
{{--                            </path>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--Body-->--}}
{{--                <div class="mt-5">--}}
{{--                    <form method="POST" action="{{ route('user.account') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="">--}}
{{--                            <label class=" block text-sm text-gray-600" for="name_user">Ваш логин</label>--}}
{{--                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Введите ваш логин" value="{{ $user->name }}">--}}
{{--                        </div>--}}
{{--                        <div class="mt-2">--}}
{{--                            <label class=" block text-sm text-gray-600" for="email_user">Ваш email</label>--}}
{{--                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="Введите ваш email" value="{{ $user->email }}">--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-end pt-5">--}}
{{--                            <button type="button" class="focus:outline-none px-4 bg-green-500 p-3 rounded-lg text-black hover:bg-green-600 text-white mr-5 btnSave">Сохранить</button>--}}
{{--                            <button type="button" class="focus:outline-none modal-close px-4 bg-gray-800 p-3 rounded-lg text-black hover:bg-gray-600 text-white">Отмена</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--                <!--Footer-->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
