@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center impx-pagination" uk-margin>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled"><span uk-pagination-previous></span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span uk-pagination-previous></span></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Dots --}}
            @if (is_string($element))
                <li class="uk-disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Page Numbers --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span uk-pagination-next></span></a></li>
        @else
            <li class="uk-disabled"><span uk-pagination-next></span></li>
        @endif
    </ul>
@endif
