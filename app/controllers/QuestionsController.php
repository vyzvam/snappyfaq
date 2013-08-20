<?php

class QuestionsController extends BaseController {

	private $pageTitles = array 
	(
		'index' => 'My Questions',
		'create' => 'Post new question',		
		'edit' => 'Edit question',		
	);

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
		$this->showLayoutWithTitle(
			View::make('questions.index')->with('questions', Question::ByUser(Auth::User()->id)),
			'Questions',
			$this->pageTitles['index']
		);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( Auth::check() ) 
		{

			$this->showLayoutWithTitle(
					View::make('questions.create'),
					'Edit Question',
					$this->pageTitles['create']
			);

		} 

		else return Redirect::route('index')->with('message', 'Please login to post a question')
											->with('messageType', 'error');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$question = new Question(array(
			'user_id' => Auth::user()->id,
			'question' => Input::get('question'),
			'solved' => '0'
		));

		if ($question->save())
		{
			return Redirect::route('questions.index')->with('message', 'You have posted your question successfuly!')
													 ->with('messageType', 'success');
		}

		return Redirect::back()->withInput()
							   ->withErrors($question->messages)
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
		$this->showLayoutWithTitle(
			View::make('questions.show')->with('question', Question::find($id))
		);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::find($id);

		if ( Auth::check() ) 
		{
			if ( Auth::user()->id == $question->user_id ) {

				$this->showLayoutWithTitle(
						View::make( 'questions.edit', compact('question') ),
						'Edit Question',
						$this->pageTitles['edit']
				);
			}
			else return $this->Index();

		} 
		else return Redirect::route('index');
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