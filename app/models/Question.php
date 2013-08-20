<?php

class Question extends BaseModel {

	protected $guarded = array();

	public $rules = array
	(
		'question' => 'required:min:10|max:255',
		'solved' => 'in:0,1'
	);

	public function user() { return $this->belongsTo('User'); }
	public function answers() { return $this->hasMany('Answer'); }

	public static function byUser($id)
	{
		return static::whereUserId($id)->orderBy('id', 'DESC')->paginate(5);
	}
	public static function unsolved()
	{
		return static::whereSolved('0')->orderBy('id', 'DESC')->paginate(5);
	}

	public static function filter($keyword)
	{
		return static::where('question', 'LIKE', '%'.$keyword.'%')->orderBy('id', 'DESC')->paginate(5);
	}
}