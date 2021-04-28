@extends('educator.layout.app')

@section('title-page')
    Страница успеваемости слушателей
@endsection

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/report-card.js') }}"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/dates.js') }}"></script>
    <script src="{{ asset('js/excel.js') }}"></script>
    <script src="{{ asset('js/search.js') }}"></script>
@endpush

@section('content')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="antialiased sans-serif bg-gray-200 h-screen">

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

        <div class="container mx-auto py-6 px-4">
            <h1 class="text-3xl py-4 border-b">Журнал успеваемости</h1>
            <h1 class="text-2xl py-4 border-b mb-10">Курс группы: </h1>

            <div class="flex justify-between">
                <div class="flex-1">
                    <div class="flex-1 pr-4">
                        <div class="relative md:w-1/3">
                            <input type="text"
                                   class="w-full pl-10 pr-4 py-2 rounded-lg shadow focus:outline-none focus:shadow-outline text-gray-600 font-medium"
                                   placeholder="Поиск..." id="search-listener" onkeyup="tableSearch();">
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <p><iframe id="txtArea1" style="display:none"></iframe></p>
                    <button id="btnExport" onclick="fnExcelReport();" class="text-white bg-blue-500 hover:bg-blue-400 p-4 rounded font-bold"> EXPORT </button>
                </div>
            </div>

            {{--Список групп--}}
            <div class="bg-white mt-3 overflow-x-scroll">
                <nav class="flex flex-col sm:flex-row">
                    @foreach($groups as $group)
                        <a href="{{ route('report.card', $group->id) }}">
                            <button data-group="{{ $group->id }}" class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none btn-group @if($group->id == $group_id) text-blue-500 border-b-2 font-medium border-blue-500 @endif">
                                {{ $group->number_group }}
                            </button>
                        </a>
                    @endforeach
                </nav>
            </div>
            <form>
                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="height: 405px;">

                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative overflow-x-auto" id="datatable-example">
                        <thead>
                        <tr class="text-center">
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">#</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Фамилия</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Имя</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Отчество</span></th>

                            @foreach($sections as $section)
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100">
                                    <span class="text-gray-700 px-6 flex justify-center">{{ $section->name_section }}</span>
                                    <input type="date" class="edit-date shadow appearance-none border rounded py-1 px-3 text-grey-darker text-center" style="width: 160px;" value="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}" id-section="{{ $section->id_section }}">
                                </th>
                            @endforeach

                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">ИТОГО</span></th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($listeners as $listener)
                            <tr class="text-center">
                                <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $listener->id_listener }}</span></td>
                                <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $listener->last_name }}</span></td>
                                <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $listener->first_name }}</span></td>
                                <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $listener->patronymic }}</span></td>

                                @foreach($sections as $section)
                                    @foreach($marks as $mark)
                                        @if ($section->id_section == $mark->id_section)
                                            @if($mark->id_listener == $listener->id_listener)
                                                <td class="border-dashed border-t border-gray-200">
                                                    <select name="marks[]" style="width: 100px;" class="select">
                                                        @foreach($possible_marks as $possible_mark => $value)
                                                            <option value="{{ $possible_mark . '|' . $mark->id }}"
                                                                    @if($possible_mark == $mark->mark) selected @endif>{{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                            </tr>
                        @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="second-part mt-14">
                    <h2 class="text-center text-3xl py-4 border-b mb-10">Вторая часть журнала</h2>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative mt-14" style="height: 405px;">

                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                        <thead>
                        <tr class="text-center">
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">#</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Дата</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Кол-во часов</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Тема</span></th>
                        </tr>
                        </thead>

                        <tbody>


                        </tbody>

                    </table>

                </div>

            </form>

        </div>
    </div>

@endsection
