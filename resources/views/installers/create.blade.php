@extends('layouts.apps')
@section('title','Create New installer')
@section('content')
    <div class="row">
      <div class="col-md-12">
            <h1>Create New installer</h1>
        <hr>
            {!! Form::open(['route' => 'installers.store']) !!}
                {{Form::label('name','Name:')}}
                {{Form::text('name',null,array('class'=>'form-control'))}}
                {{Form::label('email','Email:')}}
                {{Form::text('email',null,array('class'=>'form-control'))}}
                {{Form::label('location','Location:')}}
                {{Form::text('location',null,array('class'=>'form-control'))}}
                <hr>
                {{Form::submit('Save',array('class'=>'btn btn-success btn-block'))}}
            {!! Form::close() !!}
      </div>
    </div>
        
@endsection