<div class="bg-white rounded-lg mb-5">
    <nav class="flex flex-col sm:flex-row">
{{--        <a href="{{ route('user.applications') }}" class="uppercase text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ request()->routeIs('user.applications') ? 'border-b-4 border-blue-500' : ''}}">Мои курсы</a>--}}
        <a href="{{ route('user.performance') }}" class="uppercase text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ request()->routeIs('user.performance') ? 'border-b-4 border-blue-500' : '' }}">Успеваемость</a>
        <a href="{{ route('user.applications') }}" class="uppercase text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none {{ request()->routeIs('user.applications') ? 'border-b-4 border-blue-500' : ''}}">Мои заявки</a>
    </nav>
</div>
