@extends('layouts.defaultLayout')
@section('title', 'Edit')
@section('content')
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<form method="post" action="{{route('Update')}}">
        @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}">
            
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>UPDATE Account</h1>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name"  value="{{$user->firstName}}">
                    @if ($errors->has('firstName')) <p class="help-block text-danger">{{ $errors->first('firstName') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name"  value="{{$user->lastName}}">
                    @if ($errors->has('lastName')) <p class="help-block text-danger">{{ $errors->first('lastName') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{$user->email}}">
                    @if ($errors->has('email')) <p class="help-block text-danger">{{ $errors->first('email') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="custom-select" name="gender" id="gender">
                        <option value="" @if($user->gender == "") selected @endif>Select Gender</option>
                        <option value="Male" @if($user->gender == "Male") selected @endif>Male</option>
                        <option value="Female" @if($user->gender == 'Female') selected @endif>Female</option>
                        <option value="Other" @if($user->gender == 'Other') selected @endif>Other</option>
                    </select>
                    @if ($errors->has('gender')) <p class="help-block text-danger">{{ $errors->first('gender') }}</p> @endif
                </div>

        </div>
        </div>
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" name="Update" id="Update" class="btn btn-primary btn-lg btn-block">Update</button>
        </div>
    </div>
    </form>

        
@endsection