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
		$data = Input::all();
		if( Input::hasFile('thumbnail') ) {
			$thumbnail = Input::file('thumbnail');
			$fileName = $thumbnail->getClientOriginalName();
			$data['thumbnail'] = $fileName;
		}
		$validator = Validator::make($data, Ware::$rules);

		if ($validator->fails())
		{

			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ware  = Ware::create($data);
		
		if ( Input::hasFile('thumbnail') ) {
			$filePath = public_path( 'uploads/thumbnails/' . $ware->id );
			$thumbnail->move( $filePath, $fileName );
		}

		
		return Redirect::back();

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
		$ware = Ware::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Ware::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$ware->update($data);

		return Redirect::back();
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

	public function waresImport()
	{
		return View::make('admin.importWare');
	}

	public function waresImportStore()
	{
		if( Input::hasFile('importFile') ){
			$file = Input::file('importFile');
			$filePath = public_path( 'uploads/imports/'.date('Y/m/d'));
			$fileName = Str::random('3').$file->getClientOriginalName();
			$file->move( $filePath, $fileName );
			$excel = Excel::load("$filePath/$fileName", function($reader) {

			})->get();
			foreach ($excel as $item){
				$ware = Ware::where('article', $item->sku)->first();
				if (!$ware){
					$ware = new Ware();
					$ware->slug = Slug::make($item->name).Str::random(8);
				}
				$ware->article = $item->sku;
				$ware->slug = Slug::make($item->name);
				$ware->title  = $item->name;
				$ware->price = $item->list_price;
				$ware->discount = $item->sell_price;
				$ware->save();
			}
			return 'ok';
		}
	}

}