@extends('layout')

@section('title', 'Успеваемость')

@section('content')

    @component('components.tabs')
    @endcomponent


    @if($performance)
        @component('components.no_data_message')
        @endcomponent
    @endif

@endsection
