<?php

class Ware extends \Eloquent {
	protected $fillable = ['title', 'thumbnail', 'description', 'category_id'];
	public static $rules = [
		'title' => 'required',
		
	];

	public function category()
	{
		return $this->belongsTo('Category');
	}
}