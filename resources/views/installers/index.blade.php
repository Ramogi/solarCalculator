@extends('layouts.apps')
@section('title','All installers')
@section('content')
<div class="row">
  <div class="col-md-10">
    <h1>All installers</h1>
  </div>
  <div class="col-md-2">
    @can('create-installer')
    <a href="{{route('create_installer')}}" class="btn btn-lg btn-block btn-primary">Create</a>
    @endcan
  </div>
  <hr>
</div>
<div class="row">
  <div class="col-md-12">
    <table class="table">
      <thead>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Created At</th>
        <th></th>
      </thead>
      <tbody>
        @foreach($installers as $installer)
          <tr>
            <td>{{$installer->name}}</td>
            <td>{{$installer->email}}</td>
            <td>{{$installer->location}}</td>
            <td>{{date('j M, Y H:i  ',strtotime($installer->created_at))}}</td>
            <td><a href="{{route('show_installer',$installer->id)}}" class="btn btn-default btn-sm">View</a>
              @can('update-installer', $installer)
              <a href="{{route('edit_installer',$installer->id)}}" class="btn btn-default btn-sm">Edit</a>@endcan</td>
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