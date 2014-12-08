@extends('includes.template')

@section('content')
<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-cogs fa-fw fa-lg"></i> <span>View Work Order:</span></div>
		<div class="action"><a href="{{URL::to('units')}}"><i class="fa fa-eye fa-fw fa-lg"></i> View All Units</a></div>
	</div>


	<!-- unit -->
	@foreach($units as $unit)	
	<div class = "uAndT">
		<div class="unit_panel"> 
			<div class="unit_id pointer">				
				<div class="id"><i class="fa fa-eye fa-fw fa-lg"></i> View WO ID: {{$unit->workorders->id}}</div>
				<div class="tenant_count">{{$unit->workorders()->count()}}: WO Found</div>
			</div>               
			<div class="unit_container">
				<div class="unit_image">					
					{{ HTML::image('img/unit_images/'.$unit->unit_image, 'unit image', array('width' => '150px', 'height' => '150px')) }}
				</div>
				<div class="unit_info">
					<p><span class = "bold">Unit Owner</span>: {{$unit->unit_owner}}</p>
					<p><span class = "bold">Unit Type</span>: {{$unit->unit_type}}</p>
					<p><span class = "bold">Street Address</span>: {{$unit->street}}</p>
					<hr>	
					

				</div>
				<div class="unit_income">
					<p><span class = "bold">{{$unit->workorders()->count()}}</span>: Active Work Orders</p>
					<p><span class = "bold">Priority</span>: {{$unit->workorders->priority}}</p>
					<hr>
				</div>

			</div>
			
			<div class="tenant_control self_clear">                    
				<div class="list_left">
					<ul>
						<li><a href="{{URL::to('units/'.$unit->id.'/edit')}}"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>Edit This Unit</a></li>							
						<!-- <li><a href="{{URL::to('leases/create?unitid='.$unit->id)}}"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>Edit Unit Leases</a></li> -->					
					</ul>                        
				</div>
				<div class="list_right">
					<ul>                            
						<li><a href="{{URL::to('leases/create?unitid='.$unit->id)}}"><i class="fa fa-plus-square fa-fw fa-lg"></i>Add Lease(s)</a></li>
						<li><a href="{{URL::to('workorders/create?unitid='.$unit->id)}}"><i class="fa fa-cogs fa-fw fa-lg"></i>Create Work Order</a></li>
					</ul>                        
				</div>
			</div>                              
		</div>		
		<!-- /unit -->
			

		
		
	</div>
	@endforeach



</div>

@stop