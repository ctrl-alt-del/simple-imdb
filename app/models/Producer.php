<?php

class Producer extends Eloquent {

	protected $guarded = array('id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'producers';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');
	
    
    public function getLocationAttribute() {
        return URL::to('api/v1/producers/' . $this->id);
    }

    public function includeProducersets() {
        $this->hidden = array_diff($this->hidden, array('firms'));
    }

	public function firms() {
		return $this->hasMany('Firm');
	}
}