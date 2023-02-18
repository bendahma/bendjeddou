@if ($paginator->hasPages())
    <nav class="mx-auto">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">Avant</span>
                </li>
            @else
                <li class="page-item">
                    <button wire:click="previousPage" rel="prev" class="btn btn-outline-success mx-2">
                        <span >Avant</span>
                    </button>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <button wire:click="nextPage" rel="next" class="btn btn-outline-success ">                     
                        <span >Suivant</span>
                    </button>
                </li>
            @else
                <button rel="next" class="btn btn-disabled ">                     
                    <span >Suivant</span>
                </button>
            @endif
        </ul>
    </nav>
@endif
