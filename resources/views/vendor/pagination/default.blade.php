@if ($paginator->hasPages())
    <div class="pagination__wrapper">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><span class="prev" title="Prev Page">&#10094;</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="prev" title="Prev Page">&#10094;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="next" title="Next Page">&#10095;</a></li>
            @else
                <li><span class="next" title="Next Page">&#10095;</span></li>
            @endif
        </ul>
    </div>
@endif
