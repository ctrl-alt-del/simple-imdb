<?php

class ContentFirm extends Eloquent {

	protected $guarded = array('id');
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'content_firm';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at','updated_at');
	protected $appends = array('location');
	
    
    public function getLocationAttribute() {
        return URL::to('api/v1/content_firm/' . $this->id);
    }

    public function includeProducersets() {
        $this->hidden = array_diff($this->hidden, array('firms'));
    }

	public function firms() {
		return $this->hasMany('Firm');
	}
}