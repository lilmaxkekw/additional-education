@extends('layout_main')

@section('title', 'Курсы')

@section('content')

    <main>
        <section class="text-gray-600 body-font">
            <div class="container px-5 pb-12 mx-auto">
                <div class="text-center my-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Новости</h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                        Новости отдела дополнительного образования
                    </p>
                    <div class="flex mt-6 justify-center">
                        <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                    </div>
                </div>
                <div class="flex flex-wrap -m-4">

                    @foreach($news as $news_item)
                        <div class="p-4 lg:w-1/3">
                            <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-12 pb-12 rounded-lg overflow-hidden text-center relative">
                                <h2 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-1">{{ $news_item->news_title }}</h2>
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-3">{{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y') }}</h2>
                                <p class="leading-relaxed mb-3">{{ $news_item->short_content }}</p>
                                <a class="text-indigo-500 inline-flex items-center" href="{{ route('news_item.show', $news_item->id) }}">Читать далее
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>

@endsection
