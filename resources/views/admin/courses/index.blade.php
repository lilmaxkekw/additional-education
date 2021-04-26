@extends('admin.layouts.app')

@section('title', 'Список курсов')

@section('content')

    <h1 class="px-4">Список курсов</h1>

    @if(session('success'))
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mb-5 ml-4">
            <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-green-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-description text-sm text-green-600">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="flex justify-between py-6 px-4">
        <div class="flex-1">
            <div class="flex-1 pr-4">
                <div class="relative md:w-1/3">
                    <input type="text"
                           class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                           placeholder="Поиск..." id="search" name="search">
                    <div class="absolute top-0 left-0 inline-flex items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                            <circle cx="10" cy="10" r="7" />
                            <line x1="21" y1="21" x2="15" y2="15" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container ml-4">
        <a href="#modal" name="modal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded-full ripple hover:bg-green-100 focus:outline-none">Добавить</a>
    </div>

    <div class="container mb-2 flex w-full items-center">
        <ul class="flex flex-col p-4">
            @foreach($courses as $course)
                <a href="{{ route('courses.show', $course->id) }}">
                    <li class="border-gray-400 flex flex-row mb-3">
                        <div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-sm border-2 p-6 hover:shadow-2xl border-blue-500">
                            <div class="flex-1 pl-1 mr-16">
                                <div class="font-medium">
                                    {{ $course->name_of_course }}
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>

    <!-- Add course modal -->
    <div id="addCourseModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление курса</h2>
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
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="description_of_course" class="block text-sm font-medium text-gray-700">
                                Описание курса
                            </label>
                            <div class="mt-1">
                                    <textarea id="description_of_course" name="description_of_course" rows="3"
                                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>

                        <div>
                            <label for="number_of_course" class="block text-sm font-medium text-gray-700">
                                Номер курса
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="number_of_course" id="number_of_course"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div class="col-span-4 sm:col-span-3">
                            <label for="categories" class="block text-sm font-medium text-gray-700">Категория курса</label>
                            <select id="categories" name="categories" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_of_category }}</option>
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

    <!-- Modal success -->
    @component('components.modal_success')
    @endcomponent

    <div class="flex flex-row ml-4">
        {{ $courses->links('vendor.pagination.custom') }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut(200)

            $('a[name=modal]').click(function(){
                $('#addCourseModal').removeClass('hidden')
            })

            $('.close-modal').click(function(){
                $('.modal').addClass('hidden')
            })

            $('button[name=ok]').click(function(e){
                e.preventDefault()
                $('#modalSuccess').addClass('hidden')
            })

            $('#btnSave').click(function(){
                let name_of_course = $('#name_of_course').val(),
                    description_of_course = $('#description_of_course').val(),
                    number_of_course = $('#number_of_course').val(),
                    category = $('#categories option:selected').val()

                $.ajax({
                    url: '{{ route('courses.index') }}',
                    type: 'POST',
                    data: {
                        _token: $('#csrf').val(),
                        name_of_course: name_of_course,
                        description_of_course: description_of_course,
                        number_of_course: number_of_course,
                        category_id: category
                    },
                    cache: false,
                    success: function(course){
                        var data = JSON.stringify(course)
                        if(data){
                            $('#addCourseModal').addClass('hidden')
                            $('#modalSuccess').removeClass('hidden')
                            $('.addText').text(`Курс "${name_of_course}" успешно добавлен!`)
                        }
                    }
                })
            })
        })


    </script>

@endsection
