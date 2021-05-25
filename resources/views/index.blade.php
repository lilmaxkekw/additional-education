@extends('layout_main')

@section('title', 'Главная')

@section('content')

    <main>
        <section class="text-gray-600 body-font bg-blue-500">
            <div class="container mx-auto flex px-5 pt-24 md:flex-row flex-col items-center">
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
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
            <path fill="#3b82f6" fill-opacity="1" d="M0,128L1440,64L1440,0L0,0Z"></path>
        </svg>

        <div class="flex flex-col text-center w-full my-10">
            <h1 class="text-5xl font-medium title-font mb-4 text-gray-900">Об Университете</h1>
            <div class="flex mt-2 mb-6 justify-center">
                <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
            </div>
            <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Мы объединили многолетние академические
                традиции и современные образовательные технологии</h2>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Мы готовим профессионалов, обладающих набором
                практических знаний и навыков как для запуска и развития собственного бизнеса, так и для работы на
                управленческих должностях в крупных компаниях. Наша цель — сделать качественное образование доступным каждому.
            </p>
        </div>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-6 pb-12 mx-auto">
                <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                    <div
                        class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                    </div>
                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                        <p class="leading-relaxed text-base">Главный ориентир —
                            требования крупнейших
                            компаний-работодателей</p>
                    </div>
                </div>
                <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                        <p class="leading-relaxed text-base">Наши студенты учатся
                            у лучших, чтобы самим
                            стать лучшими</p>
                    </div>
                    <div
                        class="sm:w-16 sm:order-none order-first sm:h-16 h-16 w-16 sm:ml-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                            <circle cx="6" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                    </div>
                </div>
                <div class="flex items-center lg:w-3/5 mx-auto sm:flex-row flex-col">
                    <div
                        class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                    <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                        <p class="leading-relaxed text-base">Наши выпускники —
                            профессиональная элита
                            международного уровня</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="text-gray-600 body-font">
            <div class="container px-5 py-6 mx-auto">
                <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy
                    </h1>
                    <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn
                        asymmetrical gentrify, subway tile poke farm-to-table.</p>
                </div>
                <div class="flex flex-wrap -m-4">

                    @foreach($courses as $course)
                        <div class="xl:w-1/3 md:w-1/2 p-4">
                            <a href="{{ route('course.show', $course->id) }}">
                                <div
                                    class="hover:text-white border border-gray-200 p-6 rounded-lg text-center hover:bg-blue-500 hover:text-white course-card transition-colors"
                                    style="background-image: url(https://www.nesabamedia.com/wp-content/uploads/2018/07/cara-membuat-tabel-di-excel-1280x720.jpg); background-size: cover; background-position: center;">
                                    <h2 class="text-lg text-gray-900 font-medium title-font font-bold mb-2 " >{{ $course->name_of_course }}</h2>
                                    <p class="leading-relaxed text-base">Fingerstache flexitarian street art 8-bit waist co, subway tile
                                        poke
                                        farm.</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button
                    class="flex mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg">Button</button>
            </div>
        </section>
    </main>

@endsection
