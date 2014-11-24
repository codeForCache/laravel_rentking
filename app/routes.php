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
			"user_name" => "required|unique:users|between:2,12",
			"password" => "required|confirmed|min:6",
			"password_confirmation" => "required",			
			"email" => "required|email|unique:users",
			"first_name" => "alpha",
			"last_name" => "alpha"				
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


//------------------Update User Details -Send new form data to DB-------------------------------------
	Route::put('users/{id}', function($id) {

	//validate data
	$aRules = array(
		'user_name' => 'required|unique:users,user_name,'.$id,
		'email'=>'required|email|unique:users,email,'.$id,
		'password'=>'confirmed',
		'first_name' => 'alpha',
		'last_name' => 'alpha'	
	);


	$oValidator = Validator::make(Input::all(),$aRules);

	// print_r(Input::has('password'));
	// die();
	if($oValidator->passes()){
		//update user detail
		$oUser = User::find($id);
		$oUser->fill(Input::except('password'));
		$oUser->save();


		if(Input::get('password') != ""){
			$oUser->password = Hash::make(Input::get("password"));
			$oUser->save();
		}

		// if(Input::get('user_name') != ""){
		// 	$oUser->user_name = Input::get("user_name");
		// 	$oUser->save();
		// }


		
		//redirect to edit page
		return Redirect::to("users/".$id.'/edit')->with('successMessage','Your details have been updated!');

	}else{
		//redirect to editUserForm with sticky input and errors
		return Redirect::to("users/".$id.'/edit')
		->withErrors($oValidator)
		->withInput();
	}

});
//------------------Update User Details -Send new form data to DB-------------------------------------		


	

//------------------Get Add Unit Form-------------------------------------
	Route::get('unit/create', function(){

	return View::make("addUnitForm");
	
	});
//------------------Get Add Unit Form-------------------------------------


//------------------test-------------------------------------
	// Route::post('products', function(){

	// 	//validate input
	// 	$aRules = array(
	// 		"name"=>"required|unique:products",
	// 		"description"=>"required",
	// 		"price"=>"required|numeric",
	// 		"photo"=>"required"
	// 		);
	// 	$oValidator = Validator::make(Input::all(),$aRules);

	// 	if($oValidator->passes()){
	// 	//uploading photo
	// 		$sNewName = Input::get("name")."."
	// 		.Input::file("photo")->getClientOriginalExtension();
	// 		Input::file("photo")->move("productphotos",$sNewName);
	// 	//create new product


	// 		$aDetails = Input::all();
	// 		$aDetails['photo'] = $sNewName;

	// 		$oProduct = Product::create($aDetails);

	// 	//redirect to product list
	// 		return Redirect::to("types/".$oProduct->type_id);
	// 	}else{

	// 	//redirect new product form with errors and sticky data
	// 		return Redirect::to("products/create")->withErrors($oValidator)->withInput();
	// 	}

	// });
//------------------test-------------------------------------
