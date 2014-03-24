<?php

use Illuminate\Database\Schema\Blueprint;

class ProducerTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('producers')->truncate();

		
		$companies = array(
			'AAA Company' 	=> 'AAA',
			'BBB Company' 	=> 'BBB',
			'CCC Company' 	=> 'CCC',
			'DDD Company' 	=> 'DDD',
			'EEE Company' 	=> 'EEE',
			);

		$date = new DateTime;
		$producers = array();

		foreach ($companies as $name => $quote) {
			$producer = array(
				'name' 			=> $name,
				'quote' 		=> $quote,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($producers, $producer);
		}

		DB::table('producers')->insert($producers);
		unset($producers);
		$producers = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}