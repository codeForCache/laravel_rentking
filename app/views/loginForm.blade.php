@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-pencil fa-fw fa-lg"></i> <span>Account Login</span></div>
		<!-- <div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> Add A Unit</a></div> -->
	</div>
	<!-- register -->
	<div class="login_form">
		{{ Form::open(array('url' => 'login', 'id' => 'login_form', 'name' => 'login_form')) }}

		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>User Account Login</h3>
			<h4>Please fill in your details:</h4>
			<p>RentKing site access:</p>

			{{Form::text('user_name', '',  array('placeholder' => 'username', 'autocomplete' => 'on',))}}				
			{{$errors->first('user_name','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

			{{ Form::password('password', array('placeholder' => 'password', 'id' => 'password')) }}				
			{{$errors->first('password','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

		</fieldset>                  

		{{ Form::button('Login! Start using RentKing!', array('class' => 'btn', 'type' => 'submit')) }}		
		
		<div class="createAcc">
		{{ HTML::link("users/create",'Create New Account!', array('class' => 'btn ')) }}
		</div>	

		{{ Form::close()}}

		<h3>{{Session::get('successMessage')}}</h3>
	</div>
	<!-- /register -->


</div>

	
@stop