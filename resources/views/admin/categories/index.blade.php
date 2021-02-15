@extends('admin.layouts.app')

@section('title', 'Категории')

@section('content')

    @if(session('success'))
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mb-5 ml-4">
            <div class="alert-icon flex items-center bg-green-100 border-2 border-green-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-green-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-description text-sm text-green-600">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
            <div class="flex justify-between">
                <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                    <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                        <div class="flex">
                            <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
                    </div>
                </div>
            </div>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Название категории</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Действие</th>
                </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                <div class="text-sm leading-5 text-blue-900">{{ $category->name_of_category }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <a href="{{ route('categories.edit', $category->id) }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>
                                <a href="#modal" name="modal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none" title="Удалить"> <!-- class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none" -->
                                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                <div>
                    <p class="text-sm leading-5 text-blue-700">
                        Показано
                        <span class="font-medium">{{ $count }}</span>
                        записей из
                        <span class="font-medium">{{ $all }}</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $categories->links('vendor.pagination.custom') }}
    </div>

    <div id="modal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Подтверждение удаления</h2>
                <button class="text-black close-modal">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                        ></path>
                    </svg>
                </button>
            </div>
            <!-- modal body -->
            <div class="p-4">
                Вы действительно хотите удалить?
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="bg-red-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300">Удалить</button>
                </form>
            </div>
        </div>
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
