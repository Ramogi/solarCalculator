@extends('layouts.apps')
@section('title','All Posts')
@section('content')
<div class="row">
	<div class="col-md-10">
		<h1>All Posts</h1>
	</div>
	<div class="col-md-2">

		@can('create-post')
		<a href="{{route('create_post')}}" class="btn btn-lg btn-block btn-primary">Create</a>
		@endcan
		
	</div>
	<hr>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>Title</th>
				<th>Category</th>
				<th>Body</th>
				<th>Created At</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{$post->title}}</td>
						<td>{{$post->category}}</td>
						<td>{{substr(strip_tags($post->body),0, 100)}}{{strlen($post->body) > 90 ? "..." : ""}}</td>
						<td>{{date('j M, Y H:i  ',strtotime($post->created_at))}}</td>
						<td><a href="{{route('show_post',$post->id)}}" class="btn btn-default btn-sm">View</a>
						@can('update-post', $post)
						<a href="{{route('edit_post',$post->id)}}" class="btn btn-default btn-sm">Edit</a>
						@endcan</td>
					</tr>
				@endforeach
			</tbody>
		</table>
			<div class="text-center">
				{!!$posts->links();!!}
			</div>
	</div>
</div>
@endsection