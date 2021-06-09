@extends('layout')

@section('title', 'Категории')

@section('content')

    <h1 class="text-4xl font-normal text-blue-600">Виды курсов</h1>
    <h3 class="text font-normal text-grey-900 my-5">В данном разделе Вы можете видеть все виды курсов.</h3>

    <div class="container mb-2">
        <div class="flex justify-end">
            <a href="#addCategoryModal" name="addCategory" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Добавить категорию</a>
        </div>
    </div>

    <div class="bg-white rounded-lg px-4 lg:px-8 py-4 lg:py-6 mt-8 mr-4">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full overflow-hidden">
                <table class="min-w-full">
                    <thead class="text-left bg-blue-50">
                    <tr>
                        <th class="py-2 px-3 text-blue-600">Название категории</th>
                        <th class="py-2 px-3 text-blue-600 text-right">Дата создания</th>
                        <th class="py-2 px-3 text-blue-600 text-center">Действие</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-blue-100 text-blue-900 text-opacity-80 whitespace-nowrap">
                        @foreach($categories as $category)
                            <tr>
                                <td class="py-3 px-3">{{ $category->name_of_category }}</td>
                                <td class="py-3 px-3 text-right">{{ \Carbon\Carbon::parse($category->created_at)->format('d.m.Y') }}</td>
                                <td class="py-3 px-3 text-center">
                                    <a href="#editModal" name="editModal" data-name="{{ $category->name_of_category }}" data-id="{{ $category->id }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-yellow-500 uppercase transition bg-transparent border-2 border-yellow-500 rounded-lg ripple hover:bg-yellow-100 focus:outline-none">Редактировать</a>
                                    <a href="#deleteModal" data-id="{{ $category->id }}" name="deleteModal" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none ml-3">Удалить</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($categories->isEmpty())
                @component('components.no_data_message')
                @endcomponent
            @endif
        </div>
    </div>

    <div class="flex flex-row mt-4">
        {{ $categories->links('vendor.pagination.custom') }}
    </div>

    <!-- Delete course modal -->
    <div id="deleteModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
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
                <button class="del inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-red-500 uppercase transition bg-transparent border-2 border-red-500 rounded-lg ripple hover:bg-red-100 focus:outline-none">Удалить</button>
            </div>
        </div>
    </div>

    <!-- Add category modal -->
    <div id="addCategoryModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 rounded-lg">
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
                <button type="submit" id="btnSave" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
            </div>
        </div>
    </div>

    <!-- Edit modal category -->
    <div id="editCategoryModal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(240,248,255, 0.9);">
        <input type="hidden" name="_token" id="csrf" value="{{ session()->token() }}">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-1/3 rounded-lg">
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
                <button type="submit" id="save" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-lg ripple hover:bg-blue-100 focus:outline-none">Сохранить</button>
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


            $('a[name="editModal"]').click(function(){

                $('#editCategoryModal').removeClass('hidden')

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
                                    $(error_id).removeClass('hidden')
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
