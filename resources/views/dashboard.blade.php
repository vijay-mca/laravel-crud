@extends('layouts.dashboardLayout')
@section('title', 'DashBoard')
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
            @if (count($users) > 0)
            @foreach ($users as $user)

        <tr>
            <td scope="row">{{$user->firstName}}</td>
            <td>{{$user->lastName}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->gender}}</td>
            <td> <a class="btn btn-small btn-danger" href="{{ url('user/' . $user->id . '/delete') }}">Delete</a></td>

        </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center text-danger">No Record Found </td>
            </tr>
            @endif
    </tbody>
</table>
@endsection