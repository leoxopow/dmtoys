<?php

class Category extends \Eloquent
{
    protected $fillable = ['title', 'parent_id', 'slug'];
    static $rules = [
        'title' => 'required',
        'slug' => 'required|unique:categories'
    ];

    public function parent()
    {
        return $this->belongsTo('Category', 'parent_id');
    }

    public function children()
    {
		return $this->hasMany('Category', 'parent_id');
    }

    public function wares()
    {
        return $this->hasMany('Ware');
    }
}