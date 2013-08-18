<?php

class UsersController extends BaseController {

	private $pageTitles = array 
	(
		'index' => 'List of users',
		'create' => 'Register a new user',
		'login' => 'Login'
	);


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
		$this->ShowLayoutWithTitle(View::make('users.create'), 'Register', $this->pageTitles['index']);
	}

	public function store()
	{
		$user = new User();


		$validation = Validator::make(Input::all(), $user->rules);

		if ($validation->passes()) 
		{
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));

			$user->save();

			$this->ShowLayoutWithTitle(
				View::make('users.create')->with('messsage', 'You have registered Successfuly'), 
				'Register',
				$this->pageTitles['index']
			);
		}	

		else 
		{
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
	}

	public function login()
	{
		$this->ShowLayoutWithTitle(View::make('users.login'), 'Login', $this->pageTitles['login']);
	}

	public function loginAttempt()
	{

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