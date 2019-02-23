@extends('layouts.apps')
@section('title','Edit service')
@section('content')
    <div class="row">
      <div class="col-md-12">
            <h1>Edit Service</h1>
        <hr>
            {!!Form::model($service,['route'=>['update_service',$service->id],'method' =>'POST'])!!}
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,array('class'=>'form-control'))}}
                <hr>
                {{ Html::linkRoute('show_service','Cancel',array($service->id), array('class'=>'btn btn-danger btn-block'))}}
                <hr>
                {{Form::submit('Save',['class'=>'btn btn-success btn-block'])}}
            {!! Form::close() !!}
      </div>
    </div>
        
@endsection