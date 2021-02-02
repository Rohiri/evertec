@if ($paginator->hasPages())
	<nav>
		{{-- Previous Page Link --}}
		<ul class="pagination pagination-sm no-margin pull-right">
			@if($paginator->onFirstPage())
				<li class="disabled" aria-disabled="true">
					<span>@lang('pagination.previous')</span>
				</li>
			@else
				<li>
					<a wire:click="previousPage" rel="prev">@lang('pagination.previous')</a>
				</li>
			@endif

			{{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)

                        	@if ($page == $paginator->currentPage())
                        		<li class="active" wire:key="paginator-page-{{ $page }}" aria-current="page" wire:click="gotoPage({{ $page }})"><span class="page-link">{{ $page }}</span></li>
                        	@else
                        		<li wire:key="paginator-page-{{ $page }}" aria-current="page" wire:click="gotoPage({{ $page }})"><span class="page-link">{{ $page }}</span></li>
                        	@endif
                        @endforeach
                    @endif
                @endforeach

			{{-- Next Page Link --}}
			@if($paginator->hasMorePages())
				<li>
					<a wire:click="nextPage" rel="next">@lang('pagination.next')</a>
				</li>
			@else
				<li class="disabled" aria-disabled="true">
					<span>@lang('pagination.next')</span>
				</li>
			@endif
		</ul>
	</nav>
@endif