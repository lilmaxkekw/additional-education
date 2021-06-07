@extends('layout')

@section('title', 'Список групп')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Группы</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все группы дополнительного образования, а также всех слушателей данных групп.</h3>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addGroupModal" name="addGroupModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить группу</a>
        </div>
    </div>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 mr-4">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600">Название группы</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Курс</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Дата начала обучения</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Дата окончания обучения</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Количество слушателей</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Статус группы</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Подробнее</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($groups as $group)
                            <tr>
                                <td class="py-3 px-3">{{ $group->number_group }}</td>
                                <td class="py-3 px-3 text-right">{{ $group->course->name_of_course }}</td>
                                <td class="py-3 px-3 text-center">{{ \Carbon\Carbon::parse($group->start_date)->format('d.m.Y')  }}</td>
                                <td class="py-3 px-3 text-center">{{ \Carbon\Carbon::parse($group->end_date)->format('d.m.Y') }}</td>
{{--                                TODO --}}
                                <td class="py-3 px-3 text-center">{{ \App\Models\Listener::where('group_id', $group->id)->count() }}</td>
                                <td class="py-3 px-3 text-right">
                                    @if(\Carbon\Carbon::parse($group->end_date) > \Carbon\Carbon::now())
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs align-middle">Обучение не завершено</span>

                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs align-middle">Обучение завершено</span>

                                    @endif
                                </td>
                                <td class="py-3 px-3 text-right">
                                    <a href="{{ route('groups.show', $group->id) }}">
                                        <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Слушатели группы</button>
                                    </a>
                                </td>
                                <td class="py-3 px-3 text-center">
    {{--                                <a href="#editGroupModal" name="editModal" data-id="{{ $group->id }}" data-num="{{ $group->number_group }}" data-start-date="{{ Carbon\Carbon::parse($group->start_date)->format('d.m.Y') }}" data-end-date="{{ Carbon\Carbon::parse($group->end_date)->format('d.m.Y') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>--}}
                                    <a href="#deleteModal" data-id="{{ $group->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none ml-4">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($groups->isEmpty())
                @component('components.no_data_message')
                @endcomponent
            @endif
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $groups->links('vendor.pagination.custom') }}
    </div>

    <!-- Delete course modal -->
    <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <div class="md:w-1/3 sm:w-full rounded-lg shadow-lg bg-white my-3">
            <div class="flex justify-between border-b border-gray-100 px-5 py-4">
                <div>
                    <i class="fa fa-exclamation-triangle text-red-500"></i>
                    <span class="font-bold text-gray-700 text-lg">Подтверждение удаления</span>
                </div>
                <div>
                    <button class="text-black close-modal">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="px-10 py-5 text-gray-600">
                Вы действительно хотите удалить?
            </div>
            <div class="px-5 py-4 flex justify-center">
                <button class="del inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</button>
            </div>
        </div>
    </div>

    <!-- Add group modal -->
    <div id="addGroupModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);" x-data="{ name_of_course: '', start_date: '' }">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded-lg shadow-lg w-1/3">
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

                    <div>
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Дата начала обучения</label>
                        <div class="mt-1">
                            <input type="date" name="start_date" id="start_date"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" x-model="start_date">
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
                        <select id="courses" name="courses" x-model="name_of_course" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($courses as $id => $name_of_course)
                                <option value="{{ $name_of_course }}" data-id="{{ $id }}">{{ $name_of_course }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="number_group" class="block text-sm font-medium text-gray-700">
                                Название группы
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="number_group" id="number_group"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" :value="name_of_course[0] + '-' + new Date(start_date).getFullYear().toString().substr(-2)">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="number_group_error"></span>
                        </div>
                    </div>
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
                $('#modal').addClass('hidden')
                location.reload()
            })

            $('#btnSave').click(function(e){
                e.preventDefault()

                let number_group = $('#number_group').val(),
                    start_date = $('#start_date').val(),
                    end_date = $('#end_date').val(),
                    course = $('#courses option:selected').attr('data-id')

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
                            $('#modal').removeClass('hidden')
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
