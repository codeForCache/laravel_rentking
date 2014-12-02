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

Route::get('/', function(){

	return View::make("main")->with('units',Auth::user()->units);

})->before("auth");


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
	
	})->before("auth");
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
		'user_name' => 'unique:users,user_name,'.$id,
		'email'=>'required|email|unique:users,email,'.$id,
		'password'=>'confirmed',
		'first_name' => 'required|alpha',
		'last_name' => 'required|alpha'	
	);


	$oValidator = Validator::make(Input::all(),$aRules);

	
	if($oValidator->passes()){
		//update user detail
		$oUser = User::find($id);
		$oUser->fill(Input::except('password'));
		$oUser->save();


		if(Input::get('password') != ""){
			$oUser->password = Hash::make(Input::get("password"));
			$oUser->save();
		}

		
		
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
	Route::get('units/create', function(){

	return View::make("addUnitForm");
	
	});
//------------------Get Add Unit Form-------------------------------------



//------------------units create POST route-------------------------------------
	Route::post('units', function(){

		//validate input
		$aRules = array(
			"street"=>"required",
			"city"=>"required",
			"postal_code"=>"required|numeric",
			"unit_type"=>"required",
			"unit_owner"=>"required",
			"unit_image"=>""
			);
		$oValidator = Validator::make(Input::all(),$aRules);

		if($oValidator->passes()){
			//uploading photo
			$sNewName = Input::get("street")."."
							.Input::file("unit_image")->getClientOriginalExtension();
			Input::file("unit_image")->move("img/unit_images",$sNewName);
			

			//post new unit data
			$aDetails = Input::all();
			$aDetails['unit_image'] = $sNewName;
			$aDetails['user_id'] = Auth::user()->id;

			$oUnit = Unit::create($aDetails);

			//redirect to ....
			return Redirect::to("units");
		}else{

			//redirect new unit form with errors and sticky data
			return Redirect::to("units/create")->withErrors($oValidator)->withInput();
		}
	
	})->before("auth");
//------------------units create POST route-------------------------------------	
	


//------------------Get Units-------------------------------------
	Route::get('units', function(){		


	return View::make("main")->with('units',Auth::user()->units);
	

	})->before("auth");

//------------------Get Units-------------------------------------



//------------------Get Edit Unit Form-------------------------------------
	Route::get('units/{id}/edit', function($id) {	

		
		$oUnit = Unit::find($id);
		return View::make("editUnitsForm")->with("unit", $oUnit);

	});
//------------------Get Edit Unit Form-------------------------------------	



//------------------Update Unit Details -Send new form data to DB-------------------------------------
	Route::put('units/{id}', function($id) {

	//validate data
	$aRules = array(
		"street"=>"required",
		"city"=>"required",
		"postal_code"=>"required|numeric",
		"unit_type"=>"required",
		"unit_owner"=>"required"
	);


	$oValidator = Validator::make(Input::all(),$aRules);

	
	if($oValidator->passes()){
		//update user detail

		$aDetails = Input::all();
		$oUnit = Unit::find($id);


		$aDetails['unit_image'] = $oUnit->unit_image;
		$oUnit->fill($aDetails);
		$oUnit->save();		

		if(Input::hasFile("unit_image")){
			Input::file("unit_image")->move("img/unit_images",$oUnit->unit_image);
		}
		
		//redirect to edit page
		return Redirect::to("units/".$id.'/edit')->with('successMessage','Your details have been updated!');

	}else{
		//redirect to editUserForm with sticky input and errors
		return Redirect::to("units/".$id.'/edit')
		->withErrors($oValidator)
		->withInput();
	}

});
//------------------Update Unit Details -Send new form data to DB-------------------------------------		



//------------------Get add leases Form-------------------------------------
	Route::get('leases/create', function(){	


	return View::make("addLeasesForm")->with('unit',Unit::find(Input::get("unitid")));
	
	});
//------------------Get add leases Form-------------------------------------



//------------------leases/create post data-------------------------------------
	Route::post('leases', function(){

	//validate input
		$aRules = array(			
			"rent_amount" => "required"				
			);


		$oValidator = Validator::make(Input::all(),$aRules);


		if($oValidator->passes()){			

			//post new lease data
			$aDetails = Input::all();
			$oLease = Lease::create($aDetails);

			//redirect to ....
			return Redirect::to('units');
		}else{

			//redirect new unit form with errors and sticky data
			return Redirect::to("leases/create?unitid=".Input::get("unit_id"))->withErrors($oValidator)->withInput();
		}
	
	})->before("auth");
//------------------leases/create post data-------------------------------------



//------------------Get Edit Leases Form-------------------------------------
	Route::get('leases/{id}/edit', function($id) {	

		
		$oLease = Lease::find($id);

		return View::make("editLeasesForm")->with("lease", $oLease);

	});
//------------------Get Edit Leases Form-------------------------------------		



//------------------Update Lease Details -Send new form data to DB-------------------------------------
	Route::put('leases/{id}', function($id) {

	//validate data
	$aRules = array(
		"rent_amount" => "required"
	);


	$oValidator = Validator::make(Input::all(),$aRules);

	
	if($oValidator->passes()){
		//update lease detail

		$aDetails = Input::all();
		$oLease = Lease::find($id);

		
		$oLease->fill($aDetails);
		$oLease->save();	
		
		
		//redirect to edit page
		return Redirect::to("leases/".$id.'/edit')->with('successMessage','Your details have been updated!');

	}else{
		//redirect to editUserForm with sticky input and errors
		return Redirect::to("leases/".$id.'/edit')
		->withErrors($oValidator)
		->withInput();
	}

});
//------------------Update Lease Details -Send new form data to DB-------------------------------------	




//------------------Get add workorder Form-------------------------------------
	Route::get('workorders/create', function(){	


	return View::make("addWorkOrderForm")->with('unit',Unit::find(Input::get("unitid")));
	
	});
//------------------Get add workorder Form-------------------------------------


















//------------------test-------------------------------------
	
//------------------test-------------------------------------
