@extends('educator.layout.app')

@section('title-page')
    Страница изменения записей в журнале
@endsection

@section('content')
    <div class="grid min-h-screen place-items-center">
        <div class="w-11/12 p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12">
            <h1 class="text-xl font-semibold">Изменение информации о занятии.<span class="font-normal"> Заполните поля.</span></h1>
            <form class="mt-6" method="POST" action="{{ route('edit.report.card', $section->id_section) }}">
                @csrf
                @method('PATCH')
                <label for="date_section" class="block text-xs font-semibold text-gray-600 uppercase">Дата занятия</label>
                <input value="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}" type="date" name="date_section" placeholder="Выберите дату" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />

                <label for="number_hours" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Количество часов</label>
                <input value="{{ $section->number_hours }}" type="text" name="number_hours" placeholder="Количество часов на данную тему" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />

                <label for="name_section" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Название занятия</label>
                <input value="{{ $section->name_section }}" type="text" name="name_section" placeholder="Введите название занятия" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />

                <label for="description_section" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Описание занятия</label>
                <input value="{{ $section->description_section }}" type="text" name="description_section" placeholder="Введите описание занятия" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />

                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                    Сохранить
                </button>
            </form>
        </div>
    </div>
@endsection
