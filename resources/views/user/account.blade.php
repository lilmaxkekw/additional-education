@extends('layout')

@section('title', 'Личный кабинет')

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
        <div class="bg-gray-100 p-4 border-t-2 border-blue-500 rounded-t-lg">
            <div class="max-w-lg mx-auto md:w-screen md:mx-0">
                <div class="inline-flex items-center space-x-4">
                    <img class="inline-block h-56 w-56 rounded-full" @if(empty(auth()->user()->photo)) src="{{ asset('user.jpg') }}" @else src="{{ Storage::url(auth()->user()->photo) }}" @endif alt="">
                    <h1 class="text-gray-600 text-2xl">{{ $user->name }}</h1>
                </div>
            </div>
        </div>
        <div class="bg-white space-y-6 rounded-b-lg">
            <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 max-w-xl mx-auto text-xl">Профиль</h2>
                <div class="md:w-2/3 max-w-xl mx-auto">
                    <label class="text-sm text-gray-400">Электронная почта</label>
                    <div class="w-full inline-flex border rounded-lg">
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
                            id="email"
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
                        <div class="w-full inline-flex border rounded-lg">
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
                                id="name"
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                placeholder="Иванов Иван Иванович"
                                value="{{ $user->name }}"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-400">Номер телефона</label>
                        <div class="w-full inline-flex border rounded-lg">
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
                                id="number_phone"
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                placeholder="+7(999) 999-99-99"
                                value="{{ $user->number_phone }}"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-400">Дата рождения</label>
                        <div class="w-full inline-flex border rounded-lg">
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
                                        d="M12,6C13.11,6 14,5.1 14,4C14,3.62 13.9,3.27 13.71,2.97L12,0L10.29,2.97C10.1,3.27 10,3.62 10,4A2,2 0 0,0 12,6M16.6,16L15.53,14.92L14.45,16C13.15,17.29 10.87,17.3 9.56,16L8.5,14.92L7.4,16C6.75,16.64 5.88,17 4.96,17C4.23,17 3.56,16.77 3,16.39V21A1,1 0 0,0 4,22H20A1,1 0 0,0 21,21V16.39C20.44,16.77 19.77,17 19.04,17C18.12,17 17.25,16.64 16.6,16M18,9H13V7H11V9H6A3,3 0 0,0 3,12V13.54C3,14.62 3.88,15.5 4.96,15.5C5.5,15.5 6,15.3 6.34,14.93L8.5,12.8L10.61,14.93C11.35,15.67 12.64,15.67 13.38,14.93L15.5,12.8L17.65,14.93C18,15.3 18.5,15.5 19.03,15.5C20.11,15.5 21,14.62 21,13.54V12A3,3 0 0,0 18,9Z"
                                    />
                                </svg>
                            </div>
                            <input
                                id="birthday"
                                type="date"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                value="{{ $user->birthday }}"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-400">Место проживания</label>
                        <div class="w-full inline-flex border rounded-lg">
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
                                        d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                                    />
                                </svg>
                            </div>
                            <input
                                id="place_of_residence"
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                value="{{ $user->place_of_residence }}"
                            />
                        </div>
                    </div>
                    <div>
                        <label class="text-sm text-gray-400">ИНН</label>
                        <div class="w-full inline-flex border rounded-lg">
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
                                        d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z"                                    />
                                </svg>
                            </div>
                            <input
                                id="insurance_number"
                                type="text"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                value="{{ $user->insurance_number }}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <form action="{{ route('user.account.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 mx-auto max-w-xl text-xl">Аватар</h2>
                    <div class="md:w-2/3 mx-auto max-w-xl space-y-5">
                        <div>
                            <label class="text-sm text-gray-400">Аватар</label>
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
                                    id="image"
                                    name="image"
                                    type="file"
                                    class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                />
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="mt-5 text-white w-full mx-auto max-w-sm rounded-md text-center bg-blue-500 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
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
                            Загрузить
                        </button>
                    </div>
                </div>
            </form>
            <hr />
            <div class="w-full p-4 text-right text-gray-500">
                <div class="md:w-3/12 text-center md:pl-6 mb-10">
                    <button class="btnSaveAccountUser text-white w-full mx-auto max-w-sm rounded-lg text-center bg-blue-500 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
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
            </div>
        </div>

    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://unpkg.com/imask"></script>

    <script>
        $(document).ready( function () {

            var element = $('#number_phone').get(0)
            var maskOptions = {
                mask: '+{7}(000)000-00-00'
            }
            var mask = IMask(element, maskOptions)

        });

        $(document).ready( function () {
            $('.btnSaveAccountUser').click(function (e) {
                e.preventDefault()

                $.ajax({
                    url: "{{ route('user.account') }}",
                    dataType: 'JSON',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('#csrf').val(),
                    },
                    data: {
                        name: $('#name').val(),
                        number_phone: $('#number_phone').val(),
                        email: $('#email').val(),
                        birthday: $('#birthday').val(),
                        place_of_residence: $('#place_of_residence').val(),
                        insurance_number: $('#insurance_number').val()
                    },
                    success: function (response) {
                        let tmp = JSON.stringify(response)

                        $('#modalSuccess').removeClass('hidden')
                        $('.addText').text(`Аккаунт успешно сохранен!`)
                    },
                    error: function (response) {
                        let errors = response.responseJSON;

                        $('#email').removeClass('border border-red-400')
                        $('#name').removeClass('border border-red-400')
                        $('#number_phone').removeClass('border border-red-400')

                        $('#email_error').addClass('hidden')
                        $('#name_error').addClass('hidden')
                        $('#number_phone_error').addClass('hidden')

                        if($.isEmptyObject(errors) === false) {
                            $.each(errors.errors, function(key, value){
                                let mainInput = '#' + key,
                                    errorInput = '#' + key + '_error'

                                $(mainInput).addClass('border border-red-400')
                                $(errorInput).removeClass('hidden')
                                $(errorInput).text(value)
                            })
                        }
                    },
                })
            })
        })
    </script>
@endsection
