<nav class="nav-toggler">
    <div class="bg-white">
        <div class="container-xl mx-10 px-4"> <!-- mx-auto -->
            <div class="flex items-center md:justify-between"> <!-- py-4 -->
                <div class="w-1/4 md:hidden">
                    <svg class="fill-current text-white h-10 w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16.4 9H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zm0 4H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1zM3.6 7h12.8c.552 0 .6-.447.6-1 0-.553-.048-1-.6-1H3.6c-.552 0-.6.447-.6 1 0 .553.048 1 .6 1z"/></svg>
                </div>
                <div class="w-1/2 md:w-auto text-center text-blue-500 text-2xl font-medium">
                    <img src="{{ asset('logo.jpg') }}" alt="" class="inline-block w-16 h-16 my-2 ml-5">
                </div>
                <div class="w-1/4 md:w-auto md:flex text-right">
                    <a href="#dropdown" name="dropdown" class="hidden md:flex items-center cursor-pointer hover:bg-blue-50 p-2 rounded-lg">
                        <div>
                            <!-- TODO -->
                            <img class="inline-block h-12 w-12 rounded-full" @if(empty(auth()->user()->photo)) src="{{ asset('user.svg') }}" @else src="1" @endif alt="">
                        </div>
                        <div class="hidden md:block md:flex md:items-center ml-2">
                            <span class="text-grey-900 text-sm mr-1">@auth {{ auth()->user()->name }} @endauth</span>
                            <div>
                                <svg class="fill-current text-grey-900 h-4 w-4 block opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502a1.095 1.095 0 0 1-1.576 0S4.924 9.581 4.516 9.163c-.409-.418-.436-1.17 0-1.615z"/></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="dropdown" class="absolute hidden right-14 w-44 py-2 bg-white shadow-xl mt-2 rounded-lg">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button
                class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-50 hover:text-grey-900">
                Выйти
            </button>
        </form>
    </div>
</nav>
