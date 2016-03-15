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
			$cat->slug = last(explode('/', $categoriesParent->slug));
			$cat->save();
			foreach($categoriesParent->children  as $catChild1){
				$cat1 = new Category();
				$cat1->title = $catChild1->title;
				$cat1->slug = last(explode('/', $catChild1->slug));
				$cat1->parent_id = $cat->id;
				$cat1->save();
				foreach($catChild1->children as $catChild2){
					$cat2 = new Category();
					$cat2->title = $catChild2->title;
					$cat2->slug = last(explode('/', $catChild2->slug));
					$cat2->parent_id = $cat1->id;
					$cat2->save();
				}
			}
		}
	}
}
