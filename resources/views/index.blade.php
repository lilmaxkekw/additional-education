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
                    <a href="{{ route('courses') }}">
                        <button class="inline-flex text-gray-700 bg-white border-0 py-2 px-6 focus:outline-none rounded text-lg">Ознакомиться с курсами</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150">
        <path fill="#3b82f6" fill-opacity="1" d="M0,128L1440,64L1440,0L0,0Z"></path>
    </svg>

    <div class="flex flex-col text-center w-full mt-10">
        <h1 class="text-5xl font-medium title-font mb-4 text-gray-900 px-5">Информация о колледже</h1>
        <div class="flex mt-2 mb-6 justify-center">
            <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
        </div>
        <!-- <h2 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"></h2> -->
        <h2 class="sm:text-3xl text-2xl mb-4 text-gray-900 px-10 lg:px-40">Мы ведущий колледж региона, осуществляющий подготовку специалистов по программам дополнительного образования.</h2>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base mb-10 text-gray-900 px-10">
            Политехнический колледж НовГУ является одним из самых известных и престижных учебных заведений среднего профессионального образования Новгородской области. Современный учебный комплекс колледжа включает оснащенные по мировым стандартам учебные кабинеты, лаборатории, производственные мастерские, спортивный и актовый залы, столовую, общежитие, читальный зал, медпункт. Подготовку в колледже осуществляют высококвалифицированные преподаватели, большинство из которых имеют высшую квалификационную категорию, звания Почетный работник среднего профессионального образования РФ', Заслуженный учитель РФ, ученые степени кандидата и доктора наук. К преподаванию в колледже привлекаются профессорско-преподавательский состав НовГУ и специалисты крупнейших предприятий Новгородской области. Колледж готовит специалистов по 7 специальностям.</p>
    </div>

    <section class="text-gray-600 body-font">
        <div class="flex flex-col text-center w-full">
            <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Почему мы?</h1>
                <div class="flex mt-2 mb-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base px-10">
                    Мы, один из ведущих колледжей региона, осуществляющий подготовку специалистов по программам дополнительного образования</p>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base mb-10 px-10">Мы приглашаем на курсы по программам дополнительного образования граждан всех возрастов!</p>
                <h2 class="sm:text-3xl text-2xl mb-2 text-gray-900 px-5">Обучаясь у нас, вы:</h2>
        </div>
        <div class="container px-5 pt-12 pb-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap w-full">
                <div class="lg:w-1/2 md:w-1/2 md:pr-10 md:py-6">
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center text-white relative z-10 bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-7 sm:h-7 w-7 h-7">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Экономите время, так как проходите курсы без отрыва от основного вида деятельности, в вечернее время</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center text-white relative z-10 bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-7 sm:h-7 w-7 h-7">
                            <rect fill="none" height="24" width="24" />
                            <path d="M19,14V6c0-1.1-0.9-2-2-2H3C1.9,4,1,4.9,1,6v8c0,1.1,0.9,2,2,2h14C18.1,16,19,15.1,19,14z M17,14H3V6h14V14z M10,7 c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3S11.66,7,10,7z M23,7v11c0,1.1-0.9,2-2,2H4c0-1,0-0.9,0-2h17V7C22.1,7,22,7,23,7z" />
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Экономите деньги, ведь стоимость курса не фиксированная, а зависит от количества человек в группе</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center text-white relative z-10 bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-7 sm:h-7 w-7 h-7">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Получаете качественное образование, подтверждённое документом установленного образца</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center text-white relative z-10 bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-7 sm:h-7 w-7 h-7">
                            <path d="M14 6V4h-4v2h4zM4 8v11h16V8H4zm16-2c1.11 0 2 .89 2 2v11c0 1.11-.89 2-2 2H4c-1.11 0-2-.89-2-2l.01-11c0-1.11.88-2 1.99-2h4V4c0-1.11.89-2 2-2h4c1.11 0 2 .89 2 2v2h4z"/>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Получаете новую профессию или повышаете квалификацию, подтвержденные документом государственного образца</p>
                        </div>
                    </div>
                    <div class="flex relative">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full inline-flex items-center justify-center text-white relative z-10 bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-7 sm:h-7 w-7 h-7">
                            <path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Поимеете возможность пройти обучение в любом возрасте, в зависимости от потребностей и желаний.</p>
                        </div>
                    </div>
                </div>
                <img class="lg:w-1/2 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="{{ asset('coding.svg') }}" alt="step">
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="text-center mb-4">
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto px-10">Традиционно, с февраля по апрель проводятся курсы по предметам, на которых учащиеся 9 классов могут восполнить пробелы в знаниях по профильным предметам колледжа:</p>
            </div>
            <div class="flex flex-wrap lg:w-4/5 sm:mx-auto mb-4 -mx-2">
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Информатика</span>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Математика</span>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Физика</span>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Русский язык</span>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Английский язык</span>
                    </div>
                </div>
                <div class="p-2 sm:w-1/2 w-full">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                        <svg fill="none" stroke="#3b82f6" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                            <path d="M22 4L12 14.01l-3-3"></path>
                        </svg>
                        <span class="title-font font-medium">Цветоведение</span>
                    </div>
                </div>
            </div>
            <div class="text-center mb-20">
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">Объем программ - 24 часа</p>
                <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">Периодичность занятий 1 раз в неделю по 2 часа</p>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="flex flex-col text-center w-full mt-10">
            <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Документы</h1>
                <div class="flex mt-2 mb-6 justify-center">
                    <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                </div>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    Для поступающих на курсы необходимо:</p>
        </div>
        <div class="container px-5 pt-12 pb-24 mx-auto flex flex-wrap">
            <div class="flex flex-wrap w-full">
                <img class="lg:w-1/2 md:w-1/2 object-cover object-center rounded-lg md:mb-0 mb-12" src="{{ asset('docs.svg') }}" alt="step">
                <div class="lg:w-1/2 md:w-1/2 md:pr-6 md:p-10">
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">1</div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Заключить договор на оказание услуг (потребуются паспорт, СНИЛС и ИНН)</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">2</div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Написать личное заявление (установленного образца)</p>
                        </div>
                    </div>
                    <div class="flex relative pb-12">
                        <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
                            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
                        </div>
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">3</div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Предоставить оригинал или ксерокопию документа государственного образца об образовании</p>
                        </div>
                    </div>
                    <div class="flex relative">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10">4</div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Предоставить соответствующий документ в случае изменения фамилии, имени или отчества</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font">
        <div class="container px-5 pb-12 mx-auto">
            <div class="flex flex-wrap w-full mb-3 flex-col items-center text-center">
                <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Последние новости</h2>
            </div>
            <div class="flex mt-2 mb-8 justify-center">
                <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach($news as $news_item)
                <div class="p-4 lg:w-1/3">
                    <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-12 pb-12 rounded-lg overflow-hidden text-center relative">
                        <h2 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-1">{{ $news_item->news_title }}</h2>
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-3">{{ \Carbon\Carbon::parse($news_item->created_at)->format('d.m.Y') }}</h2>
                        <p class="leading-relaxed mb-3">{{ $news_item->short_content }}</p>
                        <a class="text-indigo-500 inline-flex items-center" href="{{ route('news_item.show', $news_item->id) }}">Читать далее
                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"></path>
                                <path d="M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font mb-6">
        <div class="container xl:px-40 px-5 py-6 mx-auto">
            <div class="flex flex-wrap w-full mb-3 flex-col items-center text-center">
                <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Последние курсы</h2>
            </div>
            <div class="flex mt-2 mb-8 justify-center">
                <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach($last_courses as $course)
                <div class="lg:w-1/2 w-full p-4">
                    <a href="{{ route('course.show', $course->id) }}">
                        <div class="border border-gray-200 p-6 rounded-lg text-left hover:bg-blue-500 course-card transition-colors" style="background-image: url(https://synergy.ru/assets/upload/v5/faculties/emblem/grey/9168.svg);">
                            <div class="max-w-xss">
                                <h2 class="text-lg text-gray-900 font-medium title-font font-bold mb-2 ">{{ $course->name_of_course }}</h2>
                                <p class="leading-relaxed mb-3">{{ strlen($course->description_of_course) > 30 ? substr($course->description_of_course, 30) . '...' : $course->description_of_course }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </section>

<!--     <section class="text-gray-600 body-font">
        <div class="flex flex-col text-center w-full mt-10">
            <h2 class="sm:text-3xl text-2xl font-medium title-font mb-2 mt-10 text-gray-900 px-5">Обучаясь у нас, вы:</h2>
        </div>
        <div class="container px-5 py-6 pb-12 mx-auto">
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-indigo-500 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-10 sm:h-10 w-10 h-10">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">Экономите время, так как проходите курсы без отрыва от основной работы, в вечернее время</p>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">Экономите деньги, ведь стоимость курса не фиксированная, а зависит от количества человек в группе</p>
                </div>
                <div class="sm:w-16 sm:order-none order-first sm:h-16 h-16 w-16 sm:ml-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-indigo-500 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-10 sm:h-10 w-10 h-10">
                        <g>
                            <rect fill="none" height="24" width="24" />
                            <path d="M19,14V6c0-1.1-0.9-2-2-2H3C1.9,4,1,4.9,1,6v8c0,1.1,0.9,2,2,2h14C18.1,16,19,15.1,19,14z M17,14H3V6h14V14z M10,7 c-1.66,0-3,1.34-3,3s1.34,3,3,3s3-1.34,3-3S11.66,7,10,7z M23,7v11c0,1.1-0.9,2-2,2H4c0-1,0-0.9,0-2h17V7C22.1,7,22,7,23,7z" />
                        </g>
                    </svg>
                </div>
            </div>
            <div class="flex items-center lg:w-3/5 mx-auto border-b pb-6 mb-6 border-gray-200 sm:flex-row flex-col">
                <div class="sm:w-16 sm:h-16 h-16 w-16 sm:mr-10 inline-flex items-center justify-center rounded-full bg-blue-100 text-indigo-500 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#3b82f6" class="sm:w-10 sm:h-10 w-10 h-10">
                        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z" />
                    </svg>
                </div>
                <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
                    <p class="leading-relaxed text-base">Получаете качественное образование, подтвержденное документом установленного образца</p>
                </div>
            </div>
        </div>
    </section> -->

</main>

@endsection