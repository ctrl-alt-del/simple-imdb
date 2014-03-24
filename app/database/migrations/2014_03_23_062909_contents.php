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
			$table->String('name');
			$table->integer('series')->nullable();
			$table->integer('episode')->nullable();
			$table->String('sku')->nullable();
			$table->integer('actor_id')->unsigned();
			$table->integer('producer_id')->unsigned();

			$table->timestamps();

			$table->foreign('actor_id')->references('id')->on('actors');
			$table->foreign('producer_id')->references('id')->on('producers');
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
