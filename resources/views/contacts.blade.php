@extends('layout_main')

@section('title', 'Контакты')

@section('content')

<main>
    <section class="mb-20">
        <div class="text-center mt-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Контакты</h1>
            <div class="flex mt-6 justify-center">
                <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
            </div>
        </div>
        <div class="relative flex items-top justify-center bg-white dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="w-full sm:px-6 lg:px-8">
                <div class="mt-8 overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-1">

                        <div class="p-6 sm:rounded-t" style="background-color: #F2F3F4;">

                            <div class="flex items-center mt-1 text-gray-600 dark:text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div class="ml-4 text-md tracking-wide font-semibold">
                                    173003, Великий Новгроод, ул. Большая Санкт-Петербургская, 46
                                </div>
                            </div>

                            <div class="flex items-center mt-5 text-gray-600 dark:text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div class="ml-4 text-md tracking-wide font-semibold">
                                    (8162) 97-42-18
                                </div>
                            </div>

                            <div class="flex items-center mt-5 text-gray-600 dark:text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="1.5" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div class="ml-4 text-md tracking-wide font-semibold">
                                    tehcol@novsu.ac.ru
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full rounded-b overflow-hidden sm:mr-10 flex items-end justify-start relative h-96">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2082.215481959615!2d31.26324431633834!3d58.54140398139009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46beebae07e23cd1%3A0xa9a6779ce68a49ca!2z0J_QotCaINCd0J7QktCT0KM!5e0!3m2!1sru!2sru!4v1621265987617!5m2!1sru!2sru"
                            width="100%" height="100%" style="border:0; background-color: rgba(243, 244, 246, var(--tw-bg-opacity));" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
