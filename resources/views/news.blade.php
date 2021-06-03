@extends('layout_main')

@section('title', 'Курсы')

@section('content')

    <main>
        <section class="text-gray-600 body-font">
            <div class="text-center mt-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Новости</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                    Новости отдела дополнительного образования
                </p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
            </div>
            <div class="container xl:px-40 px-5 pt-8 mx-auto">
                <div class="flex flex-wrap -m-4">

                    @foreach($news as $news_item)
                        <div class="lg:w-1/2 w-full p-4">
                            <a href="{{ route('news_item.show', $news_item->id) }}">
                                <div
                                    class="hover:text-white border border-gray-200 p-6 rounded-lg text-left hover:bg-blue-500 hover:text-white course-card transition-colors">
                                    <div class="max-w-xss">
                                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $news_item->news_title }}</h1>
                                        <p class="leading-relaxed mb-3">{{ $news_item->short_content }}</p>
                                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y') }}</h2>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
            <path fill="#3b82f6" fill-opacity="1" d="M0,115L1440,74L1440,170L0,170Z"></path>
        </svg>
        <section class="text-gray-600 body-font bg-blue-500">
            <div class="container mx-auto flex px-5 pr-24 pb-24 md:flex-row flex-col items-center">
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img class="object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
                </div>
                <div
                    class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Before they sold out
                        <br class="hidden lg:inline-block">readymade gluten
                    </h1>
                    <p class="mb-8 leading-relaxed text-white">Copper mug try-hard pitchfork pour-over freegan heirloom
                        neutra air
                        plant
                        cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken
                        authentic
                        tumeric truffaut hexagon try-hard chambray.</p>
                    <div class="flex justify-center">
                        <button
                            class="inline-flex text-gray-700 bg-white border-0 py-2 px-6 focus:outline-none rounded text-lg">
                            Button
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
