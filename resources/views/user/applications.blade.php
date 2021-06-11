@extends('layout')

@section('title', 'Мои заявки')

@section('content')

    @component('components.tabs')
    @endcomponent

    @if($applications->isEmpty())
        @component('components.no_data_message')
        @endcomponent

        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 my-5 cursor-default">
                @foreach($applications as $application)
                        <div class="flex flex-col items-center justify-center bg-white p-4 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-2">
                            <h2 class="mt-4 font-normal text-xl text-center">{{ $application->course->name_of_course }}</h2>
                            <p class="text-xs text-gray-500 text-center mt-3 text-justify">
                                @if($application->status_application === 0)
                                    <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                    <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                    <span class="relative text-xs align-middle">На рассмотрении</span>

                                    @else
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs align-middle">Одобрено</span>
                                @endif
                        </div>
                @endforeach
            </div>
    @endif

@endsection
