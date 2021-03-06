<li class="{{ config('breadcrumb.classes.item') }} {{ ($crumb->current) ? config('breadcrumb.classes.active_item') : '' }}" {{ ($crumb->current) ? 'aria-current=page' : '' }}>
	@if ($crumb->hasLink())
		<a class="{{ config('breadcrumb.classes.link') }} {{ ($crumb->current) ? config('breadcrumb.classes.active_link') : '' }}" href="{{ $crumb->url }}">
			@if ($crumb->hasIcon())
				@include('marshmallow::breadcrumb.icon')
			@endif
			{{ $crumb->name }}
		</a>
	@else
		@if ($crumb->hasIcon())
			@include('marshmallow::breadcrumb.icon')
		@endif
		{{ $crumb->name }}
	@endif
</li>
