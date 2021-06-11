{{--@extends('admin.layouts.app')--}}
@extends('layout')

@section('title', 'Курс ' . $course->name_of_course)

@section('content')

    <div class="bg-white overflow-hidden sm:rounded-lg">
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
                        Категория
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $course->category->name_of_category }}
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Изображение
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <img src="{{ Storage::url('1ZjGhg6kVPsNOYpjrcgpRlrJJUFB9bfUfiGl4i2G.jpg') }}" alt="Фотография">
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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

    <!-- Partitions -->
    <h1 class="text-2xl font-normal text-grey-900 mt-5">Разделы</h1>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addPartitionModal" name="addPartitionModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить раздел</a>
        </div>
    </div>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600">Название раздела</th>
                        <th class="py-2 px-3 text-blue-600">Дата начала</th>
                        <th class="py-2 px-3 text-blue-600">Дата конца</th>
                        <th class="py-2 px-3 text-blue-600">Количество часов</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($course->partitions as $partition)
                            <tr>
                                <td class="py-3 px-3">{{ $partition->name }}</td>
                                <td class="py-3 px-3">
                                    @if($partition->date_start === null)
                                        <span>-</span>

                                        @else
                                            <span>{{ \Carbon\Carbon::parse($partition->date_start)->format('d.m.Y') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    @if($partition->date_end === null)
                                        <span>-</span>

                                    @else
                                        <span>{{ \Carbon\Carbon::parse($partition->date_end)->format('d.m.Y') }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3">
                                    @if($partition->number_hours === NULL)
                                        <span>-</span>

                                        @else
                                            <span>{{ $partition->number_hours }}</span>
                                    @endif
                                </td>
                                <td class="py-3 px-3 text-center">
{{--                                    <a href="#editPartitionModal" name="editPartitionModal" data-name="{{ $partition->name_section  }}" data-id="{{ $partition->id_section }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>--}}
                                    <a href="#deletePartitionModalModal" data-id="{{ $partition->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none ml-3">Удалить</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($course->partitions->isEmpty())
                    @component('components.no_data_message')
                    @endcomponent
                @endif
            </div>
        </div>

        <!-- Sections -->
        <h1 class="text-2xl font-normal text-grey-900 mt-5">Темы</h1>

        <div class="container mb-2">
            <div class="flex justify-end">
                <a href="#addSectionModal" name="addSectionModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить тему</a>
            </div>
        </div>

        <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full overflow-hidden">
                    <table class="min-w-full whitespace-no-wrap">
                        <thead class="text-left bg-blue-50">
                        <tr>
                            <th class="py-2 px-3 text-blue-600">Название темы</th>
                            <th class="py-2 px-3 text-blue-600">Описание темы</th>
                            <th class="py-2 px-3 text-blue-600">Раздел</th>
                            <th class="py-2 px-3 text-blue-600">Дата проведения</th>
                            <th class="py-2 px-3 text-blue-600 text-center">Действие</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                            @foreach($partitions as $partition)
                                @foreach($partition->sections as $section)
                                    <tr>
                                        <td class="py-3 px-3">{{ $section->name_section }}</td>
                                        <td class="py-3 px-3">{{ $section->description_section }}</td>
                                        <td class="py-3 px-3">{{ $section->partition->name }}</td>
                                        <td class="py-3 px-3">{{ \Carbon\Carbon::parse($section->date_section)->format('d.m.Y') }}</td>
                                        <td class="py-3 px-3 text-center">
{{--                                            <a href="#editSectionModal" name="editSectionModal" data-name="{{ $partition->name_section  }}" data-id="{{ $partition->id_section }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>--}}
                                            <a href="#deletePartitionModalModal" data-id="{{ $section->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none ml-3">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($course->partitions->isEmpty())
                    @component('components.no_data_message')
                    @endcomponent
                @endif
            </div>
        </div>

        <!-- Edit course modal -->
        <div id="editCourseModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</button>
                    </form>
                </div>
            </div>
         </div>

        <!-- Add partition modal -->
        <div id="addPartitionModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
            <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
            <!-- modal -->
            <div class="bg-white rounded-lg shadow-lg w-1/3">
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
                                <label for="partition_name" class="block text-sm font-medium text-gray-700">
                                    Название раздела
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="partition_name" id="partition_name"
                                           class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="name_section_error"></span>
                            </div>
                        </div>
                        <div>
                            <label for="date_start" class="block text-sm font-medium text-gray-700">Дата начала</label>
                            <div class="mt-1">
                                <input type="date" name="date_start" id="date_start"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                        </div>
                        <div>
                            <label for="date_end" class="block text-sm font-medium text-gray-700">Дата конца</label>
                            <div class="mt-1">
                                <input type="date" name="date_end" id="date_end"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                        </div>
                        <div>
                            <label for="number_hours" class="block text-sm font-medium text-gray-700">Кол-во часов</label>
                            <div class="mt-1">
                                <input type="text" name="number_hours" id="number_hours"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center w-100 p-3">
                    <button type="submit" id="btnPartitionSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
                </div>
            </div>
        </div>

        <!-- Add section modal -->
        <div id="addSectionModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
            <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
            <!-- modal -->
            <div class="bg-white rounded-lg shadow-lg w-1/3">
                <!-- modal header -->
                <div class="px-4 py-2 flex justify-between items-center">
                    <h2 class="">Добавление темы</h2>
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
                                    Название темы
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
                                Описание темы
                            </label>
                            <div class="mt-1">
                                        <textarea id="description_section" name="description_section" rows="3"
                                                  class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>
                            <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
                        </div>
                        <div>
                            <label for="date_section" class="block text-sm font-medium text-gray-700">Дата проведения</label>
                            <div class="mt-1">
                                <input type="date" name="date_section" id="date_section"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="start_date_error"></span>
                        </div>
                        <div class="col-span-4 sm:col-span-3">
                            <label for="partitions" class="block text-sm font-medium text-gray-700">Раздел</label>
                            <select id="partitions" name="partitions" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @foreach($partitions as $partition)
                                    <option value="{{ $partition->id }}">{{ $partition->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center w-100 p-3">
                    <button type="submit" id="btnSectionSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
                </div>
            </div>
        </div>

        <!-- Delete partition modal -->
        <div id="deletePartitionModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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

        <!-- Delete section modal -->
        <div id="deleteSectionModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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

        @component('components.modal', ['gif' => asset('gifs/success.json')])
        @endcomponent

        <script src="{{ asset('js/jquery.min.js') }}"></script>

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

                $('a[name=addPartitionModal]').click(function(){
                    $('#addPartitionModal').removeClass('hidden')
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

                        let name_section = $('#name_section').val(),
                            description_section = $('#description_section').val(),
                            date_section = $('#date_section').val(),
                            partition_id = $('#partitions :selected').val()

                        $.ajax({
                            url: '{{ route('sections.store') }}',
                            type: 'POST',
                            data: {
                                _token: $('#csrf').val(),
                                name_section: name_section,
                                description_section: description_section,
                                date_section: date_section,
                                partition_id: partition_id
                            },
                            success: function(data){
                                let res = JSON.stringify(data)

                                if(res){
                                    $('#modal').removeClass('hidden')
                                    $('.addText').text(`Тема "${name_section}" успешно добавлена!`)
                                }
                            },
                            error: function(){

                            }
                        })
                    })

                    $('#btnPartitionSave').click(function(){

                        let name = $('#partition_name').val(),
                            date_start = $('#date_start').val(),
                            date_end = $('#date_end').val(),
                            number_hours = $('#number_hours').val()

                        $.ajax({
                            url: '{{ route('partitions.store') }}',
                            type: 'POST',
                            data: {
                                _token: $('#csrf').val(),
                                name: name,
                                date_start: date_start,
                                date_end: date_end,
                                number_hours: number_hours,
                                course_id: '{{ $course->id }}'
                            },
                            success: function(data){
                                let res = JSON.stringify(data)
                                console.log(data)
                                if(res){
                                    $('#modal').removeClass('hidden')
                                    $('.addText').text(`Раздел "${name}" успешно добавлена!`)
                                }
                            }
                        })

                    $('a[name="deletePartitionModal"]').click(function () {
                        let id = $(this).data('id')

                        $('#deletePartitionModal').removeClass('hidden')
                        $('.del').click(function(){
                            $.ajax({
                                url:  '/admin/partitions/' + id,
                                type: 'DELETE',
                                data: {
                                    _token: $('#csrf').val()
                                },
                                success: function (res) {
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

                    $('a[name="deleteSectionModal"]').click(function () {
                        let id = $(this).data('id')

                        $('#deleteSectionModal').removeClass('hidden')
                        $('.del').click(function(){
                            $.ajax({
                                url: '/admin/sections/' + id,
                                type: 'DELETE',
                                data: {
                                    _token: $('#csrf').val()
                                },
                                success: function (res) {
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

            })
        </script>

    @endsection
