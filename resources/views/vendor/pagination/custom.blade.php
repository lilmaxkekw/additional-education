@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex justify-center text-sm bg-white">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-label="@lang('pagination.previous')">
                    <span class="px-4 py-3 text-gray-500 block rounded-l" aria-hidden="true">&larr;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}"
                       rel="prev"
                       class="px-4 py-3 block text-blue-600 rounded-l hover:text-white hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                       aria-label="@lang('pagination.previous')"
                    >
                        &larr;
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="px-4 py-3 block text-gray-500">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page">
                                <span class="px-4 py-3 block text-white bg-blue-600">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}"
                                   class="px-4 py-3 block text-blue-600 hover:text-white hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                                   aria-label="@lang('pagination.goto_page', ['page' => $page])"
                                >
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}"
                       rel="next"
                       class="px-4 py-3 block text-blue-600 rounded-r hover:text-white hover:bg-blue-600 focus:outline-none focus:shadow-outline"
                       aria-label="@lang('pagination.next')"
                    >
                        &rarr;
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="px-4 py-3 block text-gray-500 rounded-r" aria-hidden="true">&rarr;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
