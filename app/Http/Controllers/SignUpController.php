<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class signUpController extends Controller
{
    public function showsignUpForm()
    {
        return view('signUp');
    }

    public function store(Request $request)
    {
        //
        $rules = array(
            'firstName'     => 'required',
            'lastName'      => 'required',
            'gender'        => 'required',
            'email'         => 'required|email|unique:users',
            'pass1'         => 'required|min:8|max:16',
            'pass2'         => 'required|same:pass1'
        );

        $messages = [
            'firstName.required'    => 'First Name is Required.',
            'lastName.required'     => 'Last Name is Required.',
            'gender.required'       => 'Gender is Required.',
            'email.required'        => 'Email is Required.',
            'pass1.required'        => 'Password is Required.',
            'pass2.required'        => 'Confirm is Required.',
            'email.email'           => 'Invalid Email ID',
            'email.unique'          => 'Email is Allready Taken.',
            'pass1.min'             => 'Use 8 Character or More For Your Password.',
            'pass1.max'             => 'Use 16 or Fewer Ffor Your Password.',
            'pass2.same'            => 'Those Password didn\'t Match. Try Again'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to('SignUp')
                ->withInput()
                ->withErrors($validator);
        } else {
            try {
                $firstName = $request->input('firstName');
                $lastName = $request->input('lastName');
                $email = $request->input('email');
                $gender = $request->input('gender');
                $pass1 = $request->input('pass1');
                $password = Hash::make($pass1);

                $user = new User;
                $user->firstName = $firstName;
                $user->lastName = $lastName;
                $user->email = $email;
                $user->gender = $gender;
                $user->password = $password;
                $result = $user->save();
                if ($result) {
                    Session::flash('message', 'VIEW YOUR GMAIL!');
                    return Redirect::to('SignUp');
                }
            } catch (QueryException $e) {
                return $e;
            }
        }
    }
}
