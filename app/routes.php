<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
	return View::make('main'); 
});


//------------------Create New Manager Form-------------------------------------
	Route::get('users/create', function(){

	return View::make("createManagerForm");
	
	});
//------------------Create New Manager Form-------------------------------------



//------------------Validate new user creation-------------------------------------
	Route::post('users', function(){

	//validate input
		$aRules = array(
			"user_name" => "required|unique:users",
			"password" => "required|confirmed",
			"password_confirmation" => "required",			
			"email" => "required|email|unique:users",			
			);


		$oValidator = Validator::make(Input::all(),$aRules);

		if($oValidator->fails()){
			//redirect to users/create with sticky data and errors messages
			return Redirect::to("users/create")->withErrors($oValidator)
											->withInput();
		}else{
			//create new user
			$aDetails = Input::all();			
			$aDetails["password"] = Hash::make($aDetails["password"]);
			User::create($aDetails);

			//redirect main view page
			return Redirect::to("/");
			

		}
	
	});
//------------------Validate new user creation-------------------------------------


//------------------Create Login Form-------------------------------------
	Route::get('login', function() {

	return View::make("loginForm");
	
	});
//------------------Create Login Form-------------------------------------	


//------------------User Login Auth-------------------------------------
	Route::post('login', function(){

	$aLoginDetails = array(
		'user_name' => Input::get('user_name'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($aLoginDetails)){
		//redirect to user home page
		//ideally should redirect back to origin
		return Redirect::intended("/");
	}else{
		//send back to login page with errors
		return Redirect::to("login")->with("error","Login Failed! Try again.");
	}
	
	});
//------------------User Login Auth-------------------------------------


//------------------Log Out-------------------------------------
	Route::get('logout', function() {

	Auth::logout();
	return Redirect::to('login');
	
	});
//------------------Log Out-------------------------------------


//------------------Get Logged user and edit details data-------------------------------------
	Route::get('users/{id}/edit', function($id) {

	if($id != Auth::user()->id){
		return Redirect::to('login');
	}

	$oUser = User::find($id);

	return View::make("editAccountForm")->with("user",$oUser);

	});
//------------------Get Logged user and edit details data-------------------------------------	
