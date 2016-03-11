<?php

class Category extends \Eloquent
{
    protected $fillable = [];

    public function parent()
    {
        return $this->belongsTo('Category', 'parent_id');
    }

    public function children()
    {
		return $this->hasMany('Category', 'parent_id');
    }
}