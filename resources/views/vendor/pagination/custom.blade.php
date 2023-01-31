@if ($paginator->hasPages())
    <div class="w-[calc(100%_-_2.5rem)] lg:w-[calc(100%_-_4rem)] mx-auto max-w-5xl mb-20 lg:mb-32">
        <nav class="pagination " aria-label="Pagination">
            <ol class="pagination__list flex flex-wrap gap-1 lg:gap-1.5 justify-center">
                @if ($paginator->onFirstPage())
                    <li>
                        <a class="pagination__item pagination__item--disabled" aria-label="Go to previous page">
                            <svg class="icon w-[16px] h-[16px] mr-1 lg:mr-1.5 -scale-x-100" viewBox="0 0 16 16">
                                <polyline points="6 2 12 8 6 14" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                            <span>Prev</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ $paginator->previousPageUrl() }}" class="pagination__item"
                            aria-label="Go to previous page">
                            <svg class="icon w-[16px] h-[16px] mr-1 lg:mr-1.5 -scale-x-100" viewBox="0 0 16 16">
                                <polyline points="6 2 12 8 6 14" fill="none" stroke="currentColor"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                            </svg>
                            <span>Prev</span>
                        </a>
                    </li>
                @endif


                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="hidden md:inline-flex" aria-hidden="true">
                            <span class="pagination__item pagination__item--ellipsis">...</span>
                        </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="hidden md:inline-flex">
                                    <a href="#0" class="pagination__item pagination__item--selected"
                                        aria-label="Current Page, page 3" aria-current="page">{{ $page }}</a>
                                </li>
                            @else
                                <li class="hidden md:inline-flex">
                                    <a href="{{ $url }}" class="pagination__item"
                                        aria-label="Go to page {{ $page }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li>
                        <a href="{{ $paginator->nextPageUrl() }}" class="pagination__item" aria-label="Go to next page">
                            <span>Next</span>
                            <svg class="icon w-[16px] h-[16px] ml-1 lg:ml-1.5" viewBox="0 0 16 16">
                                <polyline points="6 2 12 8 6 14" fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" />
                            </svg>
                        </a>
                    </li>
                @else
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="pagination__item pagination__item--disabled" aria-label="Go to next page">
                        <span>Next</span>
                        <svg class="icon w-[16px] h-[16px] ml-1 lg:ml-1.5" viewBox="0 0 16 16">
                            <polyline points="6 2 12 8 6 14" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" />
                        </svg>
                    </a>
                </li>
                @endif

            </ol>
        </nav>
    </div>
@endif
