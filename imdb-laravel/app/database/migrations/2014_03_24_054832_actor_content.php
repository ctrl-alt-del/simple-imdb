<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActorContent extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('actor_content', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('content_id')->unsigned();
			$table->integer('actor_id')->unsigned();
			$table->timestamps();

			$table->foreign('content_id')->references('id')->on('contents');
			$table->foreign('actor_id')->references('id')->on('actors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('actor_content');
	}

}
