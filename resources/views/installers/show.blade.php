@extends('layouts.apps')
@section('title','Show Installer')
@section('content')
<div class="row">
	<div class="col-md-8">
		<h1>{{$installer->name}}</h1>
		<p class="lead">{!!$installer->location!!}</p>
		<p class="lead">{!!$installer->email!!}</p>
	</div >
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($installer->created_at))}}</dd>	
			</dl>
			<dl class="dl-horizontal">
				<dt>Last Updated at:</dt>
				<dd>{{date('j M, Y h:i a ',strtotime($installer->updated_at))}}</dd>	
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					@can('update-installer', $installer)
					{!! Html::linkRoute('edit_installer','Edit',array($installer->id), array('class'=>'btn btn-primary btn-block'))!!}
					@endcan
				</div>
				<div class="col-sm-6">
					{!! Form::open(['route'=>['delete_installer', $installer->id], 'method'=>'DELETE']) !!}
					@can('delete-installer', $installer)
					{{Form::submit('Delete',['class'=>'btn btn-danger btn-block'])}}
					@endcan
					{!!Form::close()!!}	
					
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					{{Html::linkRoute('list_installers','View all installers',[],['class'=>'btn btn-success btn-block'])}}
				</div>
			</div>
		</div>	
	</div>
</div>
@endsection