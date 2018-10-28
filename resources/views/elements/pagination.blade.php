@if ($paginator->hasPages())
<br/>
<nav class="pagination is-right" role="navigation" aria-label="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-collapse-left"></i></span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-left"></i></a>
    @endif

    {{-- Pagination Elements --}}
    @if (!empty($elements))
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-right"></i></a>
    @else
        <span class="pagination-previous"><i class="mdi mdi-24px mdi-arrow-collapse-right"></i></span>
    @endif
</ul>
@endif
