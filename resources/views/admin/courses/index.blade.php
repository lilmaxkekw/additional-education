@extends('admin.layouts.app')

@section('title', 'Список курсов')

@section('content')

    @if(session('success'))
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mb-5 ml-4">
            <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-green-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-description text-sm text-green-600">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="container ml-4">
        <a href="{{ route('courses.create') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-green-500 uppercase transition bg-transparent border-2 border-green-500 rounded-full ripple hover:bg-green-100 focus:outline-none">Добавить</a>
    </div>

    <div class="container mb-2 flex w-full items-center">
        <ul class="flex flex-col p-4">
            @foreach($courses as $course)
                <a href="{{ route('courses.show', $course->id) }}">
                    <li class="border-gray-400 flex flex-row mb-3">
                        <div class="select-none flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-2 rounded-sm border-2 p-6 hover:shadow-2xl border-purple-900">
                            <div class="flex-1 pl-1 mr-16">
                                <div class="font-medium">
                                    {{ $course->name_of_course }}
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>

    <div class="flex flex-row ml-4">
        {{ $courses->links('vendor.pagination.custom') }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut(200)
        })
    </script>

@endsection
