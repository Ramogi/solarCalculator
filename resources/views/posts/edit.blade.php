@extends('layout')
@section('title','Edit Post')
@section('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
         selector:'textarea',
         plugins:'link' 
        });
    </script>
@endsection
@section('content')
<h1>Edit Post</h1>
<div class="row">
	{!!Form::model($post,['route'=>['update_post',$post->id],'method' =>'POST'])!!}
	<div class="form-group"> 
		{{ Form::label( 'title', 'Title' ) }} {{ Form::text( 'title', null, [ 'class' => 'form-control' ] ) }} 
	</div> 
	<div class="form-group"> 
		{{ Form::label( 'category', 'Category' ) }} {{ Form::text( 'category', null, [ 'class' => 'form-control' ] ) }} 
	</div> 
	<div class="form-group"> 
		{{ Form::label( 'body', 'Body' ) }} {{ Form::textarea( 'body', null, [ 'class' => 'form-control' ] ) }} 
	</div>﻿
	<div class="form-control">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($post->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last Updated at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($post->updated_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Category:</dt>
				<dd>{{$post->category}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{{ Html::linkRoute('show_post','Cancel',array($post->id), array('class'=>'btn btn-danger btn-block'))}}
				</div>
				<div class="col-sm-6">
					{{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
					
				</div>
			</div>
		</div>
	</div>
	{!! Form::close()!!}
</div>
@endsection