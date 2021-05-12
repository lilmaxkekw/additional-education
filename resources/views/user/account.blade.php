@extends('layout')

@section('title', 'Информация')

@section('content')

    @if(empty(auth()->user()->email_verified_at))
        <div class="alert flex flex-row items-center bg-yellow-200 p-5 rounded border-b-2 border-yellow-300 mb-5">
            <div class="alert-icon flex items-center bg-yellow-100 border-2 border-yellow-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
				<span class="text-yellow-500">
					<svg fill="currentColor"
                         viewBox="0 0 20 20"
                         class="h-6 w-6">
						<path fill-rule="evenodd"
                              d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                              clip-rule="evenodd"></path>
					</svg>
				</span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-yellow-800">
                    Внимание!
                </div>
                <div class="alert-description text-sm text-yellow-600">
                    Подтвердите свой email
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-lg">

        <div class="px-12 py-12">
            <!-- TODO -->
            <img class="inline-block h-56 w-56 rounded-full" @if(empty(auth()->user()->photo)) src="/user.svg" @else src="1" @endif alt="">

            <h2 class="text-2xl font-normal text-grey-900 my-5">{{ auth()->user()->name }}</h2>
        </div>

    </div>
@endsection
