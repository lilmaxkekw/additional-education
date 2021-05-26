@extends('layout')

@section('title', 'Список новостей')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Новости</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все новости.</h3>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-700">Заголовок новости</th>
                        <th class="py-2 px-3 text-blue-700">Контент</th>
                        <th class="py-2 px-3 text-blue-700">Статус</th>
                        <th class="py-2 px-3 text-blue-700">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($news as $news_item)
                            <tr>
                                <td class="py-3 px-3">{{ $news_item->news_title }}</td>
                                <td class="py-3 px-3">{{ $news_item->content }}</td>
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

@endsection
