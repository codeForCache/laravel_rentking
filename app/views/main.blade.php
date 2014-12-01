@extends('includes.template')

@section('content')
<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-home fa-fw fa-lg"></i> <span>Units & Tenants</span></div>
		<div class="action"><a href="{{URL::to('units/create')}}"><i class="fa fa-plus-square fa-fw fa-lg"></i> <span>Add A Unit</span></a></div>
	</div>


	<!-- unit -->
	@foreach($units as $unit)	
	<div class = "uAndT">
		<div class="unit_panel"> 
			<div class="unit_id pointer">				
				<div class="id"><i class="fa fa-eye fa-fw fa-lg"></i> View Unit ID: {{$unit->id}}</div>
				<div class="tenant_count">{{$unit->leases()->count()}}: Tenants Found</div>
			</div>               
			<div class="unit_container">
				<div class="unit_image">					
					{{ HTML::image('img/unit_images/'.$unit->unit_image, 'unit image', array('width' => '150px', 'height' => '150px')) }}
				</div>
				<div class="unit_info">
					<p><span class = "bold">Unit Owner</span>: {{$unit->unit_owner}}</p>
					<p><span class = "bold">Unit Type</span>: {{$unit->unit_type}}</p>
					<hr>
					
					<p><span class = "bold">Street Address</span>: {{$unit->street}}</p>
					<p><span class = "bold">Postal & City</span>: {{$unit->postal_code}}, {{$unit->city}}</p>					
					<p><span class = "bold">Extra Info</span>: {{$unit->extra_info}}</p>
					<p><span class = "bold">Emergency Contact</span>: {{$unit->emergency_contact}}</p>
					<hr>
					<p><span class = "bold">Unit Details</span>: <span>{{$unit->bedrooms}}br/{{$unit->bathrooms}}ba</span>, <span>{{$unit->square_meterage}}m²</span> </p>
					<p><span class = "bold">{{$unit->leases()->count()}}</span>: Tenants</p>
					<p><span class = "bold">{{$unit->workorders()->count()}}</span>: Active Work Orders</p>

				</div>
				<div class="unit_income">
					<hr>
					<p><span class = "bold">Unit Income</span>: $ {{$unit->leases()->sum('rent_amount')}}/month</p>
					
					<p><span class = "bold">Desired Rent</span>: $ {{$unit->desired_rent}} /month</p>
				</div>
			</div>
			<!-- <div class="edit_unit">
				<div class="heading"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>{{HTML::link('units/'.$unit->id.'/edit', 'Edit This Unit')}} </div>
				<div class="action"><i class="fa fa-plus-square fa-fw fa-lg"></i>{{HTML::link('leases/create?unitid='.$unit->id, 'Add Lease(s)')}} </div>
			</div> -->
			<div class="tenant_control self_clear">                    
				<div class="list_left">
					<ul>
						<li><a href="{{URL::to('units/'.$unit->id.'/edit')}}"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>Edit This Unit</a></li>
						
					</ul>                        
				</div>
				<div class="list_right">
					<ul>                            
						<li><a href="{{URL::to('leases/create?unitid='.$unit->id)}}"><i class="fa fa-plus-square fa-fw fa-lg"></i>Add Lease(s)</a></li>
						<li><a href="{{URL::to('leases/create?unitid='.$unit->id)}}"><i class="fa fa-plus-square fa-fw fa-lg"></i>Edit This Lease</a></li>
					</ul>                        
				</div>
			</div>                              
		</div>		
		<!-- /unit -->
		
		
		<!-- tenant -->
		
		<div class="tenant_panel">
			<div class="tenant_container">
				<div class="tenant_image"><img src="" alt="tenant image" width="150px" height="150px"></div>
				<div class="tenant_info">
					<p>Tenant Name: Bob Smith</p>
					<p>Email: blah@blah.bleh</p>
					<p>Phone: 021 564 6789</p>                                         
				</div>
				<div class="tenant_dues">
					<hr>
					<p>$ 280.00 - DUE; <span>Weekly</span></p>

					<p>Due On: Nov 21, 2016</p>
					<p>Lease Renewal: Nov 21, 2016</p>
				</div>
			</div> 
			<div class="tenant_control self_clear">                    
				<div class="list_left">
					<ul>
						<li><a href="#"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i>Edit Tenant</a></li>
						<li><a href="#"><i class="fa fa-usd fa-fw fa-lg"></i>Record Payment</a></li>                            
						<li><a href="#"><i class="fa fa-credit-card fa-fw fa-lg"></i>Add/Adjust Charges</a></li>
					</ul>                        
				</div>
				<div class="list_right">
					<ul>                            
						<li><a href="#"><i class="fa fa-user fa-fw fa-lg"></i>View Profile</a></li>
						<li><a href="#"><i class="fa fa-at fa-fw fa-lg"></i>Email/Message</a></li>
						<li><a href="#"><i class="fa fa-share-square fa-fw fa-lg"></i>Move Out</a></li>                         
						<li><a href="#"><i class="fa fa-times fa-fw fa-lg"></i>Remove Tenant</a></li>
					</ul>                        
				</div>
			</div>              
		</div>
		

		
		<!-- /tenant -->
	</div>
	@endforeach



</div>

@stop