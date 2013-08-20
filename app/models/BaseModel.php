<?php

class BaseModel extends Eloquent
{
	public $messages;
	
	public static function boot()
	{
		parent::boot();

		static::saving(function($child)
		{
			return $child->validate();
		}); 
	}

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);

		if ($validation->passes()) return true;

		$this->messages = $validation->messages();
		return false;
	}
}