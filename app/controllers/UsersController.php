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
		$this->ShowLayoutWithTitle(View::make('users.create'), 'Register', $this->pageTitles['create']);
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

			return Redirect::route('users.create')
							->with('message', $user->username . ' have been registered successfuly!')
							->with('messageType', 'success');
		}	

		else 
		{
			return Redirect::back()->withInput()
								   ->withErrors($validation->messages())
								   ->with('message', 'Unable to register! Please check your details')
								   ->with('messageType', 'error');
		}
	}

	public function login()
	{
		$this->ShowLayoutWithTitle(View::make('users.login'), 'Login', $this->pageTitles['login']);
	}

	public function loginAttempt()
	{
		$username = Input::get('username');
		
		$user = array
		(
			'username' => $username,
			'password' => Input::get('password')
		);

		if (Auth::attempt($user))
		{
			return Redirect::Route('questions.index')->with('message', "Good day $username")
										   ->with('messageType', 'success');
		}
		else
		{
			return Redirect::Route('users.login')->withInput()
								   ->with('message', 'Your username/password combination is incorrect')
							       ->with('messageType', 'error');
		}
	}

	public function logout()
	{
		if (Auth::check())
		{
			Auth::logout();
			return Redirect::route('users.login')->with('message', 'You have logged out successfuly!')
										   ->with('messageType', 'success');		
		}
		
		return Redirect::route('index');

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