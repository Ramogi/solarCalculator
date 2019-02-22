@extends('layouts.apps')
@section('title','Create New Post')
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
    <div class="row">
    	<div class="col-md-12">
            <h1>Create New Post</h1>
    		<hr>
            {!! Form::open(['route' => 'store_post']) !!}
                {{Form::label('title','Title:')}}
                {{Form::text('title',null,array('class'=>'form-control'))}}
                {{Form::label('category','Category:')}}
                {{Form::text('category',null,array('class'=>'form-control'))}}
                {{Form::label('body','Body:')}}
                {{Form::textarea('body',null,array('class'=>'form-control'))}}
                <hr>
                {{Form::submit('Publish',array('class'=>'btn btn-success btn-block'))}}
            {!! Form::close() !!}
    	</div>
    </div>
        
@endsection