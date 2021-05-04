@extends('admin.layouts.app')

@section('title', 'Список групп')

@section('content')

    <h1 class="text-4xl font-normal text-grey-900">Группы</h1>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addGroupModal" name="addGroupModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Добавить группу</a>
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
                <tr class="text-center">
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Номер группы</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Начало обучение</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Конец обучение</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Курс группы</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Подробнее</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Действия</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                @foreach($groups as $group)
                    <tr class="text-center">
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $group->number_group }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ \Carbon\Carbon::parse($group->start_date)->format('d.m.Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ \Carbon\Carbon::parse($group->end_date)->format('d.m.Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $group->course->name_of_course }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"><a href="{{ route('groups.show', $group->id) }}"><button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Слушатели группы</button></a></div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                            <a href="" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>
                            <a href="#deleteModal" data-id="{{ $group->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if(! $groups->isEmpty())
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-500">
                            Всего записей
                            <span class="font-medium">{{ $count }}</span>
                    </div>
                </div>

            @else
                @component('components.no_data_message') @endcomponent
            @endif
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $groups->links('vendor.pagination.custom') }}
    </div>

    <!-- Delete group modal -->
    <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
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
            <div class="flex justify-center items-center w-100 p-3">
                <button class="del inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none"">Удалить</button>
            </div>
        </div>
    </div>


    <div id="addGroupModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление группы</h2>
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
                            <label for="number_group" class="block text-sm font-medium text-gray-700">
                                Номер группы
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="number_group" id="number_group"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="number_group_error"></span>
                        </div>
                    </div>

                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Дата начала обучения</label>
                        <div class="mt-1">
                            <input type="date" name="start_date" id="start_date"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                    </div>

                    <div>
                        <label for="end_date" class="block text-sm font-medium text-gray-700">Дата окончания обучения</label>
                        <div class="mt-1">
                            <input type="date" name="end_date" id="end_date"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        <span class="text-sm font-medium text-red-500" id="end_date_error"></span>
                    </div>

                    <div class="col-span-4 sm:col-span-3">
                        <label for="courses" class="block text-sm font-medium text-gray-700">Курс</label>
                        <select id="courses" name="courses" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($courses as $id => $name_of_course)
                                <option value="{{ $id }}">{{ $name_of_course }}</option>
                            @endforeach
                        </select>
                    </div>
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
    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut(200)

            $('a[name=modal]').click(function(){
                $('#modal').removeClass('hidden')
            })

            $('a[name=addGroupModal]').click(function(){
                $('#addGroupModal').removeClass('hidden')
            })

            $('.close-modal').click(function(){
                $('.modal').addClass('hidden')
            })

            $('button[name=ok]').click(function(e){
                e.preventDefault()
                $('#modalSuccess').addClass('hidden')
                location.reload()
            })

            $('#btnSave').click(function(e){
                e.preventDefault()

                let number_group = $('#number_group').val(),
                    start_date = $('#start_date').val(),
                    end_date = $('#end_date').val(),
                    course = $('#courses option:selected').val()

                $.ajax({
                    url: '{{ route('groups.index') }}',
                    type: 'POST',
                    data: {
                        _token: $('#csrf').val(),
                        number_group: number_group,
                        start_date: start_date,
                        end_date: end_date,
                        course_id: course
                    },
                    cache: false,
                    success: function(res){
                        let data = JSON.stringify(res)

                        console.log(course)

                        if(data){
                            $('#addGroupModal').addClass('hidden')
                            $('#modalSuccess').removeClass('hidden')
                            $('.addText').text(`Группа "${number_group}" успешно добавлена!`)
                        }
                    },
                    // TODO
                    error: function(data){
                        $('#number_group_error').addClass('hidden')
                        $('#start_date_error').addClass('hidden')
                        $('#end_date_error').addClass('hidden')
                        $('#number_group').removeClass('border border-red-400')
                        $('#start_date').removeClass('border border-red-400')
                        $('#end_date').removeClass('border border-red-400')

                        var errors = data.responseJSON

                        if($.isEmptyObject(errors) === false){
                            $.each(errors.errors, function(key, value){
                                var error_id = '#' + key + '_error'
                                var error_id2 = '#' + key
                                $(error_id).removeClass('hidden')
                                $(error_id2).addClass('border border-red-400')
                                $(error_id).text(value)
                            })
                        }
                    }
                })
            })

            $('a[name=deleteModal]').click(function(){
                var id = $(this).data('id')

                $('#deleteModal').removeClass('hidden')

                $('.del').click(function(){
                    $.ajax({
                        url: '/admin/groups/' + id,
                        type: 'DELETE',
                        data: {
                            _token: $('#csrf').val()
                        },
                        success: function(res){
                            let data = JSON.stringify(res)
                            if(data){
                                $('#deleteModal').addClass('hidden')
                                $(this).closest("tr").remove();
                                location.reload()
                            }
                        }
                    })
                })

            })
        })
    </script>

@endsection
