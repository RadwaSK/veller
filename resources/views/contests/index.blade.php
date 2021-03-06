@extends('layouts.opporunitiesIndexLayout')

<title>Veller | Contests</title>

@section('contests_tab')
	active
@endsection

@section('postsArea')
	<div class="list-group">
		@if ($posts->num_rows != 0)
			@while($post = $posts->fetch_assoc())
				<a href="{{route('contests.show', $post['post_id'] ) }}" class="list-group-item list-group-item-action list-group-item-dark">
					<p>{{$post["name"]}}</p>
					<p>{{$post["title"]}}</p>
					<p>{{ $post["post_date"] }}</p>
				</a>		
			@endwhile	
		@else
			<div class="jumbotron">
				<p>Sorry! There is no contests at the moment.</p>
			</div>
		@endif
	</div>
@endsection