<?php

class Content extends Eloquent {

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

    public function actorsets() {
		return $this->hasMany('ActorSet');
	}

	public function producersets() {
		return $this->hasMany('ProducerSet');
	}
}