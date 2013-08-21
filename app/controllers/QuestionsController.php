<?php

class QuestionsController extends BaseController {

	private $pageTitles = array 
	(
		'index' => 'My Questions',
		'create' => 'Post new question',		
		'edit' => 'Edit question',		
		'search' => 'Search Results',		
	);

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => array('show', 'search')));
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

	public function search()
	{
		$keyword = Input::get('keyword');
		
		$this->showLayoutWithTitle(
			View::make('index')->with('questions', Question::filter($keyword)),
			$this->pageTitles['search'],
			$this->pageTitles['search']

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
							   ->with('message', 'You may have missed some information! please check further')
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
		$question = Question::find($id);

		$showView = View::make('questions.show')->with('question', $question);
		$showView->contentSub = View::make('answers.list')->with('answers', $question->answersOrdered());
		$this->showLayoutWithTitle($showView);
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
		$q = Question::find($id);

		$q->question = Input::get('question');
		$q->solved = Input::get('solved', function () {return 0;});

		if ($q->save())
		{
			return Redirect::route('questions.edit', $id)->with('message', 'Your Question have been changed!')
														 ->with('messageType', 'success');
		}

		return Redirect::route('questions.edit', $id)->withErrors($q->messages)
													->with('message', 'Unable to update your question to ('. Input::get('question') .')! Please check')
													->with('messageType', 'error');
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