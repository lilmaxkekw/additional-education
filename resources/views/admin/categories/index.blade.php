@extends('layout')

@section('title', 'Категории')

@section('content')
        <!-- TODO -->
{{--    @if(session('success'))--}}
        <div class="alert flex flex-row items-center bg-green-200 p-5 rounded border-b-2 border-green-300 mb-5 hidden">
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
{{--                    {{ session('success') }}--}}
                </div>
            </div>
        </div>
{{--    @endif--}}


    <h1 class="text-4xl font-normal text-grey-900">Категории</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все категории, а также добавить новую категорию.</h3>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addCategoryModal" name="addCategory" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Добавить категорию</a>
        </div>
    </div>

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
                        <input type="text" id="search-listener" onkeyup="tableSearch();" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search" onkeyup="tableSearch()">
                    </div>
                </div>
            </div>
        </div>
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <table class="min-w-full" id="datatable-example">   <!-- id="table" -->
                <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Название категории</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Дата создания</th>
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
                                <div class="text-sm leading-5 text-blue-900">{{ \Carbon\Carbon::parse($category->created_at)->format('d.m.Y') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-center">
                                <a href="#editModal" name="editModal" data-name="{{ $category->name_of_category }}" data-id="{{ $category->id }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>
{{--                                <button type="button"  data-name="{{ $category->name_of_category }}" data-id="{{ $category->id }}" class="edit-btn inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-full ripple hover:bg-yellow-100 focus:outline-none">Редактировать</button>--}}
                                <a href="#deleteModal" data-id="{{ $category->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if(! $categories->isEmpty())
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
                    <div>
                        <p class="text-sm leading-5 text-blue-500">
                            Всего записей
                            <span class="font-medium">{{ $count }}</span>
                        </p>
                    </div>
                </div>

                @else
                    @component('components.no_data_message') @endcomponent
            @endif
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $categories->links('vendor.pagination.custom') }}
    </div>

    <!-- Delete course modal -->
    <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <div class="md:w-1/3 sm:w-full rounded-lg shadow-lg bg-white my-3">
            <div class="flex justify-between border-b border-gray-100 px-5 py-4">
                <div>
                    <i class="fa fa-exclamation-triangle text-red-500"></i>
                    <span class="font-bold text-gray-700 text-lg">Подтверждение удаления</span>
                </div>
                <div>
                    <button class="text-black close-modal">
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="px-10 py-5 text-gray-600">
                Вы действительно хотите удалить?
            </div>
            <div class="px-5 py-4 flex justify-center">
                <button class="del inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-full ripple hover:bg-red-100 focus:outline-none">Удалить</button>
            </div>
        </div>
    </div>

    <!-- Add category modal -->
    <div id="addCategoryModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Добавление категории</h2>
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
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="name_of_category" class="block text-sm font-medium text-gray-700">
                                Название категории
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name_of_category" id="name_of_category"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="name_of_category_error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Edit modal category -->
    <div id="editCategoryModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3">
            <!-- modal header -->
            <div class="px-4 py-2 flex justify-between items-center">
                <h2 class="">Редактирование категории</h2>
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

                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Название категории
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name_of_category" id="name"
                                       class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" value="">
                            </div>
                            <span class="text-sm font-medium text-red-500" id="name_of_category_error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-100 p-3">
                <button type="submit" id="save" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Modal success -->
    @component('components.modal', ['gif' => asset('gifs/success.json')])
    @endcomponent


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
            integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

        <script src="public/js/search.js"></script>
    <script>
        $(document).ready(function() {


            $('.close-modal').click(function () {
                $('.modal').addClass('hidden')
                // TODO
                location.reload()
            })

            $('a[name=addCategory]').click(function () {
                $('#addCategoryModal').removeClass('hidden')
            })

            $('a[name=editModal]').click(function () {
                $('#editCategoryModal').removeClass('hidden')
            })

            $('button[name=ok]').click(function (e) {
                e.preventDefault()
                $('#modal').addClass('hidden')
                location.reload()
            })

            // ajax
            $('#btnSave').click(function(){
                let name_of_category = $('#name_of_category').val()

                $.ajax({
                    url: '{{ route('categories.index') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: $('#csrf').val(),
                        name_of_category: name_of_category
                    },
                    cache: false,
                    success: function(category){
                        let data = JSON.stringify(category)
                        console.log(data)

                        if(data){
                            $('#addCategoryModal').addClass('hidden')
                            $('#modal').removeClass('hidden')
                            $('.addText').text(`Категория "${name_of_category}" успешно добавлена!`)
                        }
                    },
                    error: function(data){
                        $('#name_of_category_error').addClass('hidden')
                        var errors = data.responseJSON
                        if($.isEmptyObject(errors) === false){
                            $.each(errors.errors, function(key, value){
                                var error_id = '#' + key + '_error'
                                var error_id2 = '#' + key
                                $(error_id).removeClass('hidden')
                                $(error_id2).addClass('border border-red-400')
                                $(error_id).text(value)
                            })
                        }
                    }
                })
            })


            // TODO
            $('a[name=editModal]').click(function(){

                $('#editCategoryModal').removeClass('hidden')

                // var id = $('#id').val($(this).data('id'));
                 let id = $(this).data('id')


                $("#name").attr('value', $(this).data('name'))

                $('button[id="save"]').click(function(){

                    var name = $('#name').val()

                    $.ajax({
                        url: '/admin/categories/' + id,
                        type: 'PATCH',
                        data: {
                            _token: $('#csrf').val(),
                            id: id,
                            name_of_category: name
                        },
                        success: function(res){
                            let data = JSON.stringify(res)
                            if(data){
                                $('#editCategoryModal').addClass('hidden')
                                $('#modal').removeClass('hidden')
                                $('.addText').text(`Категория "${name}" успешно добавлена!`)
                            }
                        },
                        error: function(data){
                            // $('#name_of_category_error').addClass('hidden')
                            var errors = data.responseJSON
                            if($.isEmptyObject(errors) === false){
                                $.each(errors.errors, function(key, value){
                                    var error_id = '#' + key + '_error'
                                    // var error_id2 = '#' + key
                                    $(error_id).removeClass('hidden')
                                    // $(error_id2).addClass('border border-red-400')
                                    $(error_id).text(value)
                                })
                            }
                        }
                    })

                })

            })

            $('a[name="deleteModal"]').click(function () {
                var id = $(this).data('id')

                $('#deleteModal').removeClass('hidden')
                $('.del').click(function(){
                    $.ajax({
                        url: '/admin/categories/' + id,
                        type: 'DELETE',
                        data: {
                            _token: $('#csrf').val()
                        },
                        success: function (category) {
                            let data = JSON.stringify(category)
                            if(data){
                                $('#deleteModal').addClass('hidden')
                                $(this).closest("tr").remove();
                                location.reload()
                            }
                        }
                    })
                })
            })
        })

    </script>

@endsection
