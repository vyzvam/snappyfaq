<?php

class IndexController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->showLayoutWithtitle(View::make('index'));
	}

}