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
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /wares
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
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
		//
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
		//
	}

}