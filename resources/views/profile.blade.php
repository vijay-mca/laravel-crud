@extends('layouts.dashboardLayout')
@section('title', 'Profile')
@section('content')
@if (Session::has('success'))
    <p class="alert alert-info">{{ Session::get('success') }}</p>
@elseif (Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<table class="table">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            <tr>
            <td scope="row">{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->gender}}</td>
            <td> <a class="btn btn-small btn-info" href="{{ url('user/' . $user->id . '/edit') }}">Edit</a></td>
            </tr>
    </tbody>
</table>
@endsection