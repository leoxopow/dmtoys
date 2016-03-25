<?php

class Ware extends \Eloquent {
	protected $fillable = [];

	public function category()
	{
		return $this->belongsTo('Category');
	}
}