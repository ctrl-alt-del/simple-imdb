<?php

class Actor extends Eloquent {

	protected $guarded = array('id');
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
	protected $appends = array('location', 'number_of_contents');
	
    
    public function getLocationAttribute() {
        return URL::to('api/v1/actors/' . $this->id);
    }

	public function contents() {
		return $this->belongsToMany('Content');
	}

	public function getNumberOfContentsAttribute() {
		return count($this->contents);
	}
}