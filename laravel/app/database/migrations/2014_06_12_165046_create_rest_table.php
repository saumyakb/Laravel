<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restaurant', function(Blueprint $table)
		{
			$table->increments('sno');
			$table->char('id',30);
			$table->char('name',30);
			$table->text('address',300);
			$table->integers('distance');
			$table->char('categoriesId',30);
			$table->char('categoriesName',30);
			$table->float('ratings');
			$table->unique('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('restaurant');
	}

}
