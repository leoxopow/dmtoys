<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /categories
	 *
	 * @return Response
	 */
	public function index($path)
	{
		$slug = explode('/', $path);
		$category = Category::where('slug', end($slug))->first();
		$wares = Ware::where('category_id', $category->id)->paginate(12);
		$this->layout->content = View::make('page.category', compact('category', 'wares'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /categories/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('parent_id', 0)->get();
		$categoriesSelect = [];
		$categoriesSelect[0] = 'Старша Категорія';
		foreach ($categories as $parent){
			$categoriesSelect[$parent->id] = $parent->title;
			foreach ($parent->children as $child1){
				$categoriesSelect[$child1->id] =  '- '.$child1->title;
				foreach ($child1->children as $child2){
					$categoriesSelect[$child2->id] =  '-- '.$child2->title;
				}
			}
		}
		return  View::make('admin.categorynew', compact('categoriesSelect'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /categories
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		Category::create($data);

		return Redirect::route('adm/categories');

	}

	/**
	 * Display the specified resource.
	 * GET /categories/{id}
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
	 * GET /categories/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::findOrFail($id);
		$categories = Category::where('parent_id', 0)->get();
		$categoriesSelect = [];
		$categoriesSelect[0] = 'Старша Категорія';
		foreach ($categories as $parent){
			$categoriesSelect[$parent->id] = $parent->title;
			foreach ($parent->children as $child1){
				$categoriesSelect[$child1->id] =  '- '.$child1->title;
				foreach ($child1->children as $child2){
					$categoriesSelect[$child2->id] =  '-- '.$child2->title;
				}
			}
		}
		return  View::make('admin.category', compact('category', 'categoriesSelect'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = Category::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Category::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$post->update($data);

		return Redirect::route('adm/categories');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /categories/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function adminIndex()
	{
		$categories = Category::where('parent_id', 0)->get();
		return View::make('admin.categories', compact('categories'));
	}

}