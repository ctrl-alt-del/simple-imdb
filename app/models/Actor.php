<?php

class Actor extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actors';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');
	
    
    public function getLocationAttribute() {
        return URL::to('api/v1/actors/' . $this->id);
    }

    public function contents() {
		return $this->hasMany('Content');
	}
}