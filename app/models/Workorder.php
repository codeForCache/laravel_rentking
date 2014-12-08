<?php
class Workorder extends Eloquent{
	public function user(){
		return $this->belongsTo("User");
	}

	public function unit(){
		return $this->belongsTo("Unit");
	}

	public function replies(){
		return $this->hasMany("Reply");
	}

	protected $fillable = array('unit_id','user_id', 'description', 'priority');
	
}

	
?>