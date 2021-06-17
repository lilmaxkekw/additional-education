@extends('layout_main')

@section('title', 'Курсы')

@section('content')

    <main>
        <section class="text-gray-600 body-font mb-20">
            <div class="text-center mt-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Список курсов</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s px-10">
                На этой странице вы можете ознакомится со всеми доступными на данный момент курсами</p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
            </div>
            <div class="container xl:px-40 px-5 pt-8 mx-auto">
                <div class="flex flex-wrap -m-4">

                    @foreach($courses as $course)
                        <div class="lg:w-1/2 w-full p-4">
                            <a href="{{ route('course.show', $course->id) }}">
                                <div class="border border-gray-200 p-6 rounded-lg text-left hover:bg-blue-500 course-card transition-colors" style="background-image: url(https://synergy.ru/assets/upload/v5/faculties/emblem/grey/9168.svg);">
                                    <div class="max-w-xss">
                                        <h2 class="text-lg text-gray-900 font-medium title-font font-bold mb-2 ">{{ $course->name_of_course }}</h2>
                                        <p class="leading-relaxed mb-3">{{ $course->short_content }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </main>

@endsection
