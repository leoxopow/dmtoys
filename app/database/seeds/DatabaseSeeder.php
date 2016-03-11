<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('CategoriesTableSeeder');
	}

}

class CategoriesTableSeeder extends Seeder {
	public function run()
	{
		DB::table('categories')->delete();
		$jsonCat = 	json_decode(file_get_contents(url('/categories.json')));
		foreach($jsonCat as $categoriesParent){
			$cat = new Category();
			$cat->title = $categoriesParent->title;
		}
	}
}
