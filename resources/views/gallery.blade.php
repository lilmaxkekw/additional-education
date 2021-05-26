@extends('layout_main')

@section('title', 'Галерея')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <main>
        @php
          $files = File::allFiles(public_path('img'))
        @endphp
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex w-full mb-20 flex-wrap">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">Master Cleanse
                        Reliac Heirloom</h1>
                    <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon
                        brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them
                        man bun deep jianbing selfies heirloom.</p>
                </div>
                <div class="flex flex-wrap md:-m-2 -m-1">
                    @foreach($files as $file)
{{--                        @dd($files)--}}
                        @if($loop->count === 2)
                            <div class="md:p-2 p-1 w-full">
                                <a data-fancybox="gallery" href="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">
                                    <img src="{{ $file = public_path("public/img") }}">
                                </a>
                            </div>
                        @else
                            <div class="md:p-2 p-1 w-1/2">
                                <a data-fancybox="gallery" href="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">
                                    <img src="{{ $file->getPathname() }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
{{--                        <div class="flex flex-wrap w-1/2">--}}
{{--                            <div class="md:p-2 p-1 w-1/2">--}}
{{--                                <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                     src="https://dummyimage.com/500x300">--}}
{{--                            </div>--}}
{{--                            <div class="md:p-2 p-1 w-1/2">--}}
{{--                                <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                     src="https://dummyimage.com/501x301">--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    <div class="flex flex-wrap w-1/2">--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/500x300">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/501x301">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-full">--}}
{{--                            <a data-fancybox="gallery" href="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">--}}
{{--                                <img src="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-wrap w-1/2">--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/500x300">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/501x301">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-full">--}}
{{--                            <a data-fancybox="gallery" href="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">--}}
{{--                                <img src="https://evilarthas.com/wp-content/uploads/2020/01/Vidosiki-ot-Papsnaza-8-aya-podborka.jpg">--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-wrap w-1/2">--}}
{{--                        <div class="md:p-2 p-1 w-full">--}}
{{--                            <img alt="gallery" class="w-full h-full object-cover object-center block"--}}
{{--                                 src="https://dummyimage.com/601x361">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/502x302">--}}
{{--                        </div>--}}
{{--                        <div class="md:p-2 p-1 w-1/2">--}}
{{--                            <img alt="gallery" class="w-full object-cover h-full object-center block"--}}
{{--                                 src="https://dummyimage.com/503x303">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection
