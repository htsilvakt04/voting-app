<h3>Contribute a link</h3>
<div class="panel panel-default">
	<div class="panel-body">
		<form method="POST" action="/community" >
			{{csrf_field()}}

			<div class="form-group {{ $errors->has('channel_id') ? 'has-error' : '' }}">
			  <label for="channel">Category:</label>
			  <select id="channel" name="channel_id" class="form-control">
			  	<option selected disabled>Pick a Channel</option>
			  	@foreach($channels as $channel)
			  		<option
			  		 value="{{$channel->id}}"
			  		 {{old('channel_id') == $channel->id ? 'selected' : ''}}>{{$channel->title}}</option>
			  	@endforeach
			  	
			  </select>
			  {!! $errors->first("channel_id", "<span class='help-block'>:message</span>") !!}
			</div>

			<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}" >
			  <label for="title">Title:</label>
			  <input type="text" class="form-control" id="title" name="title" placeholder="What is the title of your artical?" value="{{old('title')}}" required>
			  
			  	{!! $errors->first("title", "<span class='help-block'>:message</span>") !!}
			  
			</div>


			<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
			  <label for="link">Link:</label>
			  <input type="text" class="form-control" id="link" name="link" placeholder="What is the URl?" value="{{old('link')}}" required>
			  
			  {!! $errors->first("link", "<span class='help-block'>:message</span>") !!}
			</div>



			<input type="submit" name="submit" value="Submit" class="btn btn-primary">
		
		</form>

	</div>
</div>
