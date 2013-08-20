<?php

class AnswersController extends BaseController {




	public function __construct()
	{
		$this->beforeFilter('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$questionId = Input::get('question_id');
		$answer = new Answer(array(
			'user_id'     => Auth::user()->id,
			'question_id' => $questionId,
			'answer'      => Input::get('answer')
		));

		if ($answer->save())
		{
			return Redirect::route('questions.show', $questionId)
							 ->with('message', 'Your answer has been posted successfuly!')
							 ->with('messageType', 'success');

		}

		return Redirect::back()->withInput()
							   ->withErrors($answer->messages)
							   ->with('messageType', 'error');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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