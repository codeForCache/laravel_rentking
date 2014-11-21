@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-user fa-fw fa-lg"></i> <span>Manage Your Account</span></div>
		<!-- <div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> Add A Unit</a></div> -->
	</div>
	<!-- register -->
	<div class="account_form">
		{{ Form::open(array('url' => 'edit', 'id' => 'account_form', 'name' => 'account_form')) }}		
		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>View & Manage Account Settings</h3>
			<h4>Please update your details below:</h4>				

			<p>Account Details:</p>
			{{Form::text('first_name', $user->first_name,  array('placeholder' => 'first name', 'autocomplete' => 'on', 'id' => 'firstname'))}}				

			{{Form::text('last_name', $user->last_name,  array('placeholder' => 'last name', 'autocomplete' => 'on', 'id' => 'lastname'))}}

			{{Form::email('email', $user->email,  array('placeholder' => 'email address*', 'autocomplete' => 'on', 'id' => 'email'))}}				
			{{$errors->first('email','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

			{{Form::text('phone', $user->phone,  array('placeholder' => 'phone number', 'autocomplete' => 'on', 'id' => 'phone'))}}				

		</fieldset> 
		<fieldset>                   
			<p>RentKing site access:</p>
			{{Form::text('user_name', $user->user_name,  array('placeholder' => 'username*', 'autocomplete' => 'off',))}}				
			{{$errors->first('user_name','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

			{{ Form::password('password', array('placeholder' => 'password*', 'autocomplete' => 'off', 'id' => 'password')) }}				
			{{$errors->first('password','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

			{{Form::password('password_confirmation', array('placeholder' => 'password confirmation*', 'autocomplete' => 'off', 'id' => 'password_confirmation'))}}


		</fieldset>
		<fieldset>                   
			<p>Company Info:</p>				
			{{Form::text('company_name', $user->company_name,  array('placeholder' => 'company name/dba', 'id' => 'company_name'))}}

		</fieldset>


		{{ Form::button('Save Updated Credentials!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}
		
	</div>
	<!-- /register -->


</div>


@stop