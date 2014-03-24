<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producersets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('producersets', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('content_id')->unsigned();
			$table->integer('producer_id')->unsigned();
			$table->timestamps();

			$table->foreign('content_id')->references('id')->on('contents');
			$table->foreign('producer_id')->references('id')->on('producers');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('producersets');
	}

}
