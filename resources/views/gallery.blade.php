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
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 lg:w-1/3 lg:mb-0 mb-4">Галерея</h1>
                <p class="lg:pl-6 lg:w-2/3 mx-auto leading-relaxed text-xl flex items-end">Курсы дополнительного образования в Политехническом колледже НовГУ</p>
            </div>

            <div class="flex flex-wrap md:-m-2 -m-1">

            @foreach($files as $file)

                @if($loop->index % 3 == 0)
                    <div class="flex flex-wrap w-1/2">
                @endif

                @if($loop->index % 3 == 2)
                    <div class="md:p-2 p-1 w-full">
                        <a data-fancybox="gallery" href="{{ asset("img/" . $file->getRelativePathname()) }}">
                            <img alt="gallery" class="w-full object-cover h-full object-center block" src="{{ asset("img/" . $file->getRelativePathname()) }}">
                        </a>
                    </div>
                @else
                    <div class="md:p-2 p-1 w-1/2">
                        <a data-fancybox="gallery" href="{{ asset("img/" . $file->getRelativePathname()) }}">
                            <img alt="gallery" class="w-full h-full object-cover object-center block" src="{{ asset("img/" . $file->getRelativePathname()) }}">
                        </a>
                    </div>
                @endif

                @if($loop->index % 3 == 2)
                    </div>
                @endif

            @endforeach

            </div>

        </div>
    </section>

</main>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection