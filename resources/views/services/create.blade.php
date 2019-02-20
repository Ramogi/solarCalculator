@extends('layout')
@section('title','Create New service')
@section('content')
    <div class="row">
      <div class="col-md-12">
            <h1>Create New service</h1>
        <hr>
            {!! Form::open(['route' => 'services.store']) !!}
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,array('class'=>'form-control'))}}
                <hr>
                {{Form::submit('Publish',array('class'=>'btn btn-success btn-block'))}}
            {!! Form::close() !!}
      </div>
    </div>
        
@endsection