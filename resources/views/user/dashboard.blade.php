@extends('layout')

@section('title', 'Личный кабинет')

@section('content')

    <div class="bg-white rounded-lg">
        <nav class="flex flex-col sm:flex-row">
            <a href="{{ route('user.applications') }}" class="uppercase text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none border-b-4 border-blue-500">Мои заявки</a>
            <a href="{{ route('user.performance') }}" class="uppercase text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none">Успеваемость</a>
        </nav>
    </div>

@endsection
