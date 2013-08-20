<?php

class Answer extends BaseModel {
	protected $guarded = array();

	public $rules = array(
		'answer' => 'required|min:4|max:255'
	);

	public function question() { return $this->belongsTo('Question'); }
	public function user() { return $this->belongsTo('User'); }

	public function orderByDate()
	{
		return static::orderBy('id', 'DESC')->paginate(5);
	}
}