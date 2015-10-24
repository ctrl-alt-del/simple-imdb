<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContentFirm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('content_firm', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('content_id')->unsigned();
			$table->integer('firm_id')->unsigned();
			$table->timestamps();

			$table->foreign('content_id')->references('id')->on('contents');
			$table->foreign('firm_id')->references('id')->on('firms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('content_firm');
	}

}
