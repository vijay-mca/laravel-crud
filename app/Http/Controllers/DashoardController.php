<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
class DashoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();
        return view('dashboard',["users"=>$user]);
    }

    public function getUser()
    {
        $currentUser = User::find(Auth::id());
        return view('profile',["user"=>$currentUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', Auth::id())->first();
        return view('editAccount',["user"=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $id = $request->get('id');
        $rules = array(
            'firstName'     => 'required',
            'lastName'      => 'required',
            'gender'        => 'required',
            'email'         => 'required|email',
        );

        $messages = [
            'firstName.required'    => 'First Name is Required.',
            'lastName.required'     => 'Last Name is Required.',
            'gender.required'       => 'Gender is Required.',
            'email.required'        => 'Email is Required.',
            'email.email'           => 'Invalid Email ID',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return Redirect::to("/user/$id/edit")
                ->withInput()
                ->withErrors($validator);
        } else {
            try {
                $firstName = $request->input('firstName');
                $lastName = $request->input('lastName');
                $email = $request->input('email');
                $gender = $request->input('gender');
    
                $user =User::find($id);
                $user->firstName = $firstName;
                $user->lastName = $lastName;
                $user->email = $email;
                $user->gender = $gender;
                $result = $user->save();
                if($result) {
                    Session::flash('message', 'Record Updated!'); 
                    return Redirect::to('Dashboard');
                }
            } catch (QueryException $e) {
                return $e;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where("id",$id);
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the record!');
        return Redirect::to('Dashboard');
    }

    public function doSignOut()
    {
        Auth::logout();
            return Redirect::to('SignIn');
    }
}
