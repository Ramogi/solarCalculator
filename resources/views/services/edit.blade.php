@extends('layouts.apps')
@section('title','Edit service')
@section('content')
<h1>Edit service</h1>
<div class="row">
  {!!Form::model($service,['route'=>['update_services',$service->id],'method' =>'POST'])!!}
  <div class="form-group"> 
    {{ Form::label( 'name', 'Name' ) }} {{ Form::text( 'name', null, [ 'class' => 'form-control' ] ) }} 
  </div> 
  <div class="form-control">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created at:</dt>
        <dd>{{date('j M, Y h:i a ',strtotime($service->created_at))}}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated at:</dt>
        <dd>{{date('j M, Y h:i a ',strtotime($service->updated_at))}}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-sm-6">
          {{ Html::linkRoute('show_services','Cancel',array($service->id), array('class'=>'btn btn-danger btn-block'))}}
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