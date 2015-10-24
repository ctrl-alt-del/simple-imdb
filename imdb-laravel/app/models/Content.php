<?php

class Content extends Eloquent {

	protected $guarded = array('id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contents';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');
	

	public function getLocationAttribute() {
		return URL::to('api/v1/contents/' . $this->id);
	}

	public function firms() {
		return $this->belongsToMany('Firm');
	}

	public function actors() {
		return $this->belongsToMany('Actor');
	}

	public function getNumberOfFirmsAttribute() {
		return count($this->firms);
	}

	public function getNumberOfActorsAttribute() {
		return count($this->actors);
	}

}