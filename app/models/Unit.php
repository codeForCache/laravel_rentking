<?php
class Unit extends Eloquent{
	public function user(){
		return $this->belongsTo("User");
	}

	public function leases(){
		return $this->hasMany("Lease");
	}

	public function workorders(){
		return $this->hasMany("Workorder");
	}

	protected $fillable = array('user_id', 'street', 'apt_number', 'city', 'postal_code', 'extra_info', 'unit_type', 'bedrooms'
		, 'bathrooms', 'square_meterage', 'emergency_contact', 'unit_owner', 'desired_rent', 'bank_account', 'unit_image');
}

	
?>