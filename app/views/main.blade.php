@extends('includes.template')

@section('content')
<div id="main">
	<div id="crumb">
		<div class="heading"><i class="fa fa-home fa-fw fa-lg"></i> <span>Units & Tenants</span></div>
		<div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> <span>Add A Unit</span></a></div>
	</div>
	<!-- unit -->
	
	<div class="unit_panel"> 
		<div class="unit_id pointer">
			<div class="id"><i class="fa fa-eye fa-fw fa-lg"></i> View Unit ID: 779</div>
			<div class="tenant_count">4: Tenants Found</div>
		</div>               
		<div class="unit_container">
			<div class="unit_image"><img src="" alt="unit image" width="150px" height="150px"></div>
			<div class="unit_info">
				<p>Address line 1: 21 lorem street</p>
				<p>Address line 2: 0505, City</p>
				<p>Unit Details: <span>3br/1ba</span>, <span>999/m²</span> </p>
				<hr>
				<p>2: Tenants</p>
				<p>3: Active Work Orders</p>
			</div>
			<div class="unit_income">
				<hr>
				<p>$ Toal Receivable /month</p>
				<p>Lease Renewal: Nov 21, 2016</p>
				<p>Desired Rent: $ 800.00 /month</p>
			</div>
		</div>
		<div class="edit_unit">
			<div class="heading">Edit This Unit <i class="fa fa-pencil-square-o"></i></div>
			<div class="action"><a href="#"><i class="fa fa-plus-square fa-fw fa-lg"></i> Add Tenant(s)</a></div>
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

@stop