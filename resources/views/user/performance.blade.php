@extends('layout')

@section('title', 'Успеваемость')

@section('content')

    @component('components.tabs')
    @endcomponent


{{--    @if($performance)--}}
{{--        @component('components.no_data_message')--}}
{{--        @endcomponent--}}
{{--    @endif--}}


    @if(! $performance->isEmpty())
        <div class="bg-white overflow-x-scroll">
            <nav class="flex flex-col sm:flex-row">
                @foreach($partitions as $partition)
                    <a href="#">
                        <button class="text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none btn-group text-blue-500 border-b-2 font-medium border-blue-500">
                            {{ $partition->name }}
                        </button>
                    </a>
                @endforeach
            </nav>
        </div>
    @endif
    <form>
        <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative" style="height: 405px;">

            <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative overflow-x-auto" id="datatable-example">
                <thead class="text-center">
                <tr>
                    <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">ФИО</span></th>

                    @if($status_page != 'Total' && $total_marks)
                        @foreach($sections as $section)
                            <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-80 break-all">
                                <span class="text-gray-700 px-6 flex justify-center">{{ $section->name_section }}</span>
                                <input type="date" class="edit-date shadow appearance-none border rounded py-1 px-3 text-grey-darker text-center" readonly style="width: 170px;" value="{{ Carbon\Carbon::parse($section->date_section)->format('Y-m-d') }}" data-section="{{ $section->id_section }}">
                            </th>
                        @endforeach
                        <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100"><span class="text-gray-700 px-6 py-3 flex items-center">Средний балл</span></th>
                    @endif

                    @if($status_page == 'Total')
                        @foreach($partitions as $partition)
                            @if($partition->status != 'Total')
                                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 bg-gray-100 w-80 break-all">
                                    <span class="text-gray-700 px-6 flex justify-center">{{ $partition->name }}</span>
                                </th>
                            @endif
                        @endforeach
                    @endif
                </tr>
                </thead>

                <tbody>

                @if(($listener && $sections) || ($status_page == 'Total'))
                    <tr class="text-center">
                        <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-6 py-3 flex items-center w-80">{{ $listener->user->name }}</span></td>

                        @if($status_page == 'Total')
                            @foreach($headers_sections as $header_section)
                                @foreach($total_marks as $total_mark)
                                    @if($total_mark->section_id == $header_section->id_section)
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
{{--                                                    <select style="width: 100px;" class="select">--}}
{{--                                                        @foreach($possible_marks as $possible_mark => $value)--}}
{{--                                                            <option value="{{ $possible_mark . '|' . $mark->id . '|' . $listener->id_listener }}"--}}
{{--                                                                    @if($possible_mark == $mark->mark) selected @endif>{{ $value }}--}}
{{--                                                            </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
                                                    <input type="text" value="{{ $mark->mark }}">
                                                </td>
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
{{--                            <td class="border-dashed border-t border-gray-200">--}}
{{--                                <input type="text" id="average-marks{{ $listener->id_listener }}" value="" class="average-marks" readonly>--}}
{{--                            </td>--}}
                        @endif
                    </tr>
                @endif
                </tbody>
            </table>

{{--            @if($group_id == 0 && !$listeners)--}}
{{--                @component('components.no_data_message') @endcomponent--}}
{{--            @endif--}}

        </div>
@endsection
