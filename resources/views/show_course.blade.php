@extends('layout_main')

@section('title', 'Курс')

@section('content')
    <main>
        <section class="text-gray-600 body-font bg-blue-500">
            <div class="container mx-auto flex px-5 pt-12 md:flex-row flex-col items-center">
                <div class="flex flex-col text-center w-full text-white">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2">{{ $course->name_of_course }}</h1>
                    <h2 class="text-xs tracking-widest font-medium title-font mb-2 text-gray-300">{{ $course->category->name_of_category }}</h2>
                    <p class="lg:w-2/3 mx-auto leading-relaxed">{{ $course->description_of_course }}</p>
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
            <div class="text-center mt-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Разделы курса</h1>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">Blue bottle crucifix vinyl
                    post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.
                </p>
                <div class="flex mt-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
            </div>
            <div class="container px-5 py-24 mx-auto flex flex-wrap">
                <div class="flex flex-wrap w-full">
                    <img class="lg:w-1/2 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12"
                         src="https://dummyimage.com/1200x500" alt="step">
                    @foreach($course->sections as $section)
                        <div class="lg:w-1/2 md:w-1/2 md:pr-6 md:p-10">
                            <div class="flex relative pb-12">
                                <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                                    <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                                </div>
                                <div
                                    class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">{{ $section->id }}</div>
                                <div class="flex-grow pl-4">
                                    <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">{{ $section->name_section }}</h2>
                                    <p class="leading-relaxed">{{ $section->description_section }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font relative">
            <div class="container px-5 pt-6 mx-auto">
                <div class="flex flex-col text-center w-full mb-12">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p>
                </div>
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <input type="text" id="name" name="name" placeholder="Имя" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                <input type="email" id="email" name="email" placeholder="Телефон" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
                        </div>
                    </div>
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
        </section>
    </main>
@endsection
