<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$wares = Ware::orderBy('views','DESC')->take(8)->get();
		$this->layout->content = View::make('page.index', compact('wares'));
	}

	public function path($path)
	{
		$slug = explode('/', $path);
		return $category = Category::where('slug', end($slug))->first();
	}

	public function ajaxCart()
	{
		$ware = Ware::find(Input::get('wareId'));
		Cart::add(['id' => Input::get('wareId'), 'name' => $ware->title, 'qty' => 1, 'price' => $ware->price - $ware->discount]);
		return Cart::count();
	}

}
