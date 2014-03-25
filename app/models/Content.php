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
	protected $appends = array('location', 'number_of_performers', 'number_of_producers');
	

	public function getLocationAttribute() {
		return URL::to('api/v1/contents/' . $this->id);
	}

	public function includePerformers() {
		$this->hidden = array_diff($this->hidden, array('performers'));
	}

	public function performers() {
		return $this->hasMany('Performer');
	}

	public function getNumberOfPerformersAttribute() {
		return count($this->performers);
	}

	public function includeProducers() {
		$this->hidden = array_diff($this->hidden, array('producers'));
	}

	public function producers() {
		return $this->hasMany('Producer');
	}

	public function getNumberOfProducersAttribute() {
		return count($this->producers);
	}
}