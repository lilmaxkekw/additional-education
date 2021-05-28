<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
          integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-blue-50">

@if($errors->any())
<div class="flex justify-center">
    <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300 mb-5 absolute items-center m-0">
        <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-red-500">
                    <svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </span>
        </div>
        <div class="alert-content ml-4">
            <div class="alert-title font-semibold text-lg text-red-800">
                Ошибка
            </div>
            @foreach($errors->all() as $error)
                <div class="alert-description text-sm text-red-600">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="hidden md:block w-1/2 bg-white py-10 px-10">
                    <img src="{{ asset('register.svg') }}" alt="">
                </div>
                <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
                    <div class="text-center mb-10">
                        <h1 class="font-bold text-3xl text-blue-500">Регистрация</h1>
                    </div>
                    <div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="name" class="text-xs font-semibold px-1">ФИО</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                    <input type="text" name="name"
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                           placeholder="Иванов Иван Иванович" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5">
                                <label for="" class="text-xs font-semibold px-1">Email</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                    <input type="email" name="email"
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                           placeholder="ivan@yandex.ru" value="{{ old('email') }}">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-3">
                                <label for="password" class="text-xs font-semibold px-1">Пароль</label>
                                <div class="flex">
                                    <div
                                        class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                        <i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                                    <input type="password" name="password"
                                           class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-blue-500"
                                           placeholder="************">
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-6">
                                <div class="flex inline-flex items-center mt-3">
                                    <input type="checkbox" name="approval" class="form-checkbox h-5 w-5 text-red-600">
                                    <label class="inline-flex items-center"> {{-- mt-3 --}}
                                        <span class="ml-2 text-gray-700">Подтверждаю согласие на
                                                <a name="personalData" class="text-blue-500 cursor-pointer">обработку персональных данных</a>
                                            </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full px-3 mb-5 flex justify-center">
                                <button
                                    class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">
                                    Зарегистрироваться
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('login') }}">Войти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="personalData" class="modal md:w-full fixed left-0 top-0 flex justify-center items-center hidden"
     style="background-color: rgba(240,248,255, 0.9);">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg w-1/3">
        <!-- modal header -->
        <div class="px-4 py-2 flex justify-end items-center">
            <button class="text-black close-modal">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path
                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                    ></path>
                </svg>
            </button>
        </div>
        <!-- modal body -->
        <div class="p-4 max-h-screen overflow-y-auto">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6 flex justify-center">
                <label class="block text-sm font-medium text-gray-700">
                    <span class="block text-center font-black text-lg">СОГЛАСИЕ</span><br>
                    <span class="block text-center font-black text-lg">на обработку персональных данных обучающегося  по программе дополнительного образования (профессионального обучения)</span><br>
                    <span>(в соответствии с ФЗ от 27 июля 2006 года № 152-ФЗ «О персональных данных»)</span><br>
                    <span class="block text-justify">
                        Даю согласие федеральному государственному бюджетному образовательному учреждению высшего образования «Новгородский государственный университет имени Ярослава Мудрого» (далее - НовГУ), расположенному по адресу: 173003, Россия, Великий Новгород, ул. Большая Санкт-Петербургская, 41 на обработку своих персональных данных.
                        <br>
                        Целью обработки персональных данных является обеспечение  образовательных и социальных отношений между обучающимся и НовГУ,  обеспечение соблюдения законов и иных нормативных правовых актов, передача персональных данных социальным, страховым, финансовым организациям с целью выполнения образовательных,  договорных, социальных, финансовых и иных обязательств НовГУ, связанных с обучением лица, давшего согласие. Оператор НовГУ может раскрыть правоохранительным органам и органам государственной власти любую информацию по официальному запросу в случаях, установленных законодательством в стране проживания слушателя.
                        <br>
                        Обработке Оператором НовГУ подлежат следующие персональные данные: <br>
                        а) фамилия, имя, отчество, дата рождения, пол, реквизиты документа удостоверяющего личность (паспортные данные), уровень образования и реквизиты документа об образовании, гражданство, место рождения, адрес регистрации, контактные телефоны, ИНН, номер страхового свидетельства ОПС, место учебы, место работы (наименование организации и подразделения, адрес организации, занимаемая должность, профессия), контактная информация (телефон, адрес электронной почты), наличие и уровень льгот, место жительства и место пребывания, форма обучения, номер группы, реквизиты диплома и иного документа об образовании, документа об обучении или документа о квалификации, текущая успеваемость, сведения об успеваемости, название выбранной программы дополнительного образования (профессионального обучения), информация, используемая в системах контроля и управления доступом на территории НовГУ, сведения, необходимые для обработки запросов органов исполнительной власти и подведомственных им организаций;
                        <br>
                        Под обработкой персональных данных подразумевается следующий перечень действий с персональными данными: сбор, систематизация, хранение, удаление и архивация персональных данных.
                        <br>
                        Обучающийся согласен, что обработку персональных данных осуществляют соответствующие структурные подразделения в соответствии с положениями о структурных подразделениях и работники НовГУ в соответствии с должностными обязанностями.
                        <br>
                        Данное согласие на обработку персональных данных действует в течение срока хранения личного дела.
                    </span>
                </label>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
        integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.alert').delay(10000).fadeOut(200)
    })

    $('a[name="personalData"]').click(function () {
        $('#personalData').removeClass('hidden')
    })

    $('.close-modal').click(function () {
        $('#personalData').addClass('hidden')
    })

</script>
</body>
</html>

