@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i> <span>Edit This Unit</span></div>
        <div class="action"><a href="{{URL::to('units/')}}"><i class="fa fa-eye fa-fw fa-lg"></i> View All Units</a></div>
	</div>
	<!-- register -->
	<div class="unit_form">
		{{ Form::open(array('url' => 'units/'.$unit->id, 'files'=>'true', 'method'=>'put', 'id' => 'unit_form', 'name' => 'unit_form')) }}		
		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>Edit this unit below</h3>
            <h4>Please enter details you wish to change:</h4>			

		</fieldset> 
		<fieldset>                   
			<p>Unit Address:</p> 
				{{Form::label('street', 'street*:')}}
				{{Form::text('street', $unit->street,  array('placeholder' => 'street*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('street','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}                           
                
                {{Form::label('apt_number', 'Apt./Suite./Etc:')}}
                {{Form::text('apt_number', $unit->apt_number,  array('placeholder' => 'Apt./Suite./Etc.', 'autocomplete' => 'off'))}}				
				{{$errors->first('apt_number','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
                {{Form::label('city', 'city*:')}}
				{{Form::text('city', $unit->city,  array('placeholder' => 'city*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('city','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
                {{Form::label('postal_code', 'postal code*:')}}
				{{Form::text('postal_code', $unit->postal_code,  array('placeholder' => 'postal code*', 'autocomplete' => 'off', 'required' => 'required'))}}				
				{{$errors->first('postal_code','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
                {{Form::label('extra_info', 'extra info:')}}
				{{Form::text('extra_info', $unit->extra_info,  array('placeholder' => 'extra info', 'autocomplete' => 'off'))}}				
				{{$errors->first('extra_info','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                

		</fieldset>
		<fieldset>
			<p>Unit Details:</p>

			{{Form::label('unit_type', 'Unit Type:')}}
			{{ Form::select('unit_type',  
				array(
				0 => '~~~~ Select Unit Type* ~~~~',
				  'Single-family' => array('Farm'=>'Farm','House'=>'House','Houseboat'=>'Houseboat','Lot'=>'Lot','Mobile'=>'Mobile','Single-Family'=>'Single-Family','Townhouse'=>'Townhouse'),
				  'Multi-family' => array('Apartment'=>'Apartment', 'Multi-family'=>'Multi-family', 'Studio'=>'Studio'),
				  'Commercial' => array('Commercial'=>'Commercial','Industrial'=> 'Industrial', 'Office'=>'Office', 'Retail'=>'Retail', 'Warehouse'=>'Warehouse'),
				),'0',
				array('class' => 'unit_type', 'required' => 'required')
			)}}
			
			{{Form::label('bedrooms', 'bedrooms:')}}
			{{Form::number('bedrooms', $unit->bedrooms,  array('placeholder' => 'bedrooms', 'autocomplete' => 'off'))}}				
			{{$errors->first('bedrooms','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::label('bathrooms', 'bathrooms:')}}
			{{Form::number('bathrooms', $unit->bathrooms,  array('placeholder' => 'bathrooms', 'autocomplete' => 'off'))}}				
			{{$errors->first('bathrooms','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::label('square_meterage', 'square meterage m²:')}}
			{{Form::number('square_meterage', $unit->square_meterage,  array('placeholder' => 'square meterage m²', 'autocomplete' => 'off'))}}				
			{{$errors->first('square_meterage','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::label('emergency_contact', 'emergency contact #:')}}
			{{Form::text('emergency_contact', $unit->emergency_contact,  array('placeholder' => 'emergency contact #', 'autocomplete' => 'off'))}}				
			{{$errors->first('emergency_contact','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}		                           
		</fieldset>

		<fieldset>                   
			<p>Property Management:</p>
			
			{{Form::label('unit_owner', 'unit owner*:')}}
			{{Form::text('unit_owner', $unit->unit_owner,  array('placeholder' => 'unit owner*', 'autocomplete' => 'off', 'required' => 'required'))}}				
			{{$errors->first('unit_owner','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			{{Form::label('desired_rent', 'desired monthly rent $__:')}}
			{{Form::number('desired_rent', $unit->desired_rent,  array('placeholder' => 'desired monthly rent $__', 'autocomplete' => 'off'))}}				
			{{$errors->first('desired_rent','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			         
		</fieldset>

		<fieldset>                   
			<p>Bank Accounts:</p>
			

			{{Form::label('bank_account', 'bank account number:')}}
			{{Form::text('bank_account', $unit->bank_account,  array('placeholder' => 'operating bank account', 'autocomplete' => 'off'))}}				
			{{$errors->first('bank_account','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			       
		</fieldset>

		<fieldset>                   
			<p>Unit Photo:</p>
			
			<div class="unit_image" id="upload_unit_image">				
				{{ HTML::image('img/unit_images/'.$unit->unit_image, 'unit image', array('width' => '150px', 'height' => '150px')) }}
			</div>

			
			
			{{Form::file('unit_image', array('placeholder' => 'unit image', 'name' => 'unit_image', 'id' => 'unit_image'))}}				
			{{$errors->first('unit_image','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			         
		</fieldset>		


		{{ Form::button('Save Updated Unit!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}

		<h3>{{Session::get('successMessage')}}</h3>
		
	</div>
	<!-- /register -->


</div>


@stop