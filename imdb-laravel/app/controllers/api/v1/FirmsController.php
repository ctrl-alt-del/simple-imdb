<?php

class FirmsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$firms = Firm::all();
		return Response::json($firms);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$data = array(
			'name' => Input::get('name'),
			'quote' => Input::get('quote'),
			);

		$rules = array(
			'quote' => 'required',
			);

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Response::json(
				array(
					'code' 		=> '400',
					'message' 	=> 'Oops, cannot add firm to database.',
					'data' 		=> '',
					));
		} else {

			$firm = new Firm;
			$firm->name = Input::get('name');
			$firm->quote = Input::get('quote');
			$firm->save();

			return Response::json(
				array(
					'code' 		=> '200',
					'message' 	=> 'Firm is registered, thank you!',
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
		$firm = Firm::findOrFail($id);
		return Response::json($firm);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$firm = Firm::findOrFail($id);

		$firm->name = Input::get('name') ?: $firm->name;
		$firm->quote = Input::get('quote') ?: $firm->quote;
		$firm->save();

		return Response::json(
			array(
				'code' 		=> '200',
				'message' 	=> 'firm is updated, thank you!',
				'data' 		=> '',
				));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$content = Actor::findOrFail($id);
		$content->delete();

		return Response::json(array(
			'error' 	=> false,
			'type' 		=> '200',
			'message' 	=> 'content has deleted',
			));
	}

}