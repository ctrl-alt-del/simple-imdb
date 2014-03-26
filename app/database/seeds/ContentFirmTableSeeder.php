<?php

use Illuminate\Database\Schema\Blueprint;

class ContentFirmTableSeeder extends Seeder {

	public function run() {
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        // Uncomment the below to wipe the table clean before populating
		DB::table('content_firm')->truncate();

		
		$items = array(
			'1' => '1',
			'2' => '3',
			'3' => '3',
			'4' => '5',
			'5' => '4',
			);

		$date = new DateTime;
		$producers = array();

		foreach ($items as $firm_id => $content_id) {
			$producer = array(
				'content_id' 	=> $content_id,
				'firm_id' 		=> $firm_id,
				'created_at' 	=> $date, 
				'updated_at' 	=> $date, 
				);
			array_push($producers, $producer);
		}

		DB::table('content_firm')->insert($producers);
		unset($producers);
		$producers = array();

		DB::statement('SET FOREIGN_KEY_CHECKS = 1');
	}
}