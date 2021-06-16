@extends('layout')

@section('title', 'Страница успеваемости слушателей')

@section('content')

    <div class="antialiased sans-serif h-screen">

        <div class="container mx-auto py-6 px-4">
            <h1 class="text-4xl font-normal text-blue-600 py-4">Журнал успеваемости</h1>
            <h1 class="text-2xl py-4" id="group-course">Курс группы: @if($course) <text class="font-normal text-blue-600">{{ $course->name_of_course }} </text>  @else <text class="font-normal text-blue-600"> Выберите группу</text> @endif</h1>

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

            {{--Список разделов группы--}}
            @if($partitions)
                <div class="bg-white overflow-x-scroll">
                    <nav class="flex flex-col sm:flex-row">

                        @foreach($groups as $group)
                            @foreach($partitions as $partition)
                                @if($group->course->id == $partition->course_id && $partition->status != 'Total')
                                    <a href="{{ route('report.card.partition', [$group->id, $partition->id]) }}">
                                        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none btn-group @if($partition->id == $selected_partition && $selected_partition) text-blue-500 border-b-2 font-medium border-blue-500 @endif">
                                            {{ $partition->name }}
                                        </button>
                                    </a>
                                @endif
                            @endforeach
                        @endforeach

                        {{-- Перемещение раздела ИТОГО в самый конец списка --}}
                        @foreach($groups as $group)
                            @foreach($partitions as $partition)
                                @if($group->course->id == $partition->course_id && $partition->status == 'Total')
                                    <a href="{{ route('report.card.partition', [$group->id, $partition->id]) }}">
                                        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none btn-group @if($partition->id == $selected_partition && $selected_partition) text-blue-500 border-b-2 font-medium border-blue-500 @endif">
                                            {{ $partition->name }}
                                        </button>
                                    </a>
                                @endif
                            @endforeach
                        @endforeach

                    </nav>
                </div>
            @endif
            <form>
                <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">

                <div class="overflow-x-scroll bg-white rounded-lg shadow overflow-y-auto relative" style="height: 405px;">

                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative overflow-x-scroll" id="datatable-example">
                        <thead class="text-center">
                        <tr>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center w-12">#</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center  w-12">ФИО</span></th>

                            @if($status_page != 'Total' && $total_marks)


                                @foreach($sections as $section)
                                    @if($section->status != 'Total')
                                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-80 break-all">
                                            <span class="text-gray-700 px-6 flex justify-center">{{ $section->name_section }}</span>
                                            <input type="date" class="edit-date shadow appearance-none border rounded py-1 px-3 text-grey-darker text-center" style="width: 170px;" value="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}" data-section="{{ $section->id_section }}">
                                        </th>
                                    @endif
                                @endforeach

                                {{-- Перемещение темы ИТОГО в самый конец списка --}}
                                @foreach($sections as $section)
                                    @if($section->status == 'Total')
                                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-80 break-all">
                                            <span class="text-gray-700 px-6 flex justify-center">{{ $section->name_section }}</span>
                                            <input type="date" class="edit-date shadow appearance-none border rounded py-1 px-3 text-grey-darker text-center" style="width: 170px;" value="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}" data-section="{{ $section->id_section }}">
                                        </th>
                                    @endif
                                @endforeach

                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Средний балл</span></th>
                            @endif

                            @if($status_page == 'Total')
                                @foreach($partitions as $partition)
                                    @if($partition->status != 'Total')
                                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-80 break-all">
                                            <span class="text-gray-700 px-6 flex justify-center w-44">{{ $partition->name }}</span>
                                        </th>
                                    @endif
                                @endforeach
                            @endif
                        </tr>
                        </thead>

                        <tbody>

                            @if(($listeners && $sections) || ($status_page == 'Total'))
                                @foreach($listeners as $listener)
                                    <tr class="text-center">
                                        <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $listener->id_listener }}</span></td>
                                        <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center w-80">{{ $listener->user->name }}</span></td>

                                        @if($status_page == 'Total')
                                            @foreach($headers_sections as $header_section)
                                                @foreach($total_marks as $total_mark)
                                                    @if($total_mark->section_id == $header_section->id_section && $total_mark->listener_id == $listener->id_listener)
                                                        <td class="border-dashed border-t border-gray-200">
                                                            <input type="text" class="partition-mark w-24 mt-3" value="{{ $total_mark->mark }}" readonly>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @else
                                            @foreach($sections as $section)
                                                @foreach($marks as $mark)
                                                    @if ($section->id_section == $mark->id_section)
                                                        @if($mark->id_listener == $listener->id_listener)
                                                            @if($section->status == 'Total')
                                                                <td class="border-dashed border-t border-gray-200 flex justify-center">
                                                                    <input type="text" id="partition-mark{{ $listener->id_listener }}" class="partition-mark w-24 mt-3"
                                                                           @if($mark->mark) value="{{ $mark->mark }} " @else data-check="false" @endif
                                                                           data-id="{{ $listener->id_listener }}" data-section="{{ $section->id_section }}">
                                                                </td>
                                                            @else
                                                                <td class="border-dashed border-t border-gray-200">
                                                                    <select style="width: 100px;" class="select">
                                                                        @foreach($possible_marks as $possible_mark => $value)
                                                                            <option value="{{ $possible_mark . '|' . $mark->id . '|' . $listener->id_listener }}"
                                                                                    @if($possible_mark == $mark->mark) selected @endif>{{ $value }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            <td class="border-dashed border-t border-gray-200">
                                                <input type="text" id="average-marks{{ $listener->id_listener }}" value="" class="average-marks" readonly>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    @if($group_id == 0 && !$listeners)
                        @component('components.no_data_message') @endcomponent
                    @endif

                </div>

                <div class="second-part mt-14">
                    <h2 class="text-center py-4 mb-10 font-normal text-blue-600 text-4xl">Вторая часть журнала</h2>
                </div>

                <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative mt-14" style="height: 405px;">

                    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                        <thead>
                        <tr class="text-center">
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">#</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Дата</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Тема</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Описание темы</span></th>
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 text-center"><span class="text-gray-700 px-6 py-3 flex items-center">Изменение</span></th>
                        </tr>
                        </thead>

                        <tbody>
                        @if($status_page != 'Total')
                            @foreach($sections as $section)
                                <tr>
                                    <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $section->id_section }}</span></td>
                                    <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ Carbon\Carbon::parse($section->date_section)->format('d.m.Y') }}</span></td>
                                    <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center">{{ $section->name_section }}</span></td>
                                    <td class="border-dashed border-t border-gray-200">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">
                                                <textarea cols="40" rows="3" readonly>{{ $section->description_section }}</textarea>
                                            </span>
                                    </td>
                                    <td class="border-dashed border-t border-gray-200">
                                        <button type="button" class="border rounded-full py-2 px-4 text-sm font-semibold text-gray-700 hover:bg-gray-50 edit-modal" onclick="openModal();"
                                                data-id="{{ $section->id_section }}"
                                                data-name="{{ $section->name_section }}" data-description="{{ $section->description_section }}"
                                                data-date="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}">Изменить</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>

                    </table>

                    @if($group_id == 0 && !$sections)
                        @component('components.no_data_message') @endcomponent
                    @endif

                </div>

            </form>

            <div class="third-part mt-14">
                <h2 class="text-center py-4 mb-10 font-normal text-blue-600 text-4xl">Посещаемость раздела</h2>
            </div>

            <div class="w-full h-99 bg-white">
                {!! $chart->container() !!}
                {!! $chart->script() !!}
            </div>

        </div>
    </div>

    @include('educator.include.modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datatable.js') }}"></script>
    <script src="{{ asset('js/editReportCard.js') }}"></script>
    <script src="{{ asset('js/reportCardModal.js') }}"></script>
    <script src="{{ asset('js/dates.js') }}"></script>
    <script src="{{ asset('js/excel.js') }}"></script>

@endsection
