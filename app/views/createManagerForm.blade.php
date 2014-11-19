@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-pencil fa-fw fa-lg"></i> <span>Account Registration</span></div>
		<!-- <div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> Add A Unit</a></div> -->
	</div>
	<!-- register -->
	<div class="registration">
		{{ Form::open(array('url' => 'users', 'id' => 'registration_form', 'name' => 'registration_form')) }}		
			<fieldset>
				<!-- <legend>Registration</legend> -->
				<h3>Manager Account Registration</h3>
				<h4>Please fill in your details:</h4>
				<p>RentKing site access:</p>
				
				{{Form::text('username', '',  array('placeholder' => 'username', 'autocomplete' => 'off', 'name' => 'username', 'id' => 'username'))}}				
				<!-- {{$errors->first('username','<span id="username_error"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}} -->
				
				
				{{Form::password('password', '',  array('placeholder' => 'password', 'autocomplete' => 'off', 'name' => 'password', 'id' => 'password'))}}
				<!-- <span id="password_error"></span> -->

				
				{{Form::password('password_confirmation', '',  array('placeholder' => 'password confirmation', 'autocomplete' => 'off', 'name' => 'password_confirmation', 'id' => 'password_confirmation'))}}
				<!-- <span id="confirm_error"></span>  -->                            
			</fieldset>
			<fieldset>                   
				<p>What is your name?</p>

				<input type="text" name="firstname" id="firstname" autocomplete="on" placeholder="first name" />
				<span id="firstname_error"></span>  

				<input type="text" name="lastname" id="lastname" autocomplete="on" placeholder="last name" />
				<span id="lastname_error"></span>                          
			</fieldset>
			<fieldset>                   
				<p>Company Info:</p>

				<input type="text" name="company_name" id="company_name" autocomplete="off" placeholder="company name/dba" />
				<span id="company_error"></span>        
			</fieldset>
			<fieldset>                   
				<p>Your contact info:</p>

				<input type="email" name="email" id="email" autocomplete="on" placeholder="email address" />
				<span id="email_error"></span>

				<input type="tel" name="phone" id="phone" autocomplete="on" placeholder="phone number" />
				<span id="phone_error"></span>                            
			</fieldset>
			<button  type="submit" class="btn">All done. Start using RentKing!</button>


		{{ Form::close()}}
		
	</div>
	<!-- /register -->


</div>

	
@stop