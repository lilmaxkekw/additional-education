@extends('educator.layout.app')

@section('title-page')
    Страница преподавателя
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('css/account.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/account.js') }}"></script>
@endpush


@section('content')

    <div class="h-screen overflow-hidden flex items-center justify-center">
        <div class="my-10">
            <div class="bg-white rounded overflow-hidden shadow-lg">
                <div class="text-center p-6  border-b">
                    <img
                        class="h-24 w-24 rounded-full mx-auto"
                        src="https://randomuser.me/api/portraits/men/24.jpg"
                        alt="Randy Robertson"
                    />
                    <p class="pt-2 text-lg font-semibold">{{ $item->name }}</p>
                    <p class="text-sm text-gray-600">{{ $item->email }}</p>
                    <div class="mt-5">
                        <button class="border rounded-full py-2 px-4 text-xs font-semibold text-gray-700 hover:bg-gray-50" onclick="openModal();">Измени свой аккаунт</button>
                    </div>
                </div>
                <div class="">
                    <a href="#" class="px-4 py-2 pb-4 hover:bg-gray-100 flex">
                        <p class="text-sm font-medium text-gray-800 leading-none">Выйти</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div
            class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Изменение данных об аккаунте</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black mb-6 ml-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="mt-5">
                    <form method="POST" action="{{ route('account', $item->id) }}">
                        @csrf

                        <div class="">
                            <label class=" block text-sm text-gray-600" for="name_user">Ваш логин</label>
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="name" type="text" required="" placeholder="Введите ваш логин" value="{{ $item->name }}">
                        </div>
                        <div class="mt-2">
                            <label class=" block text-sm text-gray-600" for="email_user">Ваш email</label>
                            <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="email" type="text" required="" placeholder="Введите ваш email" value="{{ $item->email }}">
                        </div>
                        <div class="flex justify-end pt-5">
                            <button type="submit" class="focus:outline-none px-4 bg-green-500 p-3 rounded-lg text-black hover:bg-green-600 text-white mr-5">Сохранить</button>
                            <button type="button" class="focus:outline-none modal-close px-4 bg-gray-800 p-3 rounded-lg text-black hover:bg-gray-600 text-white">Отмена</button>
                        </div>
                    </form>
                </div>
                <!--Footer-->
            </div>
        </div>
    </div>
    <script>

        const modal = document.querySelector('.main-modal');
        const closeButton = document.querySelectorAll('.modal-close');

        const modalClose = () => {
            modal.classList.remove('fadeIn');
            modal.classList.add('fadeOut');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 500);
        }

        const openModal = () => {
            modal.classList.remove('fadeOut');
            modal.classList.add('fadeIn');
            modal.style.display = 'flex';
        }

        for (let i = 0; i < closeButton.length; i++) {

            const elements = closeButton[i];

            elements.onclick = (e) => modalClose();

            modal.style.display = 'none';

            window.onclick = function (event) {
                if (event.target == modal) modalClose();
            }
        }
    </script>
@endsection

{{--<div
    class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
    <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
            <p class="text-2xl font-bold">Изменение данных об аккаунте</p>
            <div class="modal-close cursor-pointer z-50">
                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                     viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                    </path>
                </svg>
            </div>
        </div>
        <!--Body-->
        <div class="my-5">
            <p>Inliberali Persius Multi iustitia pronuntiaret expeteretur sanos didicisset laus angusti ferrentur arbitrium arbitramur huic desiderent.?</p>
        </div>
        <!--Footer-->
        <div class="flex justify-end pt-2">
            <button class="focus:outline-none modal-close px-4 bg-gray-400 p-3 rounded-lg text-black hover:bg-gray-300">Отмена</button>
        </div>
    </div>
</div>--}}
