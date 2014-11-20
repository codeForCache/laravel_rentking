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
				

				{{Form::text('user_name', '',  array('placeholder' => 'username*', 'autocomplete' => 'off',))}}				
				{{$errors->first('user_name','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
				
				{{ Form::password('password', array('placeholder' => 'password*', 'autocomplete' => 'off', 'id' => 'password')) }}				
				{{$errors->first('password','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
				
				{{Form::password('password_confirmation', array('placeholder' => 'password confirmation*', 'autocomplete' => 'off', 'id' => 'password_confirmation'))}}
				                           
			</fieldset> 
			<fieldset>                   
				<p>What is your name?</p>
				
				{{Form::text('first_name', '',  array('placeholder' => 'first name', 'autocomplete' => 'on', 'id' => 'firstname'))}}				
				
				
				{{Form::text('last_name', '',  array('placeholder' => 'last name', 'autocomplete' => 'on', 'id' => 'lastname'))}}				
				                         
			</fieldset>
			<fieldset>                   
				<p>Company Info:</p>

				
				{{Form::text('company_name', '',  array('placeholder' => 'company name/dba', 'id' => 'company_name'))}}
				       
			</fieldset>
			<fieldset>                   
				<p>Your contact info:</p>
				
				{{Form::email('email', '',  array('placeholder' => 'email address*', 'autocomplete' => 'on', 'id' => 'email'))}}				
				{{$errors->first('email','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
				
				{{Form::text('phone', '',  array('placeholder' => 'phone number', 'autocomplete' => 'on', 'id' => 'phone'))}}				
				                         
			</fieldset>
			
			{{ Form::button('All done. Start using RentKing!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}
		
	</div>
	<!-- /register -->


</div>

	
@stop