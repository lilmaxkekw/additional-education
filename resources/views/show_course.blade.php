@extends('layout_main')

@section('title', 'Курс')

@section('content')
    <main>
        <section class="text-gray-600 body-font bg-blue-500">
            <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">

            <div class="container mx-auto flex px-5 pt-12 md:flex-row flex-col items-center">
                <div class="flex flex-col text-center w-full text-white">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2">{{ $course->name_of_course }}</h1>
                    <h2 class="text-xs tracking-widest font-medium title-font mb-2 text-gray-300">{{ $course->category->name_of_category }}</h2>
                    <p class="lg:w-2/3 mx-auto leading-relaxed">{{ $course->description_of_course }}</p>
                    <div class="flex justify-center mt-10">
                        <button id="writeCourse" class="inline-flex text-gray-700 bg-white border-0 py-2 px-6 focus:outline-none rounded text-lg course_write">Записаться</button>
                    </div>
                </div>

                <iframe width="100%" height="500" src="https://www.youtube.com/embed/8LRR3duJw-I" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </section>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
            <path fill="#3b82f6" fill-opacity="1" d="M0,128L1440,64L1440,0L0,0Z"></path>
        </svg>

        <section class="text-gray-600 body-font">
            <div class="text-center mt-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Разделы курса</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                    Чему вы научитесь
                </p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
            </div>
            <div class="container px-5 pb-24 pt-16 mx-auto flex flex-wrap">
                <div class="flex flex-wrap w-full">

                    @if($course->partitions->isEmpty())
                        <img class="lg:w-1/2 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12"
                             src="{{ asset('steps_empty.svg') }}" alt="step">

                        <div class="lg:w-1/2 md:w-1/2 md:pr-6 md:p-10 flex items-center">
                            <div class="mx-auto text-4xl font-medium">На редактировании...</div>
                    @else
                        <img class="lg:w-1/2 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12"
                             src="{{ asset('steps.svg') }}" alt="step">

                        <div class="lg:w-1/2 md:w-1/2 md:pr-6 md:p-10">
                            @foreach($course->partitions as $partition)
                                <div class="flex relative pb-12">
                                    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                        <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                    </div>
                                    <div
                                        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">{{ $loop->iteration }}</div>
                                    <div class="flex-grow pl-4">
                                        <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">{{ $partition->name_section }}</h2>
                                        <p class="leading-relaxed">{{ $partition->description_section }}</p>
                                    </div>
                                </div>
                            @endforeach
                    @endif

                    </div>
                    <div class="lg:w-1/2 md:w-2/3 mx-auto mt-20">
                        <div class="flex flex-wrap -m-2">
                            <div class="p-2 w-full">
                                <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg course_write">Записаться</button>
                            </div>
                        </div>
                    </div>
                </div>
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

{{--        <div id="write_modal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">--}}
{{--            <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">--}}
{{--            <!-- modal -->--}}
{{--            <div class="bg-white rounded-lg shadow-lg w-1/3">--}}
{{--                <!-- modal header -->--}}
{{--                <div class="px-4 py-2 flex justify-between items-center">--}}
{{--                    <h2 class="">Запись на курс</h2>--}}
{{--                    <button class="text-black close-modal">--}}
{{--                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">--}}
{{--                            <path--}}
{{--                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"--}}
{{--                            ></path>--}}
{{--                        </svg>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <!-- modal body -->--}}
{{--                <div class="p-4">--}}
{{--                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">--}}
{{--                        <div class="grid grid-cols-3 gap-6">--}}
{{--                            <div class="col-span-3 sm:col-span-2">--}}
{{--                                <label for="birthday" class="block text-sm font-medium text-gray-700">--}}
{{--                                    Дата рождения--}}
{{--                                </label>--}}
{{--                                <div class="mt-1 flex rounded-md shadow-sm">--}}
{{--                                    <input type="date" name="birthday" id="birthday"--}}
{{--                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">--}}
{{--                                </div>--}}
{{--                                <span class="text-sm font-medium text-red-500" id="birthday_error"></span>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-3 sm:col-span-2">--}}
{{--                                <label for="place" class="block text-sm font-medium text-gray-700">--}}
{{--                                    Место жительства--}}
{{--                                </label>--}}
{{--                                <div class="mt-1 flex rounded-md shadow-sm">--}}
{{--                                    <input type="text" name="place" id="place"--}}
{{--                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">--}}
{{--                                </div>--}}
{{--                                <span class="text-sm font-medium text-red-500" id="place_error"></span>--}}
{{--                            </div>--}}
{{--                            <div class="col-span-3 sm:col-span-2">--}}
{{--                                <label for="insurance" class="block text-sm font-medium text-gray-700">--}}
{{--                                    ИНН--}}
{{--                                </label>--}}
{{--                                <div class="mt-1 flex rounded-md shadow-sm">--}}
{{--                                    <input type="text" name="insurance" id="insurance"--}}
{{--                                        class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">--}}
{{--                                </div>--}}
{{--                                <span class="text-sm font-medium text-red-500" id="insurance_error"></span>--}}
{{--                            </div>--}}
{{--                            <input type="hidden" name="course_id">--}}
{{--                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="flex justify-center items-center w-100 p-3">--}}
{{--                    <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Отправить</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    @endif

    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            let url = $(location).attr('href');
            $('input[name="course_id"]').val(url.substring(url.lastIndexOf('/') + 1));
        });
        $('.close-modal').click(function() {
            $('#write_modal').addClass('hidden');
        });
        $('.course_write').click(function() {
            @if(auth()->user())
                $('#write_modal').removeClass('hidden');
            @else
                window.location = '/login'
            @endif
        });

        $('#writeCourse').click(function(){

            $.ajax({
                url: '{{ route('user.enrollment')  }}',
                type: 'POST',
                data: {
                    _token: $('#csrf').val(),
                    course_id: '{{ $course->id }}'
                },
                success: function(){
                    $('#write_modal').addClass('hidden')
                    $('.modal').removeClass('hidden')

                }
            })

        })

    </script>
@endsection
