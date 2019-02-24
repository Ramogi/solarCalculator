@extends('layouts.apps')
@section('title','recommend')
@section('content')
<div class="container">
    @if(isset($details))
    <h6> Installers in Your Region</h6>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $installer)
            <tr>
                <td>{{$installer->name}}</td>
                <td>{{$installer->email}}</td>
                <td>{{$installer->location}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection