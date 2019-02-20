@extends('layout')
@section('title','All installers')
@section('content')
<div class="row">
  <div class="col-md-10">
    <h1>All installers</h1>
  </div>
  <div class="col-md-2">
    <a href="{{route('installers.create')}}" class="btn btn-lg btn-block btn-primary">Create</a>
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Created At</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($installers as $installer)
          <tr>
            <th>{{$installer->id}}</th>
            <td>{{$installer->name}}</td>
            <td>{{$installer->email}}</td>
            <td>{{$installer->location}}</td>
            <td>{{date('j M, Y H:i  ',strtotime($installer->created_at))}}</td>
            <td><a href="{{route('installers.show',$installer->id)}}" class="btn btn-default btn-sm">View</a>
              <a href="{{route('installers.edit',$installer->id)}}" class="btn btn-default btn-sm">Edit</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
      <div class="text-center">
        {!!$installers->links();!!}
      </div>
  </div>
</div>
@endsection