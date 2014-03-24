<?php

class ActorSet extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'actorsets';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');

	public function getLocationAttribute() {
		return URL::to('api/v1/actorsets/' . $this->id);
	}

    public function content() {
        return $this->belongsTo('Content');
    }

    public function actors() {
        return $this->hasMany('Actor');
    }
}