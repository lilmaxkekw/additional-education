{{--@extends('admin.layouts.app')--}}
@extends('layout')

@section('title', 'Курс ' . $course->name_of_course)

@section('content')

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Курс {{ $course->name_of_course }}
            </h3>

            <div class="container flex justify-end">
                <a href="{{ route('course.show', $course->id) }}" target="_blank" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none mr-2">Перейти на страницу курса</a>
                <a href="#modal" name="editModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none mr-2">Редактировать</a>
                <a href="#modal" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</a>
            </div>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                         Название курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $course->name_of_course }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Описание курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $course->description_of_course }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Номер курса
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $course->number_of_course }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Категория
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $course->category->name_of_category }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Изображение
                    </dt>
                    <!-- TODO -->
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <img src="{{ Storage::url('1ZjGhg6kVPsNOYpjrcgpRlrJJUFB9bfUfiGl4i2G.jpg') }}" alt="Фотография">
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Видео
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        @isset($course->video)
                            <video src=""></video>
                        @endisset
                        <span>-</span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <h1 class="text-2xl font-normal text-grey-900 mt-5">Разделы</h1>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addSectionModal" name="addSectionModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить раздел</a>
        </div>
    </div>

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
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
{{--                        <input type="text" id="search-listener" onkeyup="tableSearch();" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search" onkeyup="tableSearch()">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full" id="datatable-example">   <!-- id="table" -->
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Название раздела</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Описание раздела</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Кол-во часов</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Дата проведения</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($course->sections as $section)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{ $section->name_section }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <div class="text-sm leading-5 text-blue-900">{{ $section->description_section }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <div class="text-sm leading-5 text-blue-900">{{ $section->number_hours }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <div class="text-sm leading-5 text-blue-900">{{ Carbon\Carbon::parse($section->date_section)->format('d.m.Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <a href="#editSectionModal" name="editSectionModal" data-name="{{ $section->name_section  }}" data-id="{{ $section->id_section }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>
                                <a href="#deleteSectionModal" data-id="" name="deleteSectionModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(! $course->sections->isEmpty())
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

    <!-- Edit course modal -->
    <div id="editCourseModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Редактирование курса</h2>
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
                            <label for="name_of_course" class="block text-sm font-medium text-gray-700">
                                Название курса
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name_of_course" id="name_of_course"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ $course->name_of_course }}">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="name_of_course_error"></span>
                        </div>
                    </div>

                    <div>
                        <label for="description_of_course" class="block text-sm font-medium text-gray-700">
                            Описание курса
                        </label>
                        <div class="mt-1">
                                    <textarea id="description_of_course" name="description_of_course" rows="3"
                                              class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $course->description_of_course }}</textarea>
                        </div>
                        <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
                    </div>

                    <div>
                        <label for="number_of_course" class="block text-sm font-medium text-gray-700">
                            Номер курса
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="number_of_course" id="number_of_course"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ $course->number_of_course }}">
                        </div>
                        <span class="text-sm font-medium text-red-500" id="number_of_course_error"></span>
                    </div>
                    <div class="col-span-4 sm:col-span-3">
                        <label for="categories" class="block text-sm font-medium text-gray-700">Категория курса</label>
                        <select id="categories" name="categories" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($course->category->id === $category->id) selected @endif>{{ $category->name_of_category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            Изображение
                        </label>
                        <div
                            class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                     viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                           class="relative cursor-pointer bg-white rounded-md font-medium text-blue-500 hover:text-blue-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span class="justify-center">Загрузить файл</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Delete course modal -->
     <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
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
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</button>
                </form>
            </div>
        </div>
     </div>

    <!-- Add section modal -->
    <div id="addSectionModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление раздела</h2>
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
                            <label for="name_section" class="block text-sm font-medium text-gray-700">
                                Название раздела
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name_section" id="name_section"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="name_section_error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="description_section" class="block text-sm font-medium text-gray-700">
                            Описание раздела
                        </label>
                        <div class="mt-1">
                                <textarea id="description_section" name="description_section" rows="3"
                                          class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
                    </div>
                    <div>
                        <label for="number_hours" class="block text-sm font-medium text-gray-700">Кол-во часов</label>
                        <div class="mt-1">
                            <input type="text" name="number_hours" id="number_hours"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                    </div>
                    <div>
                        <label for="date_section" class="block text-sm font-medium text-gray-700">Дата проведения</label>
                        <div class="mt-1">
                            <input type="date" name="date_section" id="date_section"
                                   class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSectionSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('a[name=deleteModal]').click(function(){
                $('#deleteModal').removeClass('hidden')
            })

            $('.close-modal').click(function(){
                $('.modal').addClass('hidden')
            })

            $('a[name=editModal]').click(function(){
                $('#editCourseModal').removeClass('hidden')
            })

            $('a[name=addSectionModal]').click(function(){
                $('#addSectionModal').removeClass('hidden')
            })

            $('button[name=ok]').click(function(){
                $('#modal').addClass('hidden')
                location.reload()
            })

            $('#btnSave').click(function(){
                let name_of_course = $('#name_of_course').val(),
                    description_of_course = $('#description_of_course').val(),
                    number_of_course = $('#number_of_course').val(),
                    category = $('#categories option:selected').val()

                $.ajax({
                    url: '{{ URL('/admin/courses', $course->id) }}',
                    type: 'PATCH',
                    data: {
                        _token: $('#csrf').val(),
                        name_of_course: name_of_course,
                        description_of_course: description_of_course,
                        number_of_course: number_of_course,
                        category_id: category
                    },
                    cache: false,
                    success: function(response){
                        var response = JSON.parse(response)

                        if(response){
                            location.reload()
                        }
                    },
                    error: function(data){
                            $('#name_of_course_error').addClass('hidden')
                            $('#description_of_course_error').addClass('hidden')
                            $('#number_of_course_error').addClass('hidden')
                            $('#name_of_course').removeClass('border border-red-400')
                            $('#description_of_course').removeClass('border border-red-400')
                            $('#number_of_course').removeClass('border border-red-400')
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

                $('#btnSectionSave').click(function(){


                    $.ajax({
                        url: '{{ route('sections.store') }}',
                        type: 'POST',
                        data: {
                            _token: $('#csrf').val(),
                            number_hours: $('#number_hours').val(),
                            name_section: $('#name_section').val(),
                            description_section: $('#description_section').val(),
                            date_section: $('#date_section').val(),
                            course_id: '{{ $course->id }}'
                        },
                        success: function(data){
                            let res = JSON.stringify(data)

                            if(res){
                                $('#modal').removeClass('hidden')
                                $('.addText').text(`Раздел "${name}" успешно добавлена!`)
                            }
                        },
                        error: function(){

                        }
                    })
                })


        })
    </script>

@endsection
