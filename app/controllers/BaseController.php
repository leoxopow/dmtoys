<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected $layout = 'template.layout';

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
			$this->layout->menuCategories = Category::where('parent_id', 0)->get();
		}
	}

}
