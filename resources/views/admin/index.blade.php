@extends('layout')

@section('title', 'Главная')

@section('content')

        <div class="p-4 w-full">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <a href="{{ route('applications.index') }}">
                        <div class="flex flex-row bg-white shadow-sm rounded-lg p-4">
                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="text-sm text-gray-500">Заявок в ожидании</div>
                                <div class="font-bold text-lg">{{ $new_applications }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <a href="{{ route('applications.index') }}">
                        <div class="flex flex-row bg-white shadow-sm rounded-lg p-4">
                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                <svg class="w-6 h-6" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M23 12L20.6 9.2L20.9 5.5L17.3 4.7L15.4 1.5L12 3L8.6 1.5L6.7 4.7L3.1 5.5L3.4 9.2L1 12L3.4 14.8L3.1 18.5L6.7 19.3L8.6 22.5L12 21L15.4 22.5L17.3 19.3L20.9 18.5L20.6 14.8L23 12M18.7 16.9L16 17.5L14.6 19.9L12 18.8L9.4 19.9L8 17.5L5.3 16.9L5.5 14.1L3.7 12L5.5 9.9L5.3 7.1L8 6.5L9.4 4.1L12 5.2L14.6 4.1L16 6.5L18.7 7.1L18.5 9.9L20.3 12L18.5 14.1L18.7 16.9M16.6 7.6L18 9L10 17L6 13L7.4 11.6L10 14.2L16.6 7.6Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="text-sm text-gray-500">Одобренные заявки</div>
                                <div class="font-bold text-lg">{{ $approved_applications }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <a href="{{ route('courses.index') }}">
                        <div class="flex flex-row bg-white shadow-sm rounded-lg p-4">
                            <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="text-sm text-gray-500">Количество курсов</div>
                                <div class="font-bold text-lg">{{ $count_courses }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 md:col-span-3">
                    <div class="flex flex-row bg-white shadow-sm rounded-lg p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Новых пользователей за сутки</div>
                            <div class="font-bold text-lg">{{ $new_users }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full bg-white my-5 rounded-lg">
            {!! $chart->container() !!}
            {!! $chart->script() !!}
        </div>

        <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 mx-4">
            <h2 class="text-xl text-blue-500 font-bold mb-4 lg:mb-6">Последние заявки за сутки</h2>
            <div class="overflow-x-auto">
                <div class="align-middle inline-block min-w-full overflow-hidden">
                    <table class="min-w-full">
                        <thead class="text-left bg-blue-50">
                        <tr>
                            <th class="py-2 px-3 text-blue-500">ФИО</th>
                            <th class="py-2 px-3 text-blue-500">Выбранный курс</th>
                            <th class="py-2 px-3 text-blue-500">Email</th>
                            <th class="py-2 px-3 text-blue-500">Номер телефона</th>
                            <th class="py-2 px-3 text-blue-500">День рождения</th>
                            <th class="py-2 px-3 text-blue-500">Место проживания</th>
                            <th class="py-2 px-3 text-blue-700">Страховой номер</th>
                            <th class="py-2 px-3 text-blue-700">Дата подачи заявки</th>
                            <th class="py-2 px-3 text-blue-700">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                            @foreach($last_applications as $application)
                                <tr>
                                    <td class="py-3 px-3">{{ $application->user->name }}</td>
                                    <td class="py-3 px-3">{{ $application->course->name_of_course }}</td>
                                    <td class="py-3 px-3">{{ $application->user->email }}</td>
                                    <td class="py-3 px-3">{{ $application->user->number_phone }}</td>
                                    <td class="py-3 px-3">{{ $application->birthday }}</td>
                                    <td class="py-3 px-3">{{ $application->place_of_residence }}</td>
                                    <td class="py-3 px-3">{{ $application->insurance_number }}</td>
                                    <td class="py-3 px-3">{{ \Carbon\Carbon::parse($application->created_at)->format('d.m.Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($last_applications->isEmpty())
                    @component('components.no_data_message')
                    @endcomponent
                @endif
            </div>
            <a href="{{ route('applications.index') }}" class="font-bold text-blue-600 inline-block mt-5 hover:underline">Все заявки</a>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

@endsection
