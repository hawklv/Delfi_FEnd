<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Redirect;
use Validator;
use Hash;
use Session;

class MainController extends Controller
{
	/*--Show login form*/
    public function showLogin()
    {
    	return view('login_page');
    }


    /*--Login function*/
     public function login(Request $request)
     {
     		$mask = array(
				'email'    => 'required|email', 
				'password' => 'required|alphaNum|min:3' );

     		$validator = Validator::make($request->all(), $mask);

  			$loginData = array(
				'email' 	=> $request->input('email'),
				'password' 	=> $request->input('password')
			);
			if ($validator->fails()) {
				return Redirect::to('login')->withErrors($validator) ->withInput( $request->except('password'));
			} else {

	  			if (Auth::attempt(['email' => $loginData['email'],
	  				'password' => $loginData['password']])) {
					return Redirect::to('workspace');
					
				} else {
					return Redirect::to('login');
				}
			}
	}
	public function logout()
	{
		//Auth::logout();
		Session::flush();
		return Redirect::to('login');
	}
	
}
