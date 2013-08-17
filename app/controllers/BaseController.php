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

	protected function showLayoutWithtitle($view, $subTitle = null)
	{
		$this->layout->title = Cache::get('title');
		$this->layout->title .= (isset($subTitle))  ? ': '. $subTitle : '';
		$this->layout->content = $view;
	}

}