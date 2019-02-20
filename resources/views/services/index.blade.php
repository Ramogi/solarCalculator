@extends('layout')
@section('title','All services')
@section('content')
<div class="row">
  <div class="col-md-10">
    <h1>All services</h1>
  </div>
  <div class="col-md-2">
    <a href="{{route('services.create')}}" class="btn btn-lg btn-block btn-primary">Create</a>
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Service</th>
        <th>Created At</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($services as $service)
          <tr>
            <th>{{$service->id}}</th>
            <td>{{$service->name}}</td>
            <td>{{date('j M, Y H:i  ',strtotime($service->created_at))}}</td>
            <td><a href="{{route('services.show',$service->id)}}" class="btn btn-default btn-sm">View</a>
            <a href="{{route('services.edit',$service->id)}}" class="btn btn-default btn-sm">Edit</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
      <div class="text-center">
        {!!$services->links();!!}
      </div>
  </div>
</div>
@endsection