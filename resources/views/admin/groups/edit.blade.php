@extends('layout')

@section('title', 'Редактирование группы')

@section('content')

{{--    @if($errors->any())--}}
{{--        <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300 mb-5">--}}
{{--            <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">--}}
{{--				<span class="text-red-500">--}}
{{--					<svg fill="currentColor"--}}
{{--                         viewBox="0 0 20 20"--}}
{{--                         class="h-6 w-6">--}}
{{--						<path fill-rule="evenodd"--}}
{{--                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"--}}
{{--                              clip-rule="evenodd"></path>--}}
{{--					</svg>--}}
{{--				</span>--}}
{{--            </div>--}}
{{--            <div class="alert-content ml-4">--}}
{{--                <div class="alert-title font-semibold text-lg text-red-800">--}}
{{--                    Ошибка--}}
{{--                </div>--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <div class="alert-description text-sm text-red-600">--}}
{{--                        {{ $error }}--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form action="{{ route('groups.update', $group->id) }}" method="POST">
                @method("PATCH")
                @csrf
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="number_group" class="block text-sm font-medium text-gray-700">Номер группы</label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="number_group" id="number_group" value="{{ $group->number_group }}"
                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Дата начала обучения</label>
                            <div class="mt-1">
                                <input type="date" name="start_date" id="start_date" value="{{ $group->start_date }}"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">Дата конца обучения</label>
                            <div class="mt-1">
                                <input type="date" name="end_date" id="end_date" value="{{ $group->end_date }}"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                        </div>

                        <div>
                            <label for="course_id" class="block text-sm font-medium text-gray-700">Номер курса</label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="course_id" id="course_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if($course->id == $group->id) selected @endif>{{ $course->name_of_course }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Сохранить
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
