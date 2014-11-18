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
}

	
?>