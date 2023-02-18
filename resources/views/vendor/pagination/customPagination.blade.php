@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center py-2">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                @svg('light/chevron-double-left', 'w-5 h-5')
            </span>
        @else
            <button wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                @svg('light/chevron-double-left', 'w-5 h-5')
            </button>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <button wire:click="nextPage" rel="next" class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                @svg('light/chevron-double-right', 'w-5 h-5')
            </button>
        @else
            <span class="relative inline-flex items-center px-2 py-1 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                @svg('light/chevron-double-right', 'w-5 h-5')
            </span>
        @endif
    </nav>
@endif