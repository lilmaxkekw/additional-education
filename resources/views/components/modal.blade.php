<div id="modal" class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-center hidden" style="background-color: rgba(231,238,239, .9);">
    <!-- modal -->
    <div class="bg-white rounded-lg shadow-lg w-1/3">
{{--    <div class="bg-white rounded shadow-lg sm:w-screen sm:h-screen">--}}
        <!-- modal header -->
        <div class="px-4 py-2 flex justify-center items-center">
            <lottie-player
                src="{{ $gif }}"
                style="width: 400px;"
                autoplay
                loop
            ></lottie-player>
        </div>
        <!-- modal body -->
        <div class="p-4">
            <div class="px-4 py-5 bg-white space-y-6 sm:p-6 flex justify-center">
                <label class="block text-lg font-medium text-gray-700 addText">
                </label>
            </div>
        </div>
        <div class="flex justify-center items-center w-100 p-3">
            <button name="ok" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-blue-500 uppercase transition bg-transparent border-2 border-blue-500 rounded-full ripple hover:bg-blue-100 focus:outline-none">ОК</button>
        </div>
    </div>
</div>
