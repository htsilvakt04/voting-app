@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-8">
			<h1>Community</h1>
				<hr>
				<ul class="Links">
					@foreach ($links as $link)
						<li class="Links__link">
							<span class="label label-default" style="background-color: {{$link->channel->color}}">{{$link->channel->title}}</span>
							<a href="{{$link->link}}" target="_blank">
								{{$link->title}}
							</a>
							<small>
								Contributed By: <a href="/users/info/?name=...">{{$link->creator->name}}</a> - {{$link->updated_at->diffForHumans()}}
							</small>
							
						</li>
					@endforeach
				</ul>		
			{{$links->links()}}
		</div>
		@if(Auth::check())
			<div class="col-md-3 col-md-offset-1">
			@include('community.partial.addlinkform')
			</div>
		@endif
	</div>
</div>

@stop