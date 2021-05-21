@extends('layout')

@section('title', 'Список новостей')

@section('content')

    {{-- text-grey-900 --}}
    <h1 class="text-4xl font-normal text-blue-600">Новости</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все новости.</h3>

    @foreach($news as $news_item)
        <p>{{ $news_item->news_title }}</p>
        <p>{{ $news_item->content }}</p>
    @endforeach

@endsection
