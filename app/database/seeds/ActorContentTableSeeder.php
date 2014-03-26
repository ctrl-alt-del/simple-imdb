<?php

use Illuminate\Database\Schema\Blueprint;

class ActorContentTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('actor_content')->truncate();

		
		$items = array(
			'1' => '5',
			'2' => '5',
			'3' => '1',
			'4' => '4',
			'5' => '3',
			);

		$date = new DateTime;
		$performers = array();

		foreach ($items as $actor_id => $content_id) {
			$performer = array(
				'content_id' 	=> $content_id,
				'actor_id' 		=> $actor_id,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($performers, $performer);
		}

		DB::table('actor_content')->insert($performers);
		unset($performers);
		$performers = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}