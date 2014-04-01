<?php

class ActorsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$actors = Actor::all();
		return Response::json($actors);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$data = array(
			'fname' => Input::get('fname'),
			'lname' => Input::get('lname'),
			);

		$rules = array(
			'fname' => 'required_if:lname,null',
			'lname' => 'required_if:fname,null',
			);

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Response::json(
				array(
					'code' 		=> '400',
					'message' 	=> 'Oops, cannot add actor to database.',
					'data' 		=> '',
					));
		} else {

			$actor = new Actor;
			$actor->fname = Input::get('fname');
			$actor->lname = Input::get('lname');
			$actor->save();

			return Response::json(
				array(
					'code' 		=> '200',
					'message' 	=> 'Actor is registered, thank you!',
					'data' 		=> '',
					));
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$actor = Actor::findOrFail($id);
		return Response::json($actor);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$data = array(
			'fname' => Input::get('fname'),
			'lname' => Input::get('lname'),
			);

		$rules = array(
			'fname' => 'required_if:lname,null',
			'lname' => 'required_if:fname,null',
			);

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Response::json(
				array(
					'code' 		=> '400',
					'message' 	=> 'Oops, no info is given to update.',
					'data' 		=> '',
					));
		} else {
			$actor = Actor::findOrFail($id);
			$actor->fname = Input::get('fname');
			$actor->lname = Input::get('lname');
			$actor->save();

			return Response::json(
				array(
					'code' 		=> '200',
					'message' 	=> 'Actor is updated, thank you!',
					'data' 		=> '',
					));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$actor = Actor::findOrFail($id);
		$actor->delete();

		return Response::json(array(
			'error' 	=> false,
			'type' 		=> '200',
			'message' 	=> 'actor has deleted',
			));
	}

}