@extends('layout')

@section('title', 'Список новостей')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Новости (на данный момент в разработке)</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все новости.</h3>

    <div class="container">
        <a href="#modal" name="modal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить новость</a>
    </div>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600">Заголовок новости</th>
                        <th class="py-2 px-3 text-blue-600">Контент</th>
                        <th class="py-2 px-3 text-blue-600">Статус</th>
                        <th class="py-2 px-3 text-blue-600">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($news as $news_item)
                            <tr>
                                <td class="py-3 px-3">{{ $news_item->news_title }}</td>
                                <td class="py-3 px-3">{{ $news_item->short_content }}</td>
                                <td class="py-3 px-3">
                                    <div class="flex items-center justify-center w-full mb-12">
                                        <label
                                            for="toogleA"
                                            class="flex items-center cursor-pointer"
                                        >
                                            <div class="relative">
                                                <input id="toogleA" type="checkbox" class="sr-only" />
                                                <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                            </div>
                                        </label>
                                    </div>
                                </td>
                                <td class="py-3 px-3">
                                    @if($news_item->news_status === 0)
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs align-middle">не опубликовано</span>

                                        @else
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative text-xs align-middle">опубликовано</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($news->isEmpty())
                @component('components.no_data_message')
                @endcomponent
            @endif
        </div>
    </div>

    <!-- Add news item  modal -->
    <div id="addNewsItemModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление новости</h2>
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
                            <label for="news_title" class="block text-sm font-medium text-gray-700">
                                Заголовок новости
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="news_title" id="news_title"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="name_of_course_error"></span>
                        </div>
                    </div>
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Контент
                        </label>
                        <div class="mt-1">
                                <textarea id="content" name="content" rows="3"
                                          class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <span class="text-sm font-medium text-red-500" id="description_of_course_error"></span>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function(){

        })
    </script>
@endsection
