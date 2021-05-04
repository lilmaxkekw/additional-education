@extends('admin.layouts.app')

@section('title', 'Заявки')

@section('content')

    <h1 class="text-4xl font-normal text-grey-900">Заявки</h1>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#formGroupModal" name="formGroupModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Сформировать группу</a>
        </div>
    </div>

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
            <div class="flex justify-between">
                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                        <div class="flex">
                            <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <input type="text" id="search-listener" onkeyup="tableSearch();" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full" id="datatable-example">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider"></th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">ФИО</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Выбранный курс</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Номер телефона</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">День рождения</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Место проживания</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Страховой номер</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Статус заявки</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($applications as $application)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="flex items-center">
                                    <input type="checkbox" name="" data-id="{{ $application->user->id }}" class="form-checkbox h-5 w-5 text-red-600">
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{ $application->user->name }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ $application->course->name_of_course}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ $application->user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ $application->phone_number }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ \Carbon\Carbon::parse($application->birthday)->format('d.m.Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ $application->place_of_residence }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                {{ $application->insurance_number }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
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
            @if(! $applications->isEmpty())
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-500">
                            Всего записей
                            <span class="font-medium">{{ $count }}</span>
                        </p>
                    </div>
                </div>

                @else
                    @component('components.no_data_message') @endcomponent
            @endif
        </div>
    </div>

    <div id="formGroupModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
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
                    <label for="groups" class="block text-sm font-medium text-gray-700">Категория курса</label>
                    <select id="groups" name="groups" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->number_group }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Modal success -->
    @component('components.modal_success')
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
                            $('#modalSuccess').removeClass('hidden')
                            $('.addText').text(`успешно добавлена!`)
                        }
                    }
                })
            })
        })

    </script>
@endsection
