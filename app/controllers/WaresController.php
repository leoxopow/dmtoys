<?php

class WaresController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /wares
	 *
	 * @return Response
	 */
	public function index($path)
	{
		$ware = Ware::where('slug', $path)->first();
		$ware->views++;
		$ware->save();
		$this->layout->content = View::make('page.itemWare', compact('ware'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /wares/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('parent_id', 0)->get();
		$categoriesSelect = [];
		foreach ($categories as $parent){
			$categoriesSelect[$parent->id] = $parent->title;
			foreach ($parent->children as $child1){
				$categoriesSelect[$child1->id] =  '- '.$child1->title;
				foreach ($child1->children as $child2){
					$categoriesSelect[$child2->id] =  '-- '.$child2->title;
				}
			}
		}
		return View::make('admin.warenew');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /wares
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Ware::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ware  = Ware::create($data);

		
		return Redirect::route('adm/categories');

	}

	/**
	 * Display the specified resource.
	 * GET /wares/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /wares/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ware = Ware::findOrFail($id);
		return View::make('admin.ware', compact('ware'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /wares/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Ware::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ware::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$post->update($data);

		return Redirect::route('posts.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /wares/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Ware::find($id)->delete();
		return Redirect::back();
	}

	public function adminIndex()
	{
		$wares = Ware::paginate(12);
		return View::make('admin.wares', compact('wares'));
	}

}