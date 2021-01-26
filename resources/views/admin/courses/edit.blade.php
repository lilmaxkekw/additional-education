@extends('admin.layouts.app')

@section('title', 'Редактирование')

@section('content')
    <div class="container mt-5">
        <form action="{{ route('courses.update', $course->id) }}">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name_of_course" class="form-label">Название курсы</label>
                <input type="text" class="form-control" name="name_of_course" value="{{ $course->name_of_course }}">
            </div>
            <div class="mb-3">
                <label for="description_of_course" class="form-label">Описание курса</label>
                <textarea type="text" class="form-control" name="description_of_course">{{ $course->description_of_course }}</textarea>
            </div>
            <div class="mb-3">
                <label for="number_of_course" class="form-label">Номер курса</label>
                <input type="text" class="form-control" name="number_of_course" value="{{ $course->number_of_course }}">
            </div>
            {{--            <div class="mb-3">--}}
            {{--                <label for="category" class="form-label">Категория</label>--}}
            {{--                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">--}}

            {{--                    <option value="1">1</option>--}}
            {{--                </select>--}}
            {{--            </div>--}}
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
