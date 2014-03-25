<?php

class Performer extends Eloquent {

	protected $guarded = array('id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'performers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');

	public function getLocationAttribute() {
		return URL::to('api/v1/performers/' . $this->id);
	}

	// public function actor() {
	// 	return $this->belongsTo('Actor');
	// }
	
	// public function content() {
	// 	return $this->belongsTo('Content');
	// }
	
}