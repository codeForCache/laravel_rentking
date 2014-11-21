@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-plus-square fa-fw fa-lg"></i> <span>Add A Unit</span></div>
        <div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> Add A Unit</a></div>
	</div>
	<!-- register -->
	<div class="unit_form">
		{{ Form::open(array('url' => 'edit', 'id' => 'unit_form', 'name' => 'unit_form')) }}		
		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>Adding A New Unit</h3>
            <h4>Please enter details to create a new unit:</h4>			

		</fieldset> 
		<fieldset>                   
			<p>Unit Address:</p> 
				{{Form::text('street', '',  array('placeholder' => 'street*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('street','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}                           
                
                {{Form::text('apt_number', '',  array('placeholder' => 'Apt./Suite./Etc.', 'autocomplete' => 'off'))}}				
				{{$errors->first('apt_number','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
				{{Form::text('city', '',  array('placeholder' => 'city*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('city','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
				{{Form::text('postal_code', '',  array('placeholder' => 'postal code*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('postal_code','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
				{{Form::text('extra_info', '',  array('placeholder' => 'extra info', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('extra_info','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                

		</fieldset>
		<fieldset>
			<p>Unit Details:</p>
			{{ Form::select('unit_type',  
				array(
				0 => '~~~~ Select Unit Type* ~~~~',
				  'Single-family' => array('Farm'=>'Farm','House'=>'House','Houseboat'=>'Houseboat','Lot'=>'Lot','Mobile'=>'Mobile','Single-Family'=>'Single-Family','Townhouse'=>'Townhouse'),
				  'Multi-family' => array('Apartment'=>'Apartment', 'Multi-family'=>'Multi-family', 'Studio'=>'Studio'),
				  'Commercial' => array('Commercial'=>'Commercial','Industrial'=> 'Industrial', 'Office'=>'Office', 'Retail'=>'Retail', 'Warehouse'=>'Warehouse'),
				),'0',
				array('class' => 'unit_type')
			)}}
			
			{{Form::number('bedrooms', '',  array('placeholder' => 'bedrooms', 'autocomplete' => 'off'))}}				
			{{$errors->first('bedrooms','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::number('bathrooms', '',  array('placeholder' => 'bathrooms', 'autocomplete' => 'off'))}}				
			{{$errors->first('bathrooms','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::number('square_meterage', '',  array('placeholder' => 'square meterage m²', 'autocomplete' => 'off'))}}				
			{{$errors->first('square_meterage','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::text('emergency_contact', '',  array('placeholder' => 'emergency contact #', 'autocomplete' => 'off'))}}				
			{{$errors->first('emergency_contact','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}		                           
		</fieldset>

		<fieldset>                   
			<p>Property Management:</p>
			
			{{Form::text('unit_owner', '',  array('placeholder' => 'unit owner*', 'autocomplete' => 'off', 'required' => 'required'))}}				
			{{$errors->first('unit_owner','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			
			{{Form::number('desired_rent', '',  array('placeholder' => 'desired monthly rent $__', 'autocomplete' => 'off'))}}				
			{{$errors->first('desired_rent','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			         
		</fieldset>

		<fieldset>                   
			<p>Bank Accounts:</p>
			
			{{Form::text('bank_account', '',  array('placeholder' => 'operating bank account', 'autocomplete' => 'off', 'required' => 'required'))}}				
			{{$errors->first('bank_account','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			       
		</fieldset>

		<fieldset>                   
			<p>Unit Photo:</p>

			<div class="unit_image" id="upload_unit_image"><img src="" alt="unit image" width="150px" height="150px"></div>
			
			{{Form::file('unit_image', '',  array('placeholder' => 'unit image', 'name' => 'unit_image', 'id' => 'unit_image'))}}				
			{{$errors->first('unit_image','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			         
		</fieldset>


		{{ Form::button('Add This Unit Now!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}
		
	</div>
	<!-- /register -->


</div>


@stop