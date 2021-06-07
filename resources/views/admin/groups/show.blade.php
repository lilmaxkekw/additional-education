@extends('layout')

@section('title', 'Слушатели группы ' . $group->number_group)

@section('content')

{{--    <h1 class="text-4xl font-normal text-grey-900 mb-5">Слушатели группы {{ $group->number_group }}</h1>--}}
    <h1 class="text-4xl font-normal text-blue-600">Слушатели группы {{ $group->number_group }}</h1>

{{--    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">--}}
{{--        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">--}}
{{--            <div class="flex justify-between">--}}
{{--                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">--}}
{{--                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">--}}
{{--                        <div class="flex">--}}
{{--                            <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">--}}
{{--                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                </svg>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">--}}
{{--            <table class="min-w-full">--}}
{{--                <thead>--}}
{{--                <tr class="text-center">--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">ФИО</th>--}}
{{--                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Дата рождения</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody class="bg-white">--}}
{{--                    @foreach($listeners as $listener)--}}
{{--                        <tr class="text-center">--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                @if(empty($listener->id_listener))--}}
{{--                                    <span>-</span>--}}

{{--                                    @else--}}
{{--                                        <img class="inline-block h-12 w-12 rounded-full" @if(empty($listener->user->photo)) src="{{ asset('user.jpg') }}" @else src="{{ Storage::url($listener->user->photo) }}" @endif alt="">--}}
{{--                                        <div class="text-sm leading-5 text-blue-900">{{ $listener->user->name }}</div>--}}

{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">--}}
{{--                                <div class="text-sm leading-5 text-blue-900">{{ $listener->user->email }}</div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--            @if(! $listeners->isEmpty())--}}
{{--                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">--}}
{{--                    <div>--}}
{{--                        <p class="text-sm leading-5 text-blue-500">--}}
{{--                            Всего записей--}}
{{--                            <span class="font-medium">{{ $count }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            @else--}}
{{--                @component('components.no_data_message') @endcomponent--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 mx-4">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600 text-center">ФИО</th>
                        <th class="py-2 px-3 text-blue-600">Email</th>
                        <th class="py-2 px-3 text-blue-600">Email</th>
                        <th class="py-2 px-3 text-blue-600">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($listeners as $listener)
                            <tr>
                                <td class="py-3 px-3 text-center">
                                    <img class="inline-block h-16 w-16 rounded-full float-left" @if(empty($listener->user->photo)) src="{{ asset('user.jpg') }}" @else src="{{ Storage::url($listener->user->photo) }}" @endif alt="">
                                    <div class="text-md leading-5 text-blue-900 clear-none">{{ $listener->user->name }}</div>
                                </td>
                                <td class="py-3 px-3">{{ $listener->user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($listeners->isEmpty())
                @component('components.no_data_message')
                @endcomponent
            @endif
        </div>
    </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $listeners->links('vendor.pagination.custom') }}
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut(200)

            $('a[name=modal]').click(function(e){
                e.preventDefault()
                $('#modal').removeClass('hidden')
            })

            $('.close-modal').click(function(){
                $('.modal').addClass('hidden')
            })
        })
    </script>

@endsection
