<?php

class IndexController extends BaseController {

	private $pageTitles = array 
	(
		'index' => 'Unsolved Questions'
	);

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->showLayoutWithTitle(
				View::make('index')->with('questions', Question::unsolved()), 
				null, $this->pageTitles['index']);
	}

	

}