@extends('layout')

@section('title', 'Успеваемость')

@section('content')

    @component('components.tabs')
    @endcomponent

    <h1 class="text-4xl font-normal text-grey-900">Моя успеваемость</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе выводятся Ваши достижения, полученные на курсах</h3>

    @if($performance)
        @component('components.no_data_message')
        @endcomponent
    @endif

@endsection
