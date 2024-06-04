@if ($paginator->hasPages())
<nav class="pagination justify-content-center">
    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled pagination__list" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true" class="pagination__item--arrow  link ">
                <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                <span class="visually-hidden">page left arrow</span>
            </span>
        </li>
        @else
            <li class="pagination__list"> 
                <a class="pagination__item--arrow  link " href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M244 400L100 256l144-144M120 256h292"/></svg>
                    <span class="visually-hidden">page left arrow</span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled pagination__list" aria-disabled="true"><span class="pagination__item">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active pagination__list" aria-current="page"><span class="pagination__item pagination__item--current">{{ $page }}</span></li>
                    @else
                        <li class="pagination__list"><a href="{{ $url }}" class="pagination__item link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="pagination__list">
            <a class="pagination__item--arrow  link " href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                <span class="visually-hidden">page right arrow</span>
            </a>
        </li>
        @else
        <li class="disabled pagination__list" aria-disabled="true" aria-label="@lang('pagination.next')">
            <span class="pagination__item--arrow  link " aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M268 112l144 144-144 144M392 256H100"/></svg>
                <span class="visually-hidden">page right arrow</span>
            </span>
        </li>
        @endif
    </ul>
</nav>
@endif
