@extends('layout')

@section('title', 'Слушатели группы ' . $group->number_group)

@section('content')

    <h1 class="text-4xl font-normal text-blue-600 ml-4">Слушатели группы {{ $group->number_group }}</h1>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 mx-4">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600 text-center"></th>
                        <th class="py-2 px-3 text-blue-600 text-center">ФИО</th>
                        <th class="py-2 px-3 text-blue-600">Email</th>
                        <th class="py-2 px-3 text-blue-600">Номер телефона</th>
                        <th class="py-2 px-3 text-blue-600">Место проживания</th>
                        <th class="py-2 px-3 text-blue-600">Страховой номер</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($listeners as $listener)
                            <tr>
                                <td class="py-3 px-3 text-center">
                                    <img class="inline-block h-16 w-16 rounded-full float-left" @if(empty($listener->user->photo)) src="{{ asset('user.jpg') }}" @else src="{{ Storage::url($listener->user->photo) }}" @endif alt="">
                                </td>
                                <td class="py-3 px-3 text-center">
                                    <div class="text-md leading-5 text-blue-900 clear-none text-opacity-80"><span class="inline-block align-middle">{{ $listener->user->name }}</span></div>
                                </td>
                                <td class="py-3 px-3">
                                    <div class="text-blue-900 text-opacity-80">
                                        {{ $listener->user->email }}
                                    </div>
                                </td>
                                <td class="py-3 px-3">

                                    @if(! empty($listener->user->phone_number))

                                        <div class="text-blue-900 text-opacity-80">
                                            {{ $listener->user->phone_number }}
                                        </div>

                                        @else
                                            <span>-</span>
                                    @endif

                                </td>
                                <td class="py-3 px-3">

                                    @if(! empty($listener->user->place_of_residence))

                                        <div class="text-blue-900 text-opacity-80">
                                            {{ $listener->user->place_of_residence }}
                                        </div>

                                    @else
                                        <span>-</span>
                                    @endif

                                </td>
                                <td class="py-3 px-3">

                                    @if(! empty($listener->user->insurance_number))

                                        <div class="text-blue-900 text-opacity-80">
                                            {{ $listener->user->insurance_number }}
                                        </div>

                                    @else
                                        <span>-</span>
                                    @endif

                                </td>
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
