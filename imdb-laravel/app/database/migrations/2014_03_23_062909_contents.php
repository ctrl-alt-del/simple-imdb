<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Contents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contents', function(Blueprint $table) {
			$table->increments('id');
			$table->String('name')->nullable();
			$table->integer('series')->nullable();
			$table->integer('episode')->nullable();
			$table->String('sku');
			$table->String('description');
			$table->boolean('audited')->default(false);
			$table->boolean('available')->default(false);

			$table->timestamps();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('contents');
	}

}
