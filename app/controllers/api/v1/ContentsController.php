<?php

class ContentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$contents = Content::all();
		return Response::json($contents);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$data = array(
			'sku' => Input::get('sku'),
			);

		$rules = array('sku' => 'unique:contents,sku');

		$validator = Validator::make($data, $rules);

		if ($validator->fails()) {
			return Response::json(
				array(
					'code' 		=> '400',
					'message' 	=> 'Oops, content is already on database.',
					'data' 		=> '',
					));
		} else {
			

			$info = explode("-", Input::get('sku'));
			$episode = $info[1];

			$content = new Content;
			$content->sku = Input::get('sku');
			$content->episode = $episode;

			$content->save();

			return Response::json(
				array(
					'code' 		=> '200',
					'message' 	=> 'Content is registered, thank you!',
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
		$content = Content::findOrFail($id);
		return Response::json($content);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {

		$content = Content::findOrFail($id);

		$content->name = Input::get('name') ?: $content->name;
		$content->series = Input::get('series') ?: $content->series;
		$content->episode = Input::get('episode') ?: $content->episode;
		$content->sku = Input::get('sku') ?: $content->sku;
		$content->audited = Input::get('audited') ?: $content->audited;
		$content->available = Input::get('available') ?: $content->available;
		$actcontentor->save();

		return Response::json(
			array(
				'code' 		=> '200',
				'message' 	=> 'content is updated, thank you!',
				'data' 		=> '',
				));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}