@extends('admin.layouts.app')

@section('title', 'Курс ' . $course->name_of_course)

@section('content')

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex items-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Курс {{ $course->name_of_course }}
            </h3>

            <div class="container flex justify-end">
                <a href="{{ route('course.show', $course->id) }}" target="_blank" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none mr-2">Перейти на страницу курса</a>
                <a href="#modal" name="editModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none mr-2">Редактировать</a>
                <a href="#modal" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</a>
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
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ $course->name_of_course }}">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="description_of_course" class="block text-sm font-medium text-gray-700">
                            Описание курса
                        </label>
                        <div class="mt-1">
                                    <textarea id="description_of_course" name="description_of_course" rows="3"
                                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ $course->description_of_course }}</textarea>
                        </div>
                    </div>

                    <div>
                        <label for="number_of_course" class="block text-sm font-medium text-gray-700">
                            Номер курса
                        </label>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <input type="text" name="number_of_course" id="number_of_course"
                                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="{{ $course->number_of_course }}">
                        </div>
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
                                           class="relative cursor-pointer bg-white rounded-md font-medium text-blue-500 hover:text-blue-400 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
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
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded-full ripple hover:bg-green-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Delete course modal -->
    <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="text-red-500">Подтверждение удаления</h2>
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
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('a[name=deleteModal]').click(function(e){
                e.preventDefault()
                $('#deleteModal').removeClass('hidden')
            })

            $('.close-modal').click(function(){
                $('.modal').addClass('hidden')
            })

            $('a[name=editModal]').click(function(e){
                e.preventDefault()
                $('#editCourseModal').removeClass('hidden')
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

                        if(response.status_code === 200){
                            location.reload()
                        }
                    }
                })

            })

        })
    </script>

@endsection
