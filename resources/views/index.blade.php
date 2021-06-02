@extends('layout_main')

@section('title', 'Главная')

@section('content')

<main>
    <section class="text-gray-600 body-font bg-blue-500">
        <div class="container mx-auto flex px-5 pt-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                <img class="object-cover object-center rounded-2xl" alt="hero" src="{{ asset('main_pic.jpg  ') }}">
            </div>
            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <!-- <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Мы ведущий колледж региона, осуществляющий подготовку специалистов по программам дополнительного образования.</h1>
                <p class="mb-2 leading-relaxed text-white">Обучаясь у нас, вы:</p>
                <div class="mb-6 leading-relaxed text-white">
                    <p>- экономите время, так как проходите курсы без отрыва от основной работы, в вечернее время</p>
                    <p>- экономите деньги, ведь стоимость курса не фиксированная, а зависит от количества человек в группе</p>
                    <p>- получаете качественное образование, подтвержденное документом установленного образца</p>
                </div> -->
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">Отделение дополнительного образования политехнического колледжа НовГУ</h1>
                <p class="mb-2 leading-relaxed text-white">Отделение дополнительного образования и профессиональной подготовки Политехнического колледжа НовГУ приглашает вас на обучение:</p>
                <div class="mb-6 leading-relaxed text-white">
                    <p>- курсы профессиональной подготовки</p>
                    <p>- курсы повышения квалификации и профессиональной переподготовки</p>
                    <p>- семинары и мастер-классы</p>
                </div>
                <div class="flex justify-center">
                    <button class="inline-flex text-gray-700 bg-white border-0 py-2 px-6 focus:outline-none rounded text-lg">Button</button>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
        <path fill="#3b82f6" fill-opacity="1" d="M0,128L1440,64L1440,0L0,0Z"></path>
    </svg>

    <div class="flex flex-col text-center w-full my-10">
        <h1 class="text-5xl font-medium title-font mb-4 text-gray-900">Информация о колледже</h1>
        <div class="flex mt-2 mb-6 justify-center">
            <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
        </div>
        <!-- <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"></h2> -->
        <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 px-5">Мы ведущий колледж региона, осуществляющий подготовку специалистов по программам дополнительного образования.</h2>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
            Политехнический колледж НовГУ является одним из самых известных и престижных учебных заведений среднего профессионального образования Новгородской области. Современный учебный комплекс колледжа включает оснащенные по мировым стандартам учебные кабинеты, лаборатории, производственные мастерские, спортивный и актовый залы, столовую, общежитие, читальный зал, медпункт. Подготовку в колледже осуществляют высококвалифицированные преподаватели, большинство из которых имеют высшую квалификационную категорию, звания Почетный работник среднего профессионального образования РФ', Заслуженный учитель РФ, ученые степени кандидата и доктора наук. К преподаванию в колледже привлекаются профессорско-преподавательский состав НовГУ и специалисты крупнейших предприятий Новгородской области. Колледж готовит специалистов по 7 специальностям:
        </p>
    </div>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 pb-12 mx-auto">
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">09.02.01 Компьютерные системы и комплексы</p>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">09.02.06 Сетевое и системное администрирование</p>
                </div>
                <div class="sm:w-16 sm:order-none order-first sm:h-16 h-16 w-16 sm:ml-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">09.02.07 Информационные системы и программирование</p>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">15.02.08 Технология машиностроения</p>
                </div>
                <div class="sm:w-16 sm:order-none order-first sm:h-16 h-16 w-16 sm:ml-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">15.02.14 Оснащение средствами автоматизации технологических процессов и производств (по отраслям)</p>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">23.02.07 Техническое обслуживание и ремонт двигателей, систем и агрегатов автомобилей</p>
                </div>
                <div class="sm:w-16 sm:order-none order-first sm:h-16 h-16 w-16 sm:ml-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <circle cx="6" cy="6" r="3"></circle>
                        <circle cx="6" cy="18" r="3"></circle>
                        <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                    </svg>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-10 sm:h-10 w-10 h-10" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">54.01.20 Графический дизайнер</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container xl:px-40 px-5 py-6 mx-auto">
            <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Список курсов</h2>
                <p class="mb-2 leading-relaxed text-gray-900">Обучаясь у нас, вы:</p>
                <div class="mb-6 leading-relaxed text-gray-900">
                    <p>- экономите время, так как проходите курсы без отрыва от основной работы, в вечернее время</p>
                    <p>- экономите деньги, ведь стоимость курса не фиксированная, а зависит от количества человек в группе</p>
                    <p>- получаете качественное образование, подтвержденное документом установленного образца</p>
                </div>
            </div>
            <div class="flex flex-wrap -m-4">

                @foreach($courses as $course)
                <div class="lg:w-1/2 w-full p-4">
                    <a href="{{ route('course.show', $course->id) }}">
                        <div class="hover:text-white border border-gray-200 p-6 rounded-lg text-left hover:bg-blue-500 hover:text-white course-card transition-colors" style="background-image: url(https://synergy.ru/assets/upload/v5/faculties/emblem/grey/9168.svg);">
                            <div class="max-w-xss">
                                <h2 class="text-lg text-gray-900 font-medium title-font font-bold mb-2 ">{{ $course->name_of_course }}</h2>
                                <p class="leading-relaxed mb-3">{{ strlen($course->description_of_course) > 30 ? substr($course->description_of_course, 30) . '...' : $course->description_of_course }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <button class="flex mx-auto mt-16 text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-500 rounded text-lg">Button</button>
        </div>
    </section>
</main>

@endsection