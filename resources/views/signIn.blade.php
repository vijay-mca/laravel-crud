@extends('layouts.defaultLayout')
@section('title', 'SignIn')
@section('content')
@if(Session::has('credentials'))
<p class="alert alert-danger">{{ Session::get('credentials') }}</p>
@endif
<form method="post" action="{{route('SignIn')}}">
        @csrf
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>SignIn</h1>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                    @if ($errors->has('email')) <p class="help-block text-danger">{{ $errors->first('email') }}</p> @endif
            </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="pass1" class="form-control" placeholder="Password">
                    @if ($errors->has('password')) <p class="help-block text-danger">{{ $errors->first('password') }}</p> @endif
            </div>
        </div>
            <div class="col-lg-4 offset-lg-4">
                <button type="submit" name="SignUp" id="SignUp" class="btn btn-primary btn-lg btn-block">SignUp</button>
        </div>
    </div>
    </form>
@endsection