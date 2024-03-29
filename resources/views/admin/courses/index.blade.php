@extends('layout')

@section('title', 'Список курсов')

@section('content')

    @if(session('success'))
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mb-5">
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

    <h1 class="text-4xl font-normal text-blue-600">Список курсов</h1>
    <h3 class="text font-normal text-grey-900 mt-5">В данном разделе Вы можете видеть все курсы, а также при нажатии на курс посмотреть более подробную информацию как о курсе, так и о его разделах.</h3>

    <div class="flex justify-between py-5">
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

    <div class="container">
        <a href="#modal" name="modal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить курс</a>
    </div>

    <!-- component -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 my-5">
        @foreach($courses as $course)
            <div class="flex flex-col bg-white p-4 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-2 align-middle">
                <a href="{{ route('courses.show', $course->id) }}" class="mx-auto">
                    <img src="{{ asset('test.png') }}" alt="Иконка курса" class="inline-block w-24 flex m-auto">
                    <h2 class="mt-4 font-normal text-xl text-center">{{ $course->name_of_course }}</h2>
                    <p class="text-xs text-gray-500 text-center mt-3 text-center">
                        {{ $course->short_content }}
                    </p>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Add course modal -->
    <div id="addCourseModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded-lg shadow-lg w-1/3">
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
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
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
                                          class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
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
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    @if($courses->isEmpty())
        @component('components.no_data_message')
        @endcomponent
    @endif

    <!-- Modal success -->
    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent

    <div class="flex flex-row">
        {{ $courses->links('vendor.pagination.custom') }}
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

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
                $('#modal').addClass('hidden')
                location.reload()
            })

            $('#btnSave').click(function(){
                let name_of_course = $('#name_of_course').val(),
                    description_of_course = $('#description_of_course').val(),
                    category = $('#categories option:selected').val()

                $.ajax({
                    url: '{{ route('courses.index') }}',
                    type: 'POST',
                    data: {
                        _token: $('#csrf').val(),
                        name_of_course: name_of_course,
                        description_of_course: description_of_course,
                        category_id: category
                    },
                    cache: false,
                    success: function(course){
                        var data = JSON.stringify(course)
                        if(data){
                            $('#addCourseModal').addClass('hidden')
                            $('#modal').removeClass('hidden')
                            $('.addText').text(`Курс "${name_of_course}" успешно добавлен!`)
                        }
                    },
                    error: function(data){
                        $('#name_of_course_error').addClass('hidden')
                        $('#description_of_course_error').addClass('hidden')
                        $('#name_of_course').removeClass('border border-red-400')
                        $('#description_of_course').removeClass('border border-red-400')

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
        })


    </script>

@endsection
