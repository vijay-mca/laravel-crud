@extends('layouts.defaultLayout')
@section('title', 'SignUp')
@section('content')
@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<form method="post" action="{{route('SignUp')}}">
        @csrf
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>SignUp</h1>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="First Name"  value="{{old('firstName')}}">
                    @if ($errors->has('firstName')) <p class="help-block text-danger">{{ $errors->first('firstName') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last Name"  value="{{old('lastName')}}">
                    @if ($errors->has('lastName')) <p class="help-block text-danger">{{ $errors->first('lastName') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                    @if ($errors->has('email')) <p class="help-block text-danger">{{ $errors->first('email') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="custom-select" name="gender" id="gender">
                        <option value="" @if(old('gender') == "") selected @endif>Select Gender</option>
                        <option value="Male" @if(old('gender') == "Male") selected @endif>Male</option>
                        <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                        <option value="Other" @if(old('gender') == 'Other') selected @endif>Other</option>
                    </select>
                    @if ($errors->has('gender')) <p class="help-block text-danger">{{ $errors->first('gender') }}</p> @endif
                </div>

        </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="pass1" id="pass1" class="form-control" placeholder="Password">
                    @if ($errors->has('pass1')) <p class="help-block text-danger">{{ $errors->first('pass1') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label for="re-password">ConfirmPassword</label>
                  <input type="password" name="pass2" id="pass2" class="form-control" placeholder="Re-Password">
                  @if ($errors->has('pass2')) <p class="help-block text-danger">{{ $errors->first('pass2') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" name="SignUp" id="SignUp" class="btn btn-primary btn-lg btn-block">SignUp</button>
        </div>
    </div>
    </form>

        
@endsection