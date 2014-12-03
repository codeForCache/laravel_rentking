@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-plus-square fa-fw fa-lg"></i> <span>View Lease For</span></div>
        <div class="action"><a href="{{URL::to('leases/create')}}"><i class="fa fa-eye fa-fw fa-lg"></i> View All Units</a></div>
	</div>
	<!-- register -->
	<div class="unit_form">
		{{ Form::open(array('url' => 'leases/'.$lease->id ,'id' => 'unit_form', 'name' => 'unit_form')) }}

		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>View Lease for:</h3>
            <h4>Review Lease Details:</h4>			

		</fieldset>

		<fieldset>     

			<p>Unit Photo:</p>
			
			<div class="unit_image" id="upload_unit_image">	
				{{ HTML::image('img/unit_images/'.$lease->unit->unit_image, 'unit image', array('width' => '150px', 'height' => '150px')) }}
			</div>
				
			<div class="unit_info">				
			<p><span class = "bold">Street Address</span>: {{$lease->unit->street}}</p>
			</div>	

		</fieldset>	

		<fieldset>                   
			<h4>Rent / Billing :</h4> 
				{{Form::label('rent_amount', 'Rent Amount:')}}
				{{Form::text('rent_amount', $lease->rent_amount,  array('placeholder' => '$__rent amount', 'autocomplete' => 'off', 'readonly' => 'true'))}}				
				{{$errors->first('rent_amount','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}                           
                
                {{Form::label('bond', 'Bond:')}}
                {{Form::text('bond', $lease->bond,  array('placeholder' => 'bond amount.', 'autocomplete' => 'off', 'readonly' => 'true'))}}				
				{{$errors->first('bond','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
                
				                

		</fieldset>
		<fieldset>
			<p>Time Duration:</p>
						
			{{ Form::select('recurring',  
				array(
				0 => '~~~~ Select Rent Period ~~~~',
				  'Recurring' => array('Weekly'=>'Weekly','Fortnightly'=>'Fortnightly','Monthly'=>'Monthly'),
				  
				),'0',
				array('class' => 'recurring')
			)}}							
			{{$errors->first('recurring','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			

			{{Form::label('lease_start', 'Lease Start:')}}	
			{{Form::text('lease_start', '',  array('placeholder' => 'lease start', 'autocomplete' => 'off', 'readonly' => 'true'))}}				
			{{$errors->first('lease_start','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

			
			{{Form::label('lease_end', 'Lease End:')}}	
			{{Form::text('lease_end', '',  array('placeholder' => 'lease end', 'autocomplete' => 'off', 'readonly' => 'true', 'class' => 'datepicker'))}}				
			{{$errors->first('lease_end','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}


		</fieldset>		
		


		{{ Form::button('Edit This Lease!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}

		<h3>{{Session::get('successMessage')}}</h3>
		
	</div>
	<!-- /register -->


</div>


@stop