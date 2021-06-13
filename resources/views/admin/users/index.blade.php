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

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full" id="table">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600">ФИО</th>
                        <th class="py-2 px-3 text-blue-600">Email</th>
                        <th class="py-2 px-3 text-blue-600">Статус email</th>
                        <th class="py-2 px-3 text-blue-600">Роль пользователя</th>
                        <th class="py-2 px-3 text-blue-600">Номер телефона</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                    @foreach($users as $user)
                        <tr>
                            <td class="py-3 px-3">{{ $user->name }}</td>
                            <td class="py-3 px-3">{{ $user->email }}</td>
                            <td class="py-3 px-3">
                                @if(empty($user->email_verified_at))
                                    <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs align-middle">не подтвержден</span>

                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs align-middle">подтвержден</span>
                                @endif
                            </td>
                            <td class="py-3 px-3">{{ $user->role->name_role }}</td>
                            <td class="py-3 px-3">
                                @if(empty($user->number_phone))
                                    <span>-</span>

                                    @else
                                        {{ $user->number_phone }}

                                @endif
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
    <div id="addUserModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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
                            <div class="mt-1">
                                <input type="text" name="name" id="name"
                                       class="focus:ring-blue-500 border focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email
                        </label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email"
                                   class="focus:ring-blue-500 border focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Пароль
                        </label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password"
                                   class="focus:ring-blue-500 border focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
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

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function(){
            $('button[name="ok"]').click(function(){
                $('.modal').addClass('hidden')
                location.reload()
            })

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
                    success: function(data){
                        let response = JSON.parse(data)
                        console.log(response)
                        if(response){
                            $('#addUserModal').addClass('hidden')
                            $('.modal').removeClass('hidden')
                            $('.addText').text(`Пользователь успешно добавлен!`)
                        }
                    },
                    error: function(data){

                    }
                })
            })
        })
    </script>
@endsection
