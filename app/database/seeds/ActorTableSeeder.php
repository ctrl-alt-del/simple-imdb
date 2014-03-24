<?php

use Illuminate\Database\Schema\Blueprint;

class ActorTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('actors')->truncate();

		
		$names = array(
			'Adam' 		=> 'Jackson',
			'Bob' 		=> 'Smith',
			'Carl' 		=> 'Kenneth',
			'David'		=> 'Thomas', 
			'Elvin'		=> 'Steven',
			'Frank'		=> 'Phillip',
			);

		$date = new DateTime;
		$actors = array();

		foreach ($names as $fname => $lname) {
			$actor = array(
				'fname' 		=> $fname,
				'lname' 		=> $lname,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($actors, $actor);
		}

		DB::table('actors')->insert($actors);
		unset($actors);
		$actors = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}