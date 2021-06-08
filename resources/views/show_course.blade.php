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
            </div>
        </section>
    </main>

    @component('components.modal', ['gif' => asset('gifs/send.json')])
    @endcomponent

    <div id="modal_error" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <!-- modal -->
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-center items-center">
                <lottie-player
                    src="{{ asset('gifs/success.json') }}"
                    style="width: 400px;"
                    autoplay
                    loop
                ></lottie-player>
            </div>
            <!-- modal body -->
            <div class="p-4">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6 flex justify-center">
                    <label class="block text-lg font-medium text-gray-700 addText text-center">
                    </label>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button name="ok" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">ОК</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
        $('.close-modal').click(function() {
            $('#write_modal').addClass('hidden')
        });
        $('.course_write').click(function() {
            @if(auth()->user())
                $('#write_modal').removeClass('hidden')
            @else
                window.location = '/login'
            @endif
        });

        $('button[name=ok]').click(function(){
            $('.modal').addClass('hidden')
        })

        $('#writeCourse').click(function(){

            $.ajax({
                url: '{{ route('user.enrollment')  }}',
                type: 'POST',
                data: {
                    _token: $('#csrf').val(),
                    course_id: '{{ $course->id }}'
                },
                success: function(data){
                    var res = data.responseJSON

                    if(res === 'error'){
                        $('#modal_error').removeClass('hidden')
                    }else{

                        $('.modal').removeClass('hidden')
                        $('.addText').text('Ваша заявка отправлена! Для просмотра статуса заявки перейдите в личный кабинет')
                    }

                }
            })

        })

    </script>
@endsection
