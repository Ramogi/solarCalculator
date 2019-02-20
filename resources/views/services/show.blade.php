@extends('layout')
@section('title','View service')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{$service->name}}</h1>
	</div >
	<div class="col-md-4">
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
					{!! Html::linkRoute('services.edit','Edit',array($service->id), array('class'=>'btn btn-primary btn-block'))!!}
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['services.destroy', $service->id], 'method'=>'DELETE']) !!}
					{{Form::submit('Delete',['class'=>'btn btn-danger btn-block'])}}
					{!!Form::close()!!}	
					
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					{{Html::linkRoute('services.index','View all services',[],['class'=>'btn btn-success btn-block'])}}
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection