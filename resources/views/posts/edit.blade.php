@extends('layouts.apps')
@section('title',' Post')
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
            <h1>Edit Post</h1>
    		<hr>
            {!!Form::model($post,['route'=>['update_post',$post->id],'method' =>'POST'])!!}
                {{Form::label('title','Title:')}}
                {{Form::text('title',null,array('class'=>'form-control'))}}
                {{Form::label('category','Category:')}}
                {{Form::text('category',null,array('class'=>'form-control'))}}
                {{Form::label('body','Body:')}}
                {{Form::textarea('body',null,array('class'=>'form-control'))}}
                <hr>
                {{ Html::linkRoute('show_post','Cancel',array($post->id), array('class'=>'btn btn-danger btn-block'))}}
                <hr>
                {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}

            {!! Form::close() !!}
    	</div>
    </div>
        
@endsection