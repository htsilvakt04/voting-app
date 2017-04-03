@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		@if (session()->has('thanks'))
		    <div class="alert alert-success">
		        {!! session('thanks') !!}
		    </div>
		@endif
		<div class="col-md-8">
			<h2>Community</h1>
				<ul class="list-group">
					@if(count($links))
					@foreach ($links as $link)
						<li class="list-group-item">
							<span class="label label-default" style="background-color: {{$link->channel->color}}">{{$link->channel->title}}</span>
							<a href="{{$link->link}}" target="_blank">
								{{$link->title}}
							</a>
							<small>
								Contributed By: <a href="/users/info/?name=...">{{$link->creator->name}}</a> - {{$link->updated_at->diffForHumans()}}
							</small>
							
						</li>
					@endforeach
					@else
						<li class="list-group-item">No contributes yet</li>
					@endif
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