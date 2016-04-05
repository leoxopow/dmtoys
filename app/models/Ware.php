<?php

class Ware extends \Eloquent {
	protected $fillable = [];
	public static $rules = [
		'title' => 'required',
		'slug ' => 'unique:wares'
	];

	public function category()
	{
		return $this->belongsTo('Category');
	}
}