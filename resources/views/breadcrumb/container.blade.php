<nav class="{{ config('breadcrumb.classes.container') }}" aria-label="breadcrumb">
    <ol class="{{ config('breadcrumb.classes.list') }}">
    	@foreach ($breadcrumb as $crumb)
    		@include('marshmallow::breadcrumb.crumb')
    	@endforeach
    </ol>
</nav>
