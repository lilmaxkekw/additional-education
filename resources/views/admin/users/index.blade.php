@extends('layout')

@section('title', 'Пользователи')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Пользователи</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть всех пользователей зарегистрированных на сайте.</h3>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addUserModal" name="addUserModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить</a>
        </div>
    </div>

{{--    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">--}}
{{--        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">--}}
{{--            <div class="flex justify-between">--}}
{{--                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">--}}
{{--                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">--}}
{{--                        <div class="flex">--}}
{{--                            <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">--}}
{{--                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">--}}
{{--            <table class="min-w-full">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">ФИО</th>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Статус email</th>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Роль пользователя</th>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="bg-white">--}}
{{--                    @foreach($users as $user)--}}
{{--                        <tr>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                <div class="text-sm leading-5 text-blue-900">{{ $user->name }}</div>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                <div class="text-sm leading-5 text-blue-900">{{ $user->email }}</div>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                @if($user->email_verified_at === NULL)--}}
{{--                                    <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">--}}
{{--                                    <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>--}}
{{--                                    <span class="relative text-xs align-middle">не подтвержден</span>--}}
{{--                                    @else--}}
{{--                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">--}}
{{--                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>--}}
{{--                                        <span class="relative text-xs align-middle">подтвержден</span>--}}
{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                <div class="text-sm leading-5 text-blue-900">{{ $user->role->name_role }}</div>--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">--}}
{{--                                <a href="{{ route('users.show', $user->id) }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Подробнее</a>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            @if(! $users->isEmpty())--}}
{{--                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans mb-5">--}}
{{--                    <div>--}}
{{--                        <p class="text-sm leading-5 text-blue-500">--}}
{{--                            Всего записей--}}
{{--                            <span class="font-medium">{{ $count }}</span>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @else--}}
{{--                @component('components.no_data_message') @endcomponent--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-700">ФИО</th>
                        <th class="py-2 px-3 text-blue-700">Email</th>
                        <th class="py-2 px-3 text-blue-700">Статус email</th>
                        <th class="py-2 px-3 text-blue-700">Роль пользователя</th>
                        <th class="py-2 px-3 text-blue-700">Номер телефона</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                    @foreach($users as $user)
                        <tr>
                            <td class="py-3 px-3">{{ $user->name }}</td>
                            <td class="py-3 px-3">{{ $user->email }}</td>
                            <td class="py-3 px-3">{{ $user->email_verified_at }}</td>
                            <td class="py-3 px-3">{{ $user->number_phone }}</td>
                            <td class="py-3 px-3">
{{--                                <a href="#editSectionModal" name="editSectionModal" data-name="{{ $section->name_section  }}" data-id="{{ $section->id_section }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>--}}
{{--                                <a href="#deleteSectionModal" data-id="" name="deleteSectionModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if($users->isEmpty())
                @component('components.no_data_message')
                @endcomponent
            @endif
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $users->links('vendor.pagination.custom') }}
    </div>

    <!-- Add user modal -->
    <div id="addUserModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 rounded-lg">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление пользователя</h2>
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
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                ФИО
                            </label>
                            <div class="mt-1 border-2 border-black flex rounded-md shadow-sm">
                                <input type="text" name="name" id="name"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Пароль
                        </label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div class="col-span-4 sm:col-span-3">
                        <label for="roles" class="block text-sm font-medium text-gray-700">Роль пользователя</label>
                        <select id="roles" name="roles" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name_role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('a[name=addUserModal]').click(function(e){
                e.preventDefault()

                $('#addUserModal').removeClass('hidden')

                $('.close-modal').click(function(){
                    $('.modal').addClass('hidden')
                })
            })

            $('#btnSave').click(function(){
                let name = $('#name').val(),
                    email = $('#email').val(),
                    role = $('#roles').val(),
                    password = $('#password').val()

                $.ajax({
                    url:  '{{ route('users.index') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: name,
                        email: email,
                        password: password,
                        role_id: role
                    },
                    cache: false,
                    success: function(data){
                        var response = data.responseJSON

                        if(response){
                            $('#addUserModal').addClass('hidden')
                            $('#modal').removeClass('hidden')
                            // location.reload()
                        }
                    }
                })
            })
        })
    </script>
@endsection
