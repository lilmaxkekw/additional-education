@extends('layout_main')

@section('title', 'Курс')

@section('content')
    <main>
        <section class="text-gray-600 body-font mb-20">
            <div class="text-center mt-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{ $news_item->news_title }}</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                    {{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y') }}
                </p>
                <div class="flex mt-2 justify-center mb-6">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                    {{ $news_item->content }}
                </p>
            </div>
        </section>

        <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
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
                    <p class="mb-8 leading-relaxed text-white">Copper mug try-hard pitchfork pour-over freegan heirloom neutra air
                        plant
                        cold-pressed tacos poke beard tote bag. Heirloom echo park mlkshk tote bag selvage hot chicken authentic
                        tumeric truffaut hexagon try-hard chambray.</p>
                    <div class="flex justify-center">
                        <button
                            class="inline-flex text-gray-700 bg-white border-0 py-2 px-6 focus:outline-none rounded text-lg">Button</button>
                    </div>
                </div>
            </div>
        </section> -->
    </main>

    @if(!empty(auth()->user()))

        <div id="modal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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
                                <label for="birthday" class="block text-sm font-medium text-gray-700">
                                    Дата рождения
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="date" name="birthday" id="birthday"
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="birthday_error"></span>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="place" class="block text-sm font-medium text-gray-700">
                                    Место жительства
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="place" id="place"
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="place_error"></span>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="insurance" class="block text-sm font-medium text-gray-700">
                                    ИНН
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="insurance" id="insurance"
                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                                <span class="text-sm font-medium text-red-500" id="insurance_error"></span>
                            </div>
                            <input type="hidden" name="course_id">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center w-100 p-3">
                    <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
                </div>
            </div>
        </div>

    @endif

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            let url = $(location).attr('href');
            $('input[name="course_id"]').val(url.substring(url.lastIndexOf('/') + 1));
        });
        $('.close-modal').click(function() {
            $('#modal').addClass('hidden');
        });
        $('#course_write').click(function() {
            @if(auth()->user())
                $('#modal').removeClass('hidden');
            @else
                window.location = '/login'
            @endif
        });
    </script>
@endsection
