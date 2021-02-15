@extends('educator.layout.app')

@section('title-page')
    Страница преподавателя
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account') }}">Личный кабинет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('report.card') }}">Журнал</a>
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
                    <div class="card-header">Журнал успеваемости</div>

                    <div class="card-body">

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Группа1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Группа2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Группа3</a>
                            </li>
                        </ul>

                        <table class="table table-striped table-hover">
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Last Name</td>
                            </tr>
                            <tr>
                                <td>#</td>
                                <td>Name</td>
                                <td>Last Name</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
