<div class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
    <div
        class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <!--Title-->
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Изменение данных о разделе</p>
                <div class="modal-close cursor-pointer z-50">
                    <svg class="fill-current text-black mb-6 ml-2" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                         viewBox="0 0 18 18">
                        <path
                            d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                        </path>
                    </svg>
                </div>
            </div>
            <!--Body-->
            <div class="mt-5">
                <form>
                    <div class="">
                        <label for="date_section" class="block text-xs font-semibold text-gray-600 uppercase">Дата занятия</label>
                        <input id="date_section" type="date" value="" name="date_section" placeholder="Выберите дату" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        <span class="text-sm font-medium text-red-500" id="date_section_error"></span>
                    </div>
                    <div class="mt-2">
                        <label for="name_section" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Название занятия</label>
                        <input value="" id="name_section" type="text" name="name_section" placeholder="Введите название занятия" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" required />
                        <span class="text-sm font-medium text-red-500" id="name_section_error"></span>
                    </div>
                    <div class="mt-2">
                        <label for="description_section" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Описание занятия</label>
                        <textarea value="" name="description_section" id="description_section" placeholder="Введите описание занятия" class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner" cols="30" rows="10"></textarea>
                        <span class="text-sm font-medium text-red-500" id="description_section_error"></span>
                    </div>
                    <div class="flex justify-end pt-5">
                        <button id="btnSave" type="button" class="focus:outline-none px-4 bg-green-500 p-3 rounded-lg text-black hover:bg-green-600 text-white mr-5">Сохранить</button>
                        <button type="button" class="focus:outline-none modal-close px-4 bg-gray-800 p-3 rounded-lg text-black hover:bg-gray-600 text-white">Отмена</button>
                    </div>
                </form>
            </div>
            <!--Footer-->
        </div>
    </div>
</div>
