<?php
class Reply extends Eloquent{
	public function user(){
		return $this->belongsTo("User");
	}

	public function workorder(){
		return $this->belongsTo("Workorder");
	}	
	
}

	
?>