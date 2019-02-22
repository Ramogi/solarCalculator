@extends('layouts.apps')
@section('title','All services')
@section('content')
<div class="row">
  <div class="col-md-10">
    <h1>All services</h1>
  </div>
  <div class="col-md-2">
    @can('create-post')
    <a href="{{route('create_service')}}" class="btn btn-lg btn-block btn-primary">Create</a>
    @endcan
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>Service</th>
        <th>Created At</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($services as $service)
          <tr>
            <td>{{$service->name}}</td>
            <td>{{date('j M, Y H:i  ',strtotime($service->created_at))}}</td>
            <td><a href="{{route('show_service',$service->id)}}" class="btn btn-default btn-sm">View</a>
              @can('update-service', $service)
            <a href="{{route('edit_service',$service->id)}}" class="btn btn-default btn-sm">Edit</a>@endcan
          </td>
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