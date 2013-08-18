<?php

class BaseController extends Controller {

    protected $layout = 'layouts.master';

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function showLayoutWithTitle($view, $subTitle = null, $pageTitle = null, $message = null)
	{
		$this->layout->siteName = Cache::get('title');		
		$this->layout->title = Cache::get('title');
		$this->layout->title .= (isset($subTitle))  ? ': '. $subTitle : '';

		$this->layout->pageTitle = $pageTitle;

		$this->layout->message = $message;

		$this->layout->content = $view;
	}

}