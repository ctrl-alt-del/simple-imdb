<?php

class ActorContent extends Eloquent {

	protected $guarded = array('id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actor_content';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');

	public function getLocationAttribute() {
		return URL::to('api/v1/actor_content/' . $this->id);
	}

	// public function actor() {
	// 	return $this->belongsTo('Actor');
	// }
	
	// public function content() {
	// 	return $this->belongsTo('Content');
	// }
	
}