@extends('admin.layouts.app')

@section('title', 'Список курсов')

@section('content')
    <div class="container">
    <a href="{{ route('courses.create') }}" class="mr-5 bg-green-400 hover:bg-green-500 text-white font-bold py-2 px-6 rounded-lg">Добавить</a>
    </div>

    <div class="container mt-5">
        @foreach($courses as $course)
            <a href="{{ route('courses.show', $course->id) }}">{{ $course->name_of_course }}</a><br>
        @endforeach
    </div>
@endsection
