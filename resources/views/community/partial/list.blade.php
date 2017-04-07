@if (session()->has('thanks'))
    <div class="alert alert-success">
        {!! session('thanks') !!}
    </div>
@endif
<div class="col-md-8">
		<h2>
			<a href="/community">Community</a>
			@if($channel->exists) 
				<span>&mdash; {{$channel->title}}</span>
			@endif
		</h2>
		<ul class="list-group">
			@if(count($links))
			@foreach ($links as $link)
				<li class="list-group-item">
					<form action="/votes/{{$link->id}}" method="POST">
						{{csrf_field()}}

						<button class="btn {{auth()->check() && auth()->user()->votedOn($link) ? 'btn-success' : 'btn-default'}}" type="submit"
						{{Auth::guest() ? "disabled" : ""}} >
							{{$link->votes->count()}}
						</button>
					</form>
					
					<a href="/community/{{$link->channel->slug}}" class="label label-default" style="background-color: {{$link->channel->color}}">{{$link->channel->title}}</a>
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
		