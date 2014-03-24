<?php

class ActorSet extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producersets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');

	public function getLocationAttribute() {
		return URL::to('api/v1/producersets/' . $this->id);
	}

    public function content() {
        return $this->belongsTo('Content');
    }

    public function producers() {
        return $this->hasMany('Producers');
    }
}