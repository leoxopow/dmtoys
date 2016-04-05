<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddColumnsToWaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wares', function(Blueprint $table)
		{
			$table->float('price');
			$table->float('discount');
			$table->integer('views');
			$table->string('slug')->unique();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wares', function(Blueprint $table)
		{
			
		});
	}

}
