@extends('layouts.apps')
@section('title','search')
@section('content')
<div class="container">
    @if(isset($details))
        <h6> The Search results for your query <b> {{ $query }} </b> are :</h6>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                 <th>Email</th>              
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection