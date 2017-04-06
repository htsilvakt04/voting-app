@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@include('community.partial.list')
		
		@if(Auth::check())
			<div class="col-md-3 col-md-offset-1">
			@include('community.partial.addlinkform')
			</div>
		@endif
	</div>
</div>

@stop