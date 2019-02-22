@extends('layouts.apps')
@section('title','Edit installer')
@section('content')
<h1>Edit installer</h1>
<div class="row">
	{!!Form::model($installer,['route'=>['update_installer',$installer->id],'method' =>'POST'])!!}
	<div class="form-group"> 
		{{ Form::label( 'name', 'NAme' ) }} {{ Form::text( 'name', null, [ 'class' => 'form-control' ] ) }} 
	</div> 
	<div class="form-group"> 
		{{ Form::label( 'email', 'Email' ) }} {{ Form::text( 'email', null, [ 'class' => 'form-control' ] ) }} 
	</div> 
	<div class="form-group"> 
		{{ Form::label( 'location', 'Location' ) }} {{ Form::text( 'location', null, [ 'class' => 'form-control' ] ) }} 
	</div>﻿
	<div class="form-control">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($installer->created_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last Updated at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($installer->updated_at))}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Email:</dt>
				<dd>{{$installer->email}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					{{ Html::linkRoute('show_installer','Cancel',array($installer->id), array('class'=>'btn btn-danger btn-block'))}}
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