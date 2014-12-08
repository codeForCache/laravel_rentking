@extends('includes/template')

@section('content')

<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-cogs fa-fw fa-lg"></i> <span>Create Work Order</span></div>
        <div class="action"><a href="{{URL::to('units')}}"><i class="fa fa-eye fa-fw fa-lg"></i> View All Units</a></div>
	</div>
	<!-- register -->
	<div class="unit_form">
		{{ Form::open(array('url' => 'workorders','id' => 'unit_form', 'name' => 'unit_form')) }}		
		{{ Form::hidden("unit_id",$unit->id)}}
		<fieldset>
			<!-- <legend>Registration</legend> -->
			<h3>Creating a new work order:</h3>
            <h4>Please enter details to create a new work order:</h4>			

		</fieldset>

		<fieldset>     

			<p>Unit Photo:</p>
			
			<div class="unit_image" id="upload_unit_image">	
				{{ HTML::image('img/unit_images/'.$unit->unit_image, 'unit image', array('width' => '150px', 'height' => '150px')) }}
			</div>
				
			<div class="unit_info">				
			<p><span class = "bold">Street Address</span>: {{$unit->street}}</p>
			</div>	
						         
		</fieldset>	

		<fieldset>	

			<h4>Work Order Details:</h4>

			{{ Form::textarea('description', null, array( 'rows' => '12', 'id' => 'newwo_form', 'placeholder' => 'Describe the problem.' )) }}

			{{$errors->first('description','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}
			
			

		</fieldset>

		
		<fieldset>
			<h4>WO Priority:</h4>
			
						
			{{ Form::select('priority',  
				array(
				0 => '~~~~ Select Priority ~~~~',
				  'Priority' => array('Normal'=>'Normal','High'=>'High','Urgent'=>'Urgent'),
				  
				),'0',
				array('class' => 'recurring')
			)}}							
			{{$errors->first('priority','<span class="errors"><i class="fa fa-exclamation-circle fa-fw fa-lg"></i> :message</span>')}}

		</fieldset>		
		


		{{ Form::button('Create Work Order!', array('class' => 'btn', 'type' => 'submit')) }}

		{{ Form::close()}}
		
	</div>
	<!-- /register -->


</div>


@stop