<?php

class Ware extends \Eloquent {
	protected $fillable = ['title', 'thumbnail', 'description', 'category_id'];
	public static $rules = [
		'title' => 'required',
		'slug ' => 'required|unique:wares'
	];

	public function category()
	{
		return $this->belongsTo('Category');
	}
}