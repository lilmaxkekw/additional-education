@extends('educator.layout.app')

@section('title-page')
    Страница преподавателя
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('account') }}">Личный кабинет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.card') }}">Журнал</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Настройки</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Личный кабинет преподавателя</div>

                    <div class="card-body">
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="https://i1.wallbox.ru/wallpapers/main2/201717/ozero-les.jpg" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Название карточки</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
