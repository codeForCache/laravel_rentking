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
			"username" => "required|unique:users",
			"password" => "required|confirmed",
			"password_confirmation" => "required",			
			"email" => "email|unique:users",
			
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

			//redirect home page
			return Redirect::to("main");
			

		}
	
	});
//------------------Validate new user creation-------------------------------------		
