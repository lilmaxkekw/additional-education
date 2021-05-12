@extends('layout')

@section('title')
    Страница преподавателя
@endsection

@section('content')
    <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">

    <section class="py-20 bg-gray-100 bg-opacity-50 h-screen">
        <div class="mx-auto container max-w-full md:w-3/4 shadow-md">
            <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                <div class="max-w-sm mx-auto md:w-full md:mx-0">
                    <div class="inline-flex items-center space-x-4">
                        <img
                            class="w-20 h-20 object-cover rounded-full"
                            alt="User avatar"
                            src="https://avatars3.githubusercontent.com/u/72724639?s=400&u=964a4803693899ad66a9229db55953a3dbaad5c6&v=4"
                        />
                        <h1 class="text-gray-600 text-xl">{{ $item->name }}</h1>
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
                                id="email"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                placeholder="email@example.com"
                                value="{{ $item->email }}"
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
                                    id="name"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="Иванов Иван Иванович"
                                    value="{{ $item->name }}"
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
                                    id="number_phone"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                    placeholder="+7(999) 999-99-99"
                                    value="{{ $item->number_phone }}"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <hr />
                <div class="w-full p-4 text-right text-gray-500">
                    <div class="md:w-3/12 text-center md:pl-6">
                        <button class="btnSaveAccount text-white w-full mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
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
        </div>
    </section>

    @component('components.modal_success', ['gif' => 'https://assets8.lottiefiles.com/packages/lf20_94HTw9.json'])
    @endcomponent

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/educatorAccount.js') }}"></script>
@endsection
