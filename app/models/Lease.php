<?php
class Lease extends Eloquent{
	public function user(){
		return $this->belongsTo("User");
	}

	public function unit(){
		return $this->belongsTo("Unit");
	}
	
}

	
?>