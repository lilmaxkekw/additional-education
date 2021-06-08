@extends('layout')

@section('title', 'Заявки')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Заявки</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть всех пользователей, подавших заявку на участие в курсах. С помощью чекбоксов Вы можете выбрать заявки и добавить в группу.</h3>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#formGroupModal" name="formGroupModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сформировать группу</a>
        </div>
    </div>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600"></th>
                        <th class="py-2 px-3 text-blue-600">ФИО</th>
                        <th class="py-2 px-3 text-blue-600">Выбранный курс</th>
                        <th class="py-2 px-3 text-blue-600">Email</th>
                        <th class="py-2 px-3 text-blue-600">Номер телефона</th>
                        <th class="py-2 px-3 text-blue-600">День рождения</th>
                        <th class="py-2 px-3 text-blue-600">Место проживания</th>
                        <th class="py-2 px-3 text-blue-600">Страховой номер</th>
                        <th class="py-2 px-3 text-blue-600">Статус заявки</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($applications as $application)
                            <tr>
                                <td class="py-3 px-3"><input type="checkbox" name="" data-id="{{ $application->user->id }}" class="form-checkbox h-5 w-5 text-red-600" @if($application->status_application === 1) disabled  @endif></td>
                                <td class="py-3 px-3">{{ $application->user->name }}</td>
                                <td class="py-3 px-3">{{ $application->course->name_of_course }}</td>
                                <td class="py-3 px-3">{{ $application->user->email }}</td>
                                <td class="py-3 px-3">{{ $application->user->number_phone }}</td>
                                <td class="py-3 px-3">
                                    @if(! empty($application->user->birthday))
                                        {{ \Carbon\Carbon::parse($application->user->birthday)->format('d.m.Y') }}

                                        @else
                                            <span>-</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    @if(! empty($application->user->place_of_residence))
                                        {{ $application->user->place_of_residence }}

                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    @if(! empty($application->user->insurance_number))
                                        {{ $application->user->insurance_number }}

                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    @if($application->status_application === 0)
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs align-middle">в ожидании</span>

                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs align-middle">одобрено</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                @if($applications->isEmpty())
                    @component('components.no_data_message')
                    @endcomponent
                @endif
            </div>
        </div>

        <div id="formGroupModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
            <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
            <!-- modal -->
            <div class="bg-white rounded-lg shadow-lg w-1/3">
                <!-- modal header -->
                <div class="px-4 py-2 flex justify-between items-center">
                    <h2 class="">Добавление слушателей в группу</h2>
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
                    <div class="col-span-4 sm:col-span-3">
                        <label for="groups" class="block text-sm font-medium text-gray-700">Группа (курс)</label>
                        <select id="groups" name="groups" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->number_group }} ({{ $group->course->name_of_course }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-center items-center w-100 p-3">
                    <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
                </div>
            </div>
        </div>

        <!-- Modal success -->
        @component('components.modal', ['gif' => asset('gifs/success.json')])
        @endcomponent

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
                integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

        <script src="public/js/search.js"></script>

        <script>

            $(document).ready(function() {
                $('.alert').delay(5000).fadeOut(200)

                $('a[name=formGroupModal]').click(function () {
                    $('#formGroupModal').removeClass('hidden')
                })

                $('.close-modal').click(function () {
                    $('.modal').addClass('hidden')
                })

                $('button[name=ok]').click(function (e) {
                    e.preventDefault()
                    $('#modalSuccess').addClass('hidden')
                    location.reload()
                })

                $('#btnSave').on("click", function () {
                    var group = $('#groups option:selected').val()
                    var insert = []
                    $('.form-checkbox').each(function () {
                        if ($(this).is(":checked")) {
                            insert.push($(this).attr('data-id'))
                        }
                    })

                    $.ajax({
                        url: '{{ route('applications.index') }}',
                        type: 'POST',
                        data: {
                            _token: $('#csrf').val(),
                            group_id: group,
                            insert: insert
                        },
                        success: function(res){
                            let data = JSON.stringify(res)

                            if(data){
                                $('#addGroupModal').addClass('hidden')
                                $('#modal').removeClass('hidden')
                                $('.addText').text(`успешно добавлена!`)
                            }
                        },
                        error: function(){

                        }
                    })
                })
            })

        </script>
    @endsection
